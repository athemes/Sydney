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

	$menu_style = get_theme_mod( 'menu_style', 'inline' );
	$classes[] = 'menu-' . esc_attr( $menu_style );
	
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

/**
 * Custom header button
 */
function sydney_add_header_menu_button( $items, $args ) {

	$type = get_theme_mod( 'header_button_html', 'nothing' );

    if ( $args -> theme_location == 'primary' ) {
		if ( 'button' == $type ) {
			$link 	= get_theme_mod( 'header_custom_item_btn_link', 'https://example.org/' );
			$text 	= get_theme_mod( 'header_custom_item_btn_text', __( 'Get in touch', 'sydney' ) );
			$target = get_theme_mod( 'header_custom_item_btn_target', 1 );
			if ( $target ) {
				$target = '_blank';
			} else {
				$target = '_self';
			}

			$items .= '<li class="header-custom-item"><a class="header-button roll-button" target="' . $target . '" href="' . esc_url( $link ) . '" title="' . esc_attr( $text ) . '">' . esc_html( $text ) . '</a></li>';
		} elseif ( 'html' == $type ) {
			$content = get_theme_mod( 'header_custom_item_html' );

			$items .= '<li class="header-custom-item">' . wp_kses_post( $content ) . '</li>';
		}
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'sydney_add_header_menu_button', 11, 2 );

/**
 * Menu container
 */
if ( !function_exists( 'sydney_menu_container' ) ) {
	function sydney_menu_container() {
		$type = get_theme_mod( 'menu_container', 'container' );

		return $type;
	}
}

/**
 * Get image alts
 */
function sydney_image_alt( $image ) {
	
	$id 	= attachment_url_to_postid( $image );
	$alt 	= get_post_meta( $id, '_wp_attachment_image_alt', true) ;

	if ( $alt ) {
		return $alt;
	}
}

/**
 * Check AMP endpoint
 */
function sydney_is_amp() {
	return function_exists( 'amp_is_request' ) && amp_is_request();
}