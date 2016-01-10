=== WooCommerce Product Image Flipper ===
Contributors: jameskoster
Tags: woocommerce, ecommerce, product, images, photos, product photos, front and back
Requires at least: 3.8
Tested up to: 4.0
Stable tag: 0.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a secondary image on product archives that is revealed on hover. Perfect for displaying front/back shots of clothing and other products.

== Description ==

A very simple plugin that adds a secondary product thumbnail on product archives that is revealed when you hover over the main product image.

This plugin is ideal if you'd like to display more than one image on product archives, and perfect if you want to display front and back images of clothing for example.

Please feel free to contribute on <a href="https://github.com/jameskoster/woocommerce-product-image-flipper">github</a>.

Note: This plugin uses CSS 3d transforms to show/hide the images and will therefore only work in modern browsers.

== Installation ==

1. Upload `woocommerce-product-image-flipper` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Done!

== Frequently Asked Questions ==

= How do I control which image is displayed on hover? =

Whichever image is first in the order of product gallery images will appear on hover.

= My secondary image is taller than the main product image and overlaps content when it fades in =

This is due to the secondary image being positioned absolutely. This is the cleanest way I can think to do this with CSS alone. You may want to consider hard cropping your product catalog thumbnails to ensure all images are the same dimensions in product archives.

= It doesn't work. Nothing happens when I hover over images? =

First of all check that the product you're checking has a gallery attached to it. Secondly you should be aware that this plugin uses CSS 3d transforms and will therefore only work in modern browsers.


== Screenshots ==

1. A flipped image.

== Changelog ==

= 0.2.1 =
* Fix - Fixed fatal error: get_gallery_attachment_ids() undefined

= 0.2.0 =
* Fix - WooCommerce 2.2 compatibility

= 0.1 =
Initial release.
