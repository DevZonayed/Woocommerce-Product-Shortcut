<?php
/*
 * Plugin Name: WC Product Shortcut with Full Details Including Extra Product Options
 * Description: Adds a custom shortcode to display any Woocommerce product with extra options in Wordpress, add to cart, and add to wishlist on any Wordpress page.
 * Author:      Zonayed Ahamad
 * Version:     1.0.0
 * Author URI:  https://www.themehigh.com
 * Plugin URI:  https://www.themehigh.com
 * Text Domain: woo-advanced-product-shortcut
 * WC requires at least: 3.0.0
 * WC tested up to: 7.8
 */

function znyd_wc_product_page_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'id' => '',
	), $atts, 'znyd_wc_product_page' );

	ob_start();

	// Get the product ID
	$product_id = $atts['id'];

	// Get the product
	$product = wc_get_product( $product_id );

	if ( $product ) {
		// Output the product title
		echo '<h2>' . $product->get_title() . '</h2>';

		// Output the product price
		echo '<p>' . $product->get_price_html() . '</p>';

		// Output the extra product options
		echo do_shortcode( '[product_page id="' . $product_id . '"]' );

		// Output the add to cart button
		echo '<p>' . do_shortcode( '[add_to_cart id="' . $product_id . '"]' ) . '</p>';

		// Output the add to wishlist button (if you are using a wishlist plugin)
		if ( function_exists( 'YITH_WCWL' ) ) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist product_id="' . $product_id . '"]' );
		}
	}

	return ob_get_clean();
}
add_shortcode( 'znyd_wc_product_page', 'znyd_wc_product_page_shortcode' );