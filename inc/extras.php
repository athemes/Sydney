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

	$sidebar_archives 		= get_theme_mod( 'sidebar_archives', 1 );
	$sidebar_single_post 	= get_theme_mod( 'sidebar_single_post', 1 );

	if ( ( !is_singular() && !$sidebar_archives ) || ( is_single() && !$sidebar_single_post ) ) {
		$classes[] = 'no-sidebar';
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
function sydney_page_content_classes() {
	global $post;

	$sidebar_archives = get_theme_mod( 'sidebar_archives', 1 );

	if ( !is_singular() && !$sidebar_archives ) {
		return 'col-md-12';
	} 
	
	$disable_sidebar_pages 	= get_theme_mod( 'fullwidth_pages', 0 );

	if ( is_page() && $disable_sidebar_pages ) {
		return 'no-sidebar';
	}	

	if ( is_single() && isset( $post ) ) {
		$disable_sidebar 		= get_post_meta( $post->ID, '_sydney_page_disable_sidebar', true );
		$sidebar_single_post 	= get_theme_mod( 'sidebar_single_post', 1 );

		if ( $disable_sidebar || !$sidebar_single_post ) {
			return 'no-sidebar';
		}
	}		

	return 'col-md-9'; //default

}
add_filter( 'sydney_content_area_class', 'sydney_page_content_classes' );

/**
 * Sidebar output function
 * 
 * hooked into sydney_get_sidebar
 */
function sydney_get_sidebar() {

	if ( apply_filters( 'sydney_disable_cart_checkout_sidebar', true ) && class_exists( 'WooCommerce' ) && ( is_checkout() || is_cart() ) ) {
		return; //we don't want a sidebar on the checkout and cart page
	}

	global $post;

	$sidebar_archives 		= get_theme_mod( 'sidebar_archives', 1 );

	$disable_sidebar_pages 	= get_theme_mod( 'fullwidth_pages', 0 );

	if ( is_page() && $disable_sidebar_pages ) {
		return;
	}

	if ( !is_singular() && !$sidebar_archives ) {
		return;
	} elseif ( is_singular() && isset( $post ) ) {
		$disable_sidebar 			= get_post_meta( $post->ID, '_sydney_page_disable_sidebar', true );
		$disable_sidebar_customizer = get_theme_mod( 'sidebar_single_post', 1 );

		if ( $disable_sidebar || !$disable_sidebar_customizer ) {
			return;
		}
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

/**
 * Masonry data for HTML intialization
 */
function sydney_masonry_data() {

	$layout = get_theme_mod( 'blog_layout', 'layout2' );

	if ( 'layout5' !== $layout ) {
		return; //Output data only for the masonry layout (layout5)
	}

	$data = 'data-masonry=\'{ "itemSelector": "article", "horizontalOrder": true }\'';

	echo apply_filters( 'sydney_masonry_data', wp_kses_post( $data ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Sidebar position
 */
function sydney_sidebar_position() {

	$sidebar_archives_position 	= get_theme_mod( 'sidebar_archives_position', 'sidebar-right' );

	if ( !is_singular() ) {
		$class = $sidebar_archives_position;

		return esc_attr( $class );
	} 

	global $post;

	if ( !isset( $post ) ) {
		return;
	}

	$sidebar_post_position 		= get_theme_mod( 'sidebar_single_post_position', 'sidebar-right' );
	$sidebar_page_position 		= get_theme_mod( 'sidebar_single_page_position', 'sidebar-right' );

	if ( is_single() ) {
		$class = $sidebar_post_position;
	} elseif ( is_page() ) {
		$class = $sidebar_page_position;
	}

	return esc_attr( $class );
}

/**
 * Post author bio
 */
function sydney_post_author_bio() {

	$single_post_show_author_box = get_theme_mod( 'single_post_show_author_box', 0 );

	if ( !$single_post_show_author_box ) {
		return;
	}

	?>
	<div class="single-post-author">
		<div class="author-avatar vcard">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
		</div>

		<div class="author-content">
			<h3 class="author-name">
				<?php
					printf(
						/* translators: %s: Author name */
						esc_html__( 'By %s', 'sydney' ),
						esc_html( get_the_author() )
					);
				?>
			</h3>		
			<?php echo wp_kses_post( wpautop( get_the_author_meta( 'description' ) ) ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php
					printf(
						/* translators: %s: Author name */
						__( 'See all posts by %s', 'sydney' ),// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						esc_html( get_the_author() )
					);
				?>
			</a>
		</div>
	</div>
	<?php
}
add_action( 'sydney_after_single_entry', 'sydney_post_author_bio', 21 );

/**
 * Related posts
 */
function sydney_related_posts() {

	$single_post_show_related_posts = get_theme_mod( 'single_post_show_related_posts', 0 );

	if ( !$single_post_show_related_posts ) {
		return;
	}

	$related_title 	= get_theme_mod( 'related_posts_title', esc_html__( 'You might also like:', 'sydney' ) );
    $post_id 		= get_the_ID();
    $cat_ids 		= array();
    $categories 	= get_the_category( $post_id );

    if(	!empty($categories) && !is_wp_error( $categories ) ):
        foreach ( $categories as $category ):
            array_push( $cat_ids, $category->term_id );
        endforeach;
    endif;

    $query_args = array( 
        'category__in'   	=> $cat_ids,
        'post__not_in'    	=> array( $post_id ),
        'posts_per_page'  	=> '3',
     );

    $related_cats_post = new WP_Query( $query_args );

    if( $related_cats_post->have_posts()) :
		echo '<div class="sydney-related-posts">';

			if ( '' !== $related_title ) {
				echo '<h3>' . esc_html( $related_title ) . '</h3>';
			}
			echo '<div class="row">';
			while( $related_cats_post->have_posts() ): $related_cats_post->the_post(); ?>
				<div class="col-md-4">
					<div class="related-post">
						<div class="entry-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'medium-thumb' ); ?></a>
						</div>	
						<div class="entry-meta">
							<?php sydney_posted_on(); ?>
						</div>
						<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
					</div>
				</div>
			<?php endwhile;
			echo '</div>';
		echo '</div>';

        wp_reset_postdata();
     endif;

}
add_action( 'sydney_after_single_entry', 'sydney_related_posts', 31 );