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

/**
 * Update fontawesome ajax callback
 */
function sydney_update_fontawesome_callback() {
	check_ajax_referer( 'sydney-fa-updt-nonce', 'nonce' );

	update_option( 'sydney-fontawesome-v5', true );

	wp_send_json( array(
		'success' => true
	) );
}
add_action( 'wp_ajax_sydney_update_fontawesome_callback', 'sydney_update_fontawesome_callback' );

/**
 * Check which version of fontawesome is active 
 * and return the needed class prefix
 */
function sydney_get_fontawesome_prefix( $v5_prefix = '' ) {
	$fa_prefix = 'fa '; // v4
	if( get_option( 'sydney-fontawesome-v5' ) ) {
		$fa_prefix = $v5_prefix;
	}

	return $fa_prefix;
}

/*
* Append gotop button html on footer
* Ensure compatibility with plugins that handle with footer like header/footer builders
*/
function sydney_append_gotop_html() {
	
	$enable = get_theme_mod( 'enable_scrolltop', 1 );

	if ( !$enable ) {
		return;
	}

	$type 		= get_theme_mod( 'scrolltop_type', 'icon' );			
	$text 		= get_theme_mod( 'scrolltop_text', esc_html__( 'Back to top', 'sydney' ) );	
	$icon		= get_theme_mod( 'scrolltop_icon', 'icon2' );
	$visibility = get_theme_mod( 'scrolltop_visibility', 'all' );
	$position 	= get_theme_mod( 'scrolltop_position', 'right' );

	echo '<a on="tap:toptarget.scrollTo(duration=200)" class="go-top visibility-' . esc_attr( $visibility ) . ' position-' . esc_attr( $position ) . '">';
	if ( 'text' === $type ) {
		echo '<span>' . esc_html( $text ) . '</span>';
	}
	echo 	'<i class="sydney-svg-icon">' . sydney_get_svg_icon( 'icon-btt-' . $icon, false ) . '</i>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	echo '</a>';

}
add_action('wp_footer', 'sydney_append_gotop_html', 1);

/**
 * Get social network
 */
function sydney_get_social_network( $social ) {

	$networks = array( 'facebook', 'twitter', 'instagram', 'github', 'linkedin', 'youtube', 'xing', 'flickr', 'dribbble', 'vk', 'weibo', 'vimeo', 'mix', 'behance', 'spotify', 'soundcloud', 'twitch', 'bandcamp', 'etsy', 'pinterest' );

	foreach ( $networks as $network ) {
		$found = strpos( $social, $network );

		if ( $found !== false ) {
			return $network;
		}
	}
}

/**
 * Social profile list
 */
function sydney_social_profile( $location ) {
		
	$social_links = get_theme_mod( $location );

	if ( !$social_links ) {
		return;
	}

	$social_links = explode( ',', $social_links );

	$items = '<div class="social-profile">';
	foreach ( $social_links as $social ) {
		$network = sydney_get_social_network( $social );
		if ( $network ) {
			$items .= '<a target="_blank" href="' . esc_url( $social ) . '"><i class="sydney-svg-icon">' . sydney_get_svg_icon( 'icon-' . esc_html( $network ), false ) . '</i></a>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
	$items .= '</div>';

	echo $items; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Footer credits
 */
function sydney_footer_credits() {

	/* translators: %1$1s, %2$2s theme copyright tags*/
	$credits 	= get_theme_mod( 'footer_credits', sprintf( esc_html__( '%1$1s. Proudly powered by %2$2s', 'sydney' ), '{copyright} {year} {site_title}', '{theme_author}' ) );

	$tags 		= array( '{theme_author}', '{site_title}', '{copyright}', '{year}' );
	$replace 	= array( '<a rel="nofollow" href="https://athemes.com/theme/sydney/">' . esc_html__( 'Sydney', 'sydney' ) . '</a>', get_bloginfo( 'name' ), '&copy;', date('Y') );

	$credits 	= str_replace( $tags, $replace, $credits );

	$credits	= '<div class="sydney-credits">' . $credits . '</div>';

	return $credits;
}