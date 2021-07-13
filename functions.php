<?php
/**
 * Sydney functions and definitions
 *
 * @package Sydney
 */

if ( ! function_exists( 'sydney_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sydney_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sydney, use a find and replace
	 * to change 'sydney' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sydney', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('sydney-large-thumb', 830);
	add_image_size('sydney-medium-thumb', 550, 400, true);
	add_image_size('sydney-small-thumb', 230);
	add_image_size('sydney-service-thumb', 350);
	add_image_size('sydney-mas-thumb', 480);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sydney' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sydney_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	//Gutenberg align-wide support
	add_theme_support( 'align-wide' );

	//Forked Owl Carousel flag
	$forked_owl = get_theme_mod( 'forked_owl_carousel', false );
	if ( !$forked_owl ) {
		set_theme_mod( 'forked_owl_carousel', true );
	}	

	//Set the compare icon for YTIH button
	update_option( 'yith_woocompare_button_text', sydney_get_svg_icon( 'icon-compare', false ) );
}
endif; // sydney_setup
add_action( 'after_setup_theme', 'sydney_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function sydney_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sydney' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod('footer_widget_areas', '3');
	for ($i=1; $i<=$widget_areas; $i++) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'sydney' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	//Register the front page widgets
	if ( defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
		register_widget( 'Sydney_List' );
		register_widget( 'Sydney_Services_Type_A' );
		register_widget( 'Sydney_Services_Type_B' );
		register_widget( 'Sydney_Facts' );
		register_widget( 'Sydney_Clients' );
		register_widget( 'Sydney_Testimonials' );
		register_widget( 'Sydney_Skills' );
		register_widget( 'Sydney_Action' );
		register_widget( 'Sydney_Video_Widget' );
		register_widget( 'Sydney_Social_Profile' );
		register_widget( 'Sydney_Employees' );
		register_widget( 'Sydney_Latest_News' );
		register_widget( 'Sydney_Portfolio' );
	}
	register_widget( 'Sydney_Contact_Info' );

}
add_action( 'widgets_init', 'sydney_widgets_init' );

/**
 * Load the front page widgets.
 */
if ( defined( 'SITEORIGIN_PANELS_VERSION' ) ) {
	require get_template_directory() . "/widgets/fp-list.php";
	require get_template_directory() . "/widgets/fp-services-type-a.php";
	require get_template_directory() . "/widgets/fp-services-type-b.php";
	require get_template_directory() . "/widgets/fp-facts.php";
	require get_template_directory() . "/widgets/fp-clients.php";
	require get_template_directory() . "/widgets/fp-testimonials.php";
	require get_template_directory() . "/widgets/fp-skills.php";
	require get_template_directory() . "/widgets/fp-call-to-action.php";
	require get_template_directory() . "/widgets/video-widget.php";
	require get_template_directory() . "/widgets/fp-social.php";
	require get_template_directory() . "/widgets/fp-employees.php";
	require get_template_directory() . "/widgets/fp-latest-news.php";
	require get_template_directory() . "/widgets/fp-portfolio.php";

	/**
	 * Page builder support
	 */
	require get_template_directory() . '/inc/so-page-builder.php';	
}
require get_template_directory() . "/widgets/contact-info.php";

/**
 * Elementor editor scripts
 */
function sydney_elementor_editor_scripts() {
	wp_enqueue_script( 'sydney-elementor-editor', get_template_directory_uri() . '/js/elementor.js', array( 'jquery' ), '20200504', true );
}
add_action('elementor/frontend/after_register_scripts', 'sydney_elementor_editor_scripts');

/**
 * Enqueue scripts and styles.
 */
function sydney_scripts() {

	$is_amp = sydney_is_amp();

	wp_enqueue_style( 'sydney-google-fonts', esc_url( sydney_enqueue_google_fonts() ), array(), null );

	if ( is_customize_preview() ) {
		wp_enqueue_style( 'sydney-preview-google-fonts-body', 'https://fonts.googleapis.com/', array(), null );
		wp_enqueue_style( 'sydney-preview-google-fonts-headings', 'https://fonts.googleapis.com/', array(), null );
	}

	wp_enqueue_style( 'sydney-style', get_stylesheet_uri(), '', '20210526' );

	wp_enqueue_style( 'sydney-ie9', get_template_directory_uri() . '/css/ie9.css', array( 'sydney-style' ) );
	wp_style_add_data( 'sydney-ie9', 'conditional', 'lte IE 9' );

	if ( !$is_amp ) {
		wp_enqueue_script( 'sydney-functions', get_template_directory_uri() . '/js/functions.min.js', array(), '20210120', true );
		
		//Enqueue hero slider script only if the slider is in use
		$slider_home = get_theme_mod('front_header_type','nothing');
		$slider_site = get_theme_mod('site_header_type');
		if ( ( $slider_home == 'slider' && is_front_page() ) || ( $slider_site == 'slider' && !is_front_page() ) ) {
			wp_enqueue_script( 'sydney-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'),'', true );
			wp_enqueue_script( 'sydney-hero-slider', get_template_directory_uri() . '/js/hero-slider.js', array('jquery'),'', true );
		}

		if ( get_theme_mod('blog_layout') == 'masonry-layout' && (is_home() || is_archive()) ) {
			wp_enqueue_script( 'sydney-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array('jquery', 'masonry'),'', true );
		}

	}

	if ( class_exists( 'Elementor\Plugin' ) ) {
		wp_enqueue_script( 'sydney-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'),'', true );		
	}

	if ( defined( 'SITEORIGIN_PANELS_VERSION' )	) {
		wp_enqueue_script( 'sydney-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'),'', true );
		wp_enqueue_script( 'sydney-so-legacy-scripts', get_template_directory_uri() . '/js/so-legacy.js', array('jquery'),'', true );
		wp_enqueue_script( 'sydney-so-legacy-main', get_template_directory_uri() . '/js/so-legacy-main.min.js', array('jquery'),'', true );
		wp_enqueue_style( 'sydney-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sydney_scripts' );

/**
 * Disable Elementor globals on theme activation
 */
function sydney_disable_elementor_globals () {
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
}
add_action('after_switch_theme', 'sydney_disable_elementor_globals');

/**
 * Enqueue Bootstrap
 */
function sydney_enqueue_bootstrap() {
	wp_enqueue_style( 'sydney-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'sydney_enqueue_bootstrap', 9 );

/**
 * Elementor editor scripts
 */

/**
 * Change the excerpt length
 */
function sydney_excerpt_length( $length ) {

  $excerpt = get_theme_mod('exc_lenght', '55');
  return $excerpt;

}
add_filter( 'excerpt_length', 'sydney_excerpt_length', 999 );

/**
 * Blog layout
 */
function sydney_blog_layout() {
	$layout = get_theme_mod('blog_layout','classic-alt');
	return $layout;
}

/**
 * Menu fallback
 */
function sydney_menu_fallback() {
	if ( current_user_can('edit_theme_options') ) {
		echo '<a class="menu-fallback" href="' . admin_url('nav-menus.php') . '">' . __( 'Create your menu here', 'sydney' ) . '</a>';
	}
}

/**
 * Header image overlay
 */
function sydney_header_overlay() {
	$overlay = get_theme_mod( 'hide_overlay', 0);
	if ( !$overlay ) {
		echo '<div class="overlay"></div>';
	}
}

/**
 * Header video
 */
function sydney_header_video() {

	if ( !function_exists('the_custom_header_markup') ) {
		return;
	}

	$front_header_type 	= get_theme_mod( 'front_header_type' );
	$site_header_type 	= get_theme_mod( 'site_header_type' );

	if ( ( get_theme_mod('front_header_type') == 'core-video' && is_front_page() || get_theme_mod('site_header_type') == 'core-video' && !is_front_page() ) ) {
		the_custom_header_markup();
	}
}

/**
 * Preloader
 */
function sydney_preloader() {

	if ( sydney_is_amp() ) {
		return;
	}
	?>
	<div class="preloader">
	    <div class="spinner">
	        <div class="pre-bounce1"></div>
	        <div class="pre-bounce2"></div>
	    </div>
	</div>
	<?php
}
add_action('sydney_before_site', 'sydney_preloader');

/**
 * Header clone
 */
function sydney_header_clone() {

	$front_header_type 	= get_theme_mod('front_header_type','nothing');
	$site_header_type 	= get_theme_mod('site_header_type');

	if ( class_exists( 'Woocommerce' ) ) {

		if ( is_shop() ) {
			$shop_thumb = get_the_post_thumbnail_url( get_option( 'woocommerce_shop_page_id' ) );

			if ( $shop_thumb ) {
				return;
			}
		} elseif ( is_product_category() ) {
			global $wp_query;
			$cat 				= $wp_query->get_queried_object();
			$thumbnail_id 		= get_term_meta( $cat->term_id, 'thumbnail_id', true );
			$shop_archive_thumb	= wp_get_attachment_url( $thumbnail_id );
			
			if ( $shop_archive_thumb ) {
				return;
			}
		}
	}

	if ( ( $front_header_type == 'nothing' && is_front_page() ) || ( $site_header_type == 'nothing' && !is_front_page() ) ) {
		echo '<div class="header-clone"></div>';
	}
}
add_action('sydney_before_header', 'sydney_header_clone');

/**
 * Get image alt
 */
function sydney_get_image_alt( $image ) {
    global $wpdb;

    if( empty( $image ) ) {
        return false;
    }

    $attachment  = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->posts} WHERE guid=%s;", strtolower( $image ) ) );
    $id   = ( ! empty( $attachment ) ) ? $attachment[0] : 0;

    $alt = get_post_meta( $id, '_wp_attachment_image_alt', true );

    return $alt;
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * from TwentyTwenty
 * 
 * @link https://git.io/vWdr2
 */
function sydney_skip_link_focus_fix() {

	if ( sydney_is_amp() ) { 
		return;
	}
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'sydney_skip_link_focus_fix' );

/**
 * Get SVG code for specific theme icon
 */
function sydney_get_svg_icon( $icon, $echo = false ) {
	$svg_code = wp_kses( //From TwentTwenty. Keeps only allowed tags and attributes
		Sydney_SVG_Icons::get_svg_icon( $icon ),
		array(
			'svg'     => array(
				'class'       => true,
				'xmlns'       => true,
				'width'       => true,
				'height'      => true,
				'viewbox'     => true,
				'aria-hidden' => true,
				'role'        => true,
				'focusable'   => true,
			),
			'path'    => array(
				'fill'      => true,
				'fill-rule' => true,
				'd'         => true,
				'transform' => true,
			),
			'polygon' => array(
				'fill'      => true,
				'fill-rule' => true,
				'points'    => true,
				'transform' => true,
				'focusable' => true,
			),
		)
	);	

	if ( $echo != false ) {
		echo $svg_code; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		return $svg_code;
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Slider
 */
require get_template_directory() . '/inc/slider.php';

/**
 * Styles
 */
require get_template_directory() . '/inc/styles.php';

/**
 * Woocommerce basic integration
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * WPML
 */
if ( class_exists( 'SitePress' ) ) {
	require get_template_directory() . '/inc/integrations/wpml/class-sydney-wpml.php';
}

/**
 * LifterLMS
 */
if ( class_exists( 'LifterLMS' ) ) {
	require get_template_directory() . '/inc/integrations/lifter/class-sydney-lifterlms.php';
}

/**
 * Learndash
 */
if ( class_exists( 'SFWD_LMS' ) ) {
	require get_template_directory() . '/inc/integrations/learndash/class-sydney-learndash.php';
}

/**
 * Learnpress
 */
if ( class_exists( 'LearnPress' ) ) {
	require get_template_directory() . '/inc/integrations/learnpress/class-sydney-learnpress.php';
}

/**
 * AMP
 */
require get_template_directory() . '/inc/integrations/class-sydney-amp.php';

/**
 * Upsell
 */
require get_template_directory() . '/inc/upsell/class-customize.php';

/**
 * Gutenberg
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Fonts
 */
require get_template_directory() . '/inc/fonts.php';

/**
 * SVG codes
 */
require get_template_directory() . '/inc/classes/class-sydney-svg-icons.php';

/**
 * Review notice
 */
require get_template_directory() . '/inc/notices/class-sydney-review.php';

/**
 * Schema
 */
require get_template_directory() . '/inc/schema.php';

/**
 * Theme dashboard.
 */
require get_template_directory() . '/theme-dashboard/class-theme-dashboard.php';

/**
 * Theme dashboard settings.
 */
require get_template_directory() . '/inc/theme-dashboard-settings.php';