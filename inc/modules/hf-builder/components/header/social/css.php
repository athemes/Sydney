<?php
/**
 * Header/Footer Builder
 * Social Icons Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'shfb_social_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-social, .shfb-mobile_offcanvas .shfb-builder-item.shfb-component-social',
    'display',
    ''
);

// Icon Color
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_social_color', '#212121', '.shfb-component-social .social-profile > a svg' );

// Icon Color Hover
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_social_color_hover', '#757575', '.shfb-component-social .social-profile > a:hover svg' );

if( sydney_callback_sticky_header() ) {
    // Sticky Header - Icon Color
    $css .= Sydney_Custom_CSS::get_fill_css( 'shfb_social_sticky_color', '#212121', '.sticky-header-active .shfb-component-social .social-profile > a svg' );
    
    // Sticky Header - Icon Color Hover
    $css .= Sydney_Custom_CSS::get_fill_css( 'shfb_social_sticky_color_hover', '#757575', '.sticky-header-active .shfb-component-social .social-profile > a:hover svg' );
}

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_social_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-header .shfb-component-social', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_social_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-header .shfb-component-social', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound