<?php
/**
 * Woocommerce wrappers
 *
 * @package Sydney
 */


if ( !class_exists('WooCommerce') )
    return;

/**
 * Declare support
 */
function sydney_wc_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'sydney_wc_support' );

/**
 * Add and remove actions
 */
function sydney_woo_actions() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
    add_action('woocommerce_before_main_content', 'sydney_wc_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'sydney_wc_wrapper_end', 10);
}
add_action('wp','sydney_woo_actions');

/**
 * Theme wrappers
 */
function sydney_wc_wrapper_start() {

    $archive_check = sydney_wc_archive_check();
    $rs_archives = get_theme_mod( 'swc_sidebar_archives' );
    $rs_products = get_theme_mod( 'swc_sidebar_products', 1 );

    if ( ( $archive_check && $rs_archives ) || ( is_product() && $rs_products ) ) {
        $cols = 'col-md-12';
    } else {
        $cols = 'col-md-9';
    }

    echo '<div id="primary" class="content-area ' . $cols . '">';
        echo '<main id="main" class="site-main" role="main">';
}

function sydney_wc_wrapper_end() {
        echo '</main>';
    echo '</div>';
}

/**
 * Archive titles
 */
function sydney_woo_archive_title() {
    echo '<h3 class="archive-title">';
    echo woocommerce_page_title();
    echo '</h3>';
}
add_filter( 'woocommerce_show_page_title', 'sydney_woo_archive_title' );

/**
 * Remove default WooCommerce CSS
 */
function sydney_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] ); 
    return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', 'sydney_dequeue_styles' );

/**
 * Enqueue custom CSS for Woocommerce
 */
function sydney_woocommerce_css() {
    wp_enqueue_style( 'sydney-wc-css', get_template_directory_uri() . '/woocommerce/css/wc.css' );
}
add_action( 'wp_enqueue_scripts', 'sydney_woocommerce_css', 1 );

/**
 * Number of related products
 */
function sydney_related_products_args( $args ) {
    $args['posts_per_page'] = 3;
    $args['columns'] = 3;
    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'sydney_related_products_args' );

/**
 * Variable products button
 */
function sydney_single_variation_add_to_cart_button() {
    global $product;
    ?>
    <div class="woocommerce-variation-add-to-cart variations_button">
        <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

        <?php
            do_action( 'woocommerce_before_add_to_cart_quantity' );

            woocommerce_quantity_input( array(
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1,
            ) );

            do_action( 'woocommerce_after_add_to_cart_quantity' );
        ?>
        <button type="submit" class="roll-button cart-button"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
        <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
        <input type="hidden" name="variation_id" class="variation_id" value="0" />
    </div>
     <?php
}
add_action( 'woocommerce_single_variation', 'sydney_single_variation_add_to_cart_button', 21 );

/**
 * Add SVG cart icon to loop add to cart button
 */
function sydney_add_loop_cart_icon() {

    global $product;

    $type = $product->get_type();
    
    if ( 'simple' == $type ) {
        $icon = '<span><i class="sydney-svg-icon">' . sydney_get_svg_icon( 'icon-add-cart', false ) . '</i></span> ';
    } else {
        $icon = '';
    }

	return sprintf(
		'<div class="loop-button-wrapper"><a href="%s" data-quantity="%s" class="%s" %s>' . $icon . '%s</a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
    );  

}
add_filter( 'woocommerce_loop_add_to_cart_link', 'sydney_add_loop_cart_icon' );

/**
 * Remove sidebar from all archives
 */
function sydney_remove_wc_sidebar_archives() {
    $archive_check = sydney_wc_archive_check();
    $rs_archives = get_theme_mod( 'swc_sidebar_archives' );
    $rs_products = get_theme_mod( 'swc_sidebar_products', 1 );

    if ( ( $rs_archives && $archive_check ) || ( $rs_products && is_product() ) ) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }   
}
add_action( 'wp', 'sydney_remove_wc_sidebar_archives' );

/**
 * Returns true if current page is shop, product archive or product tag
 */
function sydney_wc_archive_check() {
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Filter quick view button from YITH to remove the text
 */
function sydney_filter_yith_wcqv_button() {

    global $product;
    
    $product_id = $product->get_id();

    $button = '<a href="#" class="yith-wcqv-button" data-product_id="' . esc_attr( $product_id ) . '">' . sydney_get_svg_icon( 'icon-search', false ) . '</a>';
    return $button;
}
add_filter( 'yith_add_quick_view_button_html', 'sydney_filter_yith_wcqv_button' );


function sydney_add_yith_placeholder() {
    echo '<div class="yith-placeholder"></div>';
}
add_action( 'woocommerce_before_shop_loop_item', 'sydney_add_yith_placeholder' );

/**
 * Remove additional titles from Woocommerce tabs
 */
add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );
add_filter( 'woocommerce_product_description_heading', '__return_false' );