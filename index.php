<?php
/**
Plugin Name: CM Multisite-lite
Plugin URI: http://codingmall.com/wordpress/
Description: Serve multiple front end websites with different content from a single WordPress installation.
Author: CodingMall.com
Author URI: https://codingmall.com/wordpress/
Version: 1.1.2
License: GPLv2 (or later)
Text Domain: cm-ms-lite
Domain Path: /languages/
**/

/*  Copyright CodingMall.com  (email : support@codingmall.com)
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
	See our terms for details.
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

class cm__msl_fe_global{
	static $dom ='';
	static $mDom='';
	static $aid =0;
	static $isMain=false;
	
	static function initVars(){
		self::$dom  = @$_SERVER['HTTP_HOST']; 
		self::$mDom = parse_url(get_option('siteurl'),PHP_URL_HOST);

		if (self::$dom==self::$mDom) cm__msl_fe_global::$isMain=true;
		
		self::$aid  = self::getAid(self::$dom); 
		if (self::$aid==0) self::$aid='99999999999999999999';
	}
	
	static function getAid($dom){
		global $wpdb;    
		$q2="SELECT `ID` FROM ".$wpdb->prefix."users WHERE MD5(TRIM(TRAILING '/' FROM `user_url`)) = '"
				. MD5('https://'.$dom) ."' OR MD5(TRIM(TRAILING '/' FROM `user_url`)) = '"
				. MD5('http://'.$dom) ."'";	//die($dom.'!');
		$aid = (int) $wpdb->get_var( $q2 );
		return $aid;
	}
}

cm__msl_fe_global::initVars();
//die(cm__msl_fe_global::$aid.'!');

if (is_admin()){
}else{
	add_action('wp_loaded', 'cm__msl_fe_buffer_start');
	add_action('shutdown', 'cm__msl_fe_buffer_end');
	add_action( 'pre_get_posts', 'cm__msl_fe_query_modif' );

	add_filter( "get_next_post_where", function($where, $in_same_term, $excluded_terms, $taxonomy, $post){
		if (cm__msl_fe_global::$isMain) return $where;
		
		$where .= " AND p.post_author='".cm__msl_fe_global::$aid."'";
		return $where;
	}, 10, 5);

	add_filter( "get_previous_post_where", function($where, $in_same_term, $excluded_terms, $taxonomy, $post){
		if (cm__msl_fe_global::$isMain) return $where;
				
		$where .= " AND p.post_author='".cm__msl_fe_global::$aid."'";
		return $where;
	}, 10, 5);
	
}

function cm__msl_fe_query_modif( $q ) {	
	$dom  = cm__msl_fe_global::$dom; $home = cm__msl_fe_global::$mDom;
	//echo $q->query['post_type'].'<hr>'; //
	if (@$q->query['post_type']!='') return;
	if (@$q->query['pagename']!='') return;
	
	//echo '<pre>';var_dump($q);echo '</pre>';
	if ($home==$dom){
		//
	}else{
		if (cm__msl_fe_global::$aid!=0)	$q->set( 'author', cm__msl_fe_global::$aid );
	}
}

function cm__msl_fe_buffer_start() { ob_start("cm__msl_fe_modif_cont"); }
function cm__msl_fe_buffer_end() { @ob_end_flush(); }

function cm__msl_fe_modif_cont($content){
	$dom  = cm__msl_fe_global::$dom; $home = cm__msl_fe_global::$mDom;

	$content = str_replace($home,$dom,$content);
	return $content;
}
