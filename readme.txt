=== CM Multisite-Lite ===
Contributors: codingmall
Donate link: http://codingmall.com/wordpress/
Tags: multisite,multistore,multi-site,multi domain,multiple subdomains,front end sites
Requires at least: 5.0
Tested up to: 6.4.3
Requires PHP: 7.4
Stable tag: 1.1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Serve multiple front end websites with different content from a single WordPress installation.

== Description ==
This plugin allows you to make multiple front end websites from just a single, simple installation of WordPress.

Suppose you have a WordPress site example.com. It contains 100 posts. You want to show some of them on cars.example.com, some on my-super-domain.com and some posts on mobiles.example.com. See? you can show content across multiple subdomains and even on separate domains. 

How to do it? Very simple. To setup a new subdomain for example cars.example.com, do the following:

- First point cars.example.com to your main website server. This may require changing of DNS records. On many hosting providers this process is called create a "Domain Alias". The target is that if you browse your new domain or subdomain, it should show the content as you see on your main site.

- Create a new 'Contributor' type user.
- Put https://cars.example.com in site url field and save.

- Now, go in Posts and set that author to those posts which you want to show on cars.example.com.

- That's all. Now browse https://cars.example.com and you will see posts made by the contributor user of this site.

For more information or support, you can contact us at 
[https://codingmall.com/contact-us](https://codingmall.com/contact-us)

MORE FEATURES:

If you want to create a true Multisite experience and if you want more features, please have a look here;
[https://codingmall.com/wordpress/203-multi-sites-for-wordpress-and-woocommerce](https://codingmall.com/wordpress/203-multi-sites-for-wordpress-and-woocommerce)

If you have a native WordPress Multisite Network, then use this version instead:
[https://codingmall.com/wordpress/216-easy-sharing-of-posts-pages-and-products](https://codingmall.com/wordpress/216-easy-sharing-of-posts-pages-and-products)

You may get features like the following with the premium version:

- Show a different page on home page
- Setting up WordPress differently for each site. For example, different permalink style for each website
- Having a different theme for each domain or subdomain
- Showing a different menu on each site
- Providing different Widgets on different sites
- Want to use WooCommerce and create a Multi store, Multisite, Multi vendor website
- Showing different products on each store or vendor site
- Different WooCommerce settings for each store. For example, different shipping and tax rates for each store.

and many many more...


== Installation ==

1. Upload plugin directory to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' screen in WordPress.

== Frequently Asked Questions ==

* Do I need to edit my theme files or any other WordPress core files?

**Ans.** No. It works out of the box. 

* Do I need to install WordPress in Multisite mode?

**Ans.** No. Just a single, simple WordPress is required.

== Screenshots ==
1. This is the screenshot of the user details whos created posts will be shown on our example domain fewoomv.com. You can create one user for each front end domain.

== Changelog ==

= 1.0 =

== Upgrade Notice ==

= 1.1.1 = bug fixed and now compatible with WP 6.1