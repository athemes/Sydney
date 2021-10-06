<?php
/**
 * Theme update functions
 * 
 * to do: use version compare
 *
 */

/**
 * Migrate blog layout
 */
function sydney_migrate_blog_layout() {

    $flag = get_theme_mod( 'sydney_migrate_blog_layout_flag', false );

    if ( true === $flag ) {
        return;
    }

    //Migrate blog layout
    $layout = get_theme_mod( 'blog_layout', 'classic-alt' );

    if ( 'classic' === $layout || 'modern' === $layout ) {
        set_theme_mod( 'blog_layout', 'layout1' );
    } elseif ( 'classic-alt' === $layout ) {
        set_theme_mod( 'blog_layout', 'layout2' );
    } elseif ( 'fullwidth' === $layout ) {
        set_theme_mod( 'blog_layout', 'layout1' );
        set_theme_mod( 'sidebar_archives', 0 );
    } elseif ( 'masonry-layout' === $layout ) {
        set_theme_mod( 'blog_layout', 'layout5' );
        set_theme_mod( 'sidebar_archives', 0 );
    } 

    //Migrate archives sidebar - only pro
    $fullwidth_archives = get_theme_mod( 'fullwidth_archives', 0 );

    if ( $fullwidth_archives ) {
        set_theme_mod( 'sidebar_archives', 0 );
    }

    //Migrate archive meta
    $hide_meta_index = get_theme_mod( 'hide_meta_index', 0 );
    if ( $hide_meta_index ) {
        set_theme_mod( 'archive_meta_elements', array() );
    }   

    //Migrate single post featured image 
    $post_feat_image = get_theme_mod( 'post_feat_image', 0 );
    if ( $post_feat_image ) {
        set_theme_mod( 'single_post_show_featured', 0 );
    }    

    //Migrate single post sidebar
    $fullwidth_single = get_theme_mod( 'fullwidth_single', 0 );
    if ( $fullwidth_single ) {
        set_theme_mod( 'sidebar_single_post', 0 );
    }

    //Migrate single post nav
    $disable_single_post_nav = get_theme_mod( 'disable_single_post_nav', 0 );
    if ( $disable_single_post_nav ) {
        set_theme_mod( 'single_post_show_post_nav', 0 );
    }

    //Migrate single meta
    $hide_meta_single = get_theme_mod( 'hide_meta_single', 0 );
    if ( $hide_meta_single ) {
        set_theme_mod( 'single_post_meta_elements', array() );
    }   

    //Set flag
    set_theme_mod( 'sydney_migrate_blog_layout_flag', true );
}
add_action( 'init', 'sydney_migrate_blog_layout' );

/**
 * Header update notice
 * 
 * @since 1.8.1
 * 
 */
function sydney_header_update_notice_1_8_1() {

    if ( get_option( 'sydney-update-header-dismiss' ) ) {
        return;
    }
    
    if ( !get_option( 'sydney-update-header' ) ) { ?>

    <div class="notice notice-success thd-theme-dashboard-notice-success is-dismissible">
        <h3><?php esc_html_e( 'Sydney Header Update', 'sydney'); ?></h3>
        <p>
            <?php esc_html_e( 'This version of Sydney comes with a new and improved header. Activate it by clicking the button below and you can access new options.', 'sydney' ); ?>
        </p>

        <p>
            <?php esc_html_e( 'Note 1: this upgrade is optional, there is no need to do it if you are happy with your current header.', 'sydney' ); ?>
        </p>         
        <p>
            <?php esc_html_e( 'Note 2: your current header customizations will be lost and you will have to use the new options to customize your header.', 'sydney' ); ?>
        </p>   
        <p>
            <?php esc_html_e( 'Note 3: this upgrade refers only to the header (site identity and menu bar). It does not change any settings regarding your hero area (slider, video etc).', 'sydney' ); ?>
        </p>    
        <p>
            <?php esc_html_e( 'Note 4: Please take a full backup of your website before upgrading.', 'sydney' ); ?>
        </p>             
        <p>
            <?php echo sprintf( esc_html__( 'Want to see the new header options before upgrading? Check out our %s.', 'sydney' ), '<a target="_blank" href="https://docs.athemes.com/collection/370-sydney">documentation</a>' ); ?>
        </p>
        <a href="#" class="button sydney-update-header" data-nonce="<?php echo esc_attr( wp_create_nonce( 'sydney-update-header-nonce' ) ); ?>" style="margin-top: 15px;"><?php esc_html_e( 'Upgrade Theme Header', 'sydney' ); ?></a>
        <a href="#" class="button sydney-update-header-dismiss" data-nonce="<?php echo esc_attr( wp_create_nonce( 'sydney-update-header-dismiss-nonce' ) ); ?>" style="margin-top: 15px;"><?php esc_html_e( 'Continue to use the old header', 'sydney' ); ?></a> 
    </div>
    <?php }
}
add_action( 'admin_notices', 'sydney_header_update_notice_1_8_1' );


/**
 * Header update ajax callback
 * 
 * @since 1.8.1
 */
function sydney_header_update_notice_1_8_1_callback() {
	check_ajax_referer( 'sydney-update-header-nonce', 'nonce' );

	update_option( 'sydney-update-header', true );

	wp_send_json( array(
		'success' => true
	) );
}
add_action( 'wp_ajax_sydney_header_update_notice_1_8_1_callback', 'sydney_header_update_notice_1_8_1_callback' );

/**
 * Header update ajax callback
 * 
 * @since 1.82
 */
function sydney_header_update_dismiss_notice_1_8_2_callback() {
	check_ajax_referer( 'sydney-update-header-dismiss-nonce', 'nonce' );

	update_option( 'sydney-update-header-dismiss', true );

	wp_send_json( array(
		'success' => true
	) );
}
add_action( 'wp_ajax_sydney_header_update_dismiss_notice_1_8_2_callback', 'sydney_header_update_dismiss_notice_1_8_2_callback' );