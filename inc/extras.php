<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Sydney
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sydney_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'sydney_body_classes' );

/**
 * Support for Yoast SEO breadcrumbs
 */
function sydney_yoast_seo_breadcrumbs() {
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('
		<p class="sydney-breadcrumbs">','</p>
		');
	}
}

/**
 * Additional classes for main content area on pages
 */
if ( !function_exists( 'sydney_page_content_classes') ) {
	function sydney_page_content_classes() {

		if ( apply_filters( 'sydney_disable_cart_checkout_sidebar', true ) && class_exists( 'WooCommerce' ) && ( is_checkout() || is_cart() ) ) {
			return 'col-md-12'; //full width Woocommerce checkout and cart pages
		}

		return 'col-md-9'; //default

	}
}

/**
 * Sidebar output function
 * 
 * hooked into sydney_get_sidebar
 */
function sydney_get_sidebar() {

	if ( apply_filters( 'sydney_disable_cart_checkout_sidebar', true ) && class_exists( 'WooCommerce' ) && ( is_checkout() || is_cart() ) ) {
		return; //we don't want a sidebar on the checkout and cart page
	}

	get_sidebar();

}
add_action( 'sydney_get_sidebar', 'sydney_get_sidebar' );