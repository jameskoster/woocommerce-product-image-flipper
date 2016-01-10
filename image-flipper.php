<?php
/*
Plugin Name: WooCommerce Product Image Flipper
Plugin URI: http://jameskoster.co.uk/tag/product-image-flipper/
Version: 0.2.1
Description: Adds a secondary image on product archives that is revealed on hover. Perfect for displaying front/back shots of clothing and other products.
Author: jameskoster
Author URI: http://jameskoster.co.uk
Text Domain: woocommerce-product-image-flipper
Domain Path: /languages/

	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	/**
	 * Localisation (with WPML support)
	 **/
	add_action( 'init', 'plugin_init' );
	function plugin_init() {
		load_plugin_textdomain( 'woocommerce-product-image-flipper', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}


	/**
	 * New Badge class
	 **/
	if ( ! class_exists( 'WC_pif' ) ) {

		class WC_pif {

			public function __construct() {
				add_action( 'wp_enqueue_scripts', array( $this, 'pif_scripts' ) );														// Enqueue the styles
				add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_template_loop_second_product_thumbnail' ), 11 );
				add_filter( 'post_class', array( $this, 'product_has_gallery' ) );
			}


	        /*-----------------------------------------------------------------------------------*/
			/* Class Functions */
			/*-----------------------------------------------------------------------------------*/

			// Setup styles
			function pif_scripts() {
				if ( apply_filters( 'woocommerce_product_image_flipper_styles', true ) ) {
					wp_enqueue_style( 'pif-styles', plugins_url( '/assets/css/style.css', __FILE__ ) );
				}
				wp_enqueue_script( 'pif-script', plugins_url( '/assets/js/script.js', __FILE__ ), array( 'jquery' ) );
			}

			// Add pif-has-gallery class to products that have a gallery
			function product_has_gallery( $classes ) {

				$product = wc_get_product(  get_the_ID()  );

				$post_type = get_post_type( get_the_ID() );

				if ( ! is_admin() ) {

					if ( $post_type == 'product' ) {

						$attachment_ids = $product->get_gallery_attachment_ids();

						if ( $attachment_ids ) {
							$classes[] = 'pif-has-gallery';
						}
					}

				}

				return $classes;
			}


			/*-----------------------------------------------------------------------------------*/
			/* Frontend Functions */
			/*-----------------------------------------------------------------------------------*/

			// Display the second thumbnails
			function woocommerce_template_loop_second_product_thumbnail() {
				global $product, $woocommerce;

				$attachment_ids = $product->get_gallery_attachment_ids();

				if ( $attachment_ids ) {
					$secondary_image_id = $attachment_ids['0'];
					echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog' ) );
				}
			}

		}


		$WC_pif = new WC_pif();
	}
}
