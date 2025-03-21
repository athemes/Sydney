<?php
/**
 * Header/Footer Builder
 * Header Builder CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_fb_wrapper__footer_builder_padding', 
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-footer', 
    'padding'
);

// Background Image
$fb_background_image = get_theme_mod( 'sydney_section_fb_wrapper__footer_builder_background_image', '' );
if( $fb_background_image ) {
    $image_url           = wp_get_attachment_image_url( $fb_background_image, 'full' );
    $background_size     = get_theme_mod( 'sydney_section_fb_wrapper__footer_builder_background_size', 'cover' );
    $background_position = get_theme_mod( 'sydney_section_fb_wrapper__footer_builder_background_position', 'center' );
    $background_repeat   = get_theme_mod( 'sydney_section_fb_wrapper__footer_builder_background_repeat', 'no-repeat' );

    $css .= '.shfb-footer { background-image: url(' . esc_url( $image_url ) . '); }';
    $css .= Sydney_Custom_CSS::get_css( 
        'sydney_section_fb_wrapper__footer_builder_background_size', 
        'cover', 
        '.shfb-footer', 
        'background-size', 
        '' 
    );
    $css .= Sydney_Custom_CSS::get_css( 
        'sydney_section_fb_wrapper__footer_builder_background_position', 
        'center', 
        '.shfb-footer', 
        'background-position', 
        '' 
    );
    $css .= Sydney_Custom_CSS::get_css( 
        'sydney_section_fb_wrapper__footer_builder_background_repeat', 
        'no-repeat', 
        '.shfb-footer', 
        'background-repeat', 
        '' 
    );
}

// Background Color
$css .= Sydney_Custom_CSS::get_background_color_css( 'sydney_section_fb_wrapper__footer_builder_background_color', '', '.shfb-footer' );

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound