<?php
/*
 * Plugin Name: WC Product Shortcut with Full Details Including Extra Product Options
 * Description: Adds a custom shortcode to display any WooCommerce product with extra options in WordPress, add to cart, and add to wishlist on any WordPress page.
 * Author: Zonayed Ahamad
 * Version: 1.0.0
 * Author URI: https://jonayed.me
 * Plugin URI: https://github.com/DevZonayed/Woocommerce-Product-Shortcut
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
		echo '<h2>' . $product->get_title() . '</h2>';

		echo '<p>' . $product->get_price_html() . '</p>';

		echo '<p>' . do_shortcode( '[add_to_cart id="' . $product_id . '"]' ) . '</p>';

		if ( function_exists( 'YITH_WCWL' ) ) {
			echo do_shortcode( '[yith_wcwl_add_to_wishlist product_id="' . $product_id . '"]' );
		}
	}

	return ob_get_clean();
}

function tm_epo_js_loader() {
	do_action( 'woocommerce_tm_epo_enqueue_scripts' );
}

function show_product_extra_options() {
	do_action( "woocommerce_tm_epo_fields" );
}

add_action( 'woocommerce_before_add_to_cart_button', 'show_product_extra_options' );
add_action( 'wp_enqueue_scripts', 'tm_epo_js_loader' );
add_shortcode( 'znyd_wc_product_page', 'znyd_wc_product_page_shortcode' );