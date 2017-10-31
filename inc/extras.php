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

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function sydney_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'sydney' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'sydney_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function sydney_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'sydney_render_title' );
endif;

/**
 * Include custom post types in archives
 */
function sydney_include_cpts_in_archives( $query ) {

	$cpts = get_theme_mod( 'sydney_include_cpts_archives', array() );

	$posts[] = 'post';

	foreach ( $cpts as $cpt ) {
		$posts[] = $cpt;
	}
	
    if ( $query->is_main_query() && !is_admin() && $query->is_archive() ) {
        $query->set('post_type', $posts );
    }
}
add_action( 'pre_get_posts', 'sydney_include_cpts_in_archives' );


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