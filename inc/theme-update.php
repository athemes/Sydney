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