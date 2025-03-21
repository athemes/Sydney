<?php
/**
 * Header/Footer Builder
 * Search Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'shfb_search_icon_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-search, .shfb-mobile_offcanvas .shfb-builder-item.shfb-component-search', 
    'display',
    ''
);

// Icon Color
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_search_icon_color', '#212121', '.shfb-component-search .header-search svg' );
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_search_icon_color', '#212121', '.shfb-component-search .header-search .sydney-image.is-svg' );

// Icon Color Hover
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_search_icon_color_hover', '#757575', '.shfb-component-search .header-search:hover svg' );
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_search_icon_color_hover', '#757575', '.shfb-component-search .header-search:hover .sydney-image.is-svg' );

if( sydney_callback_sticky_header() ) {
    // Sticky Header - Icon Color
    $css .= Sydney_Custom_CSS::get_fill_css( 'shfb_search_icon_sticky_color', '#212121', '.sticky-header-active .shfb-component-search .header-search svg' );
    $css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_search_icon_sticky_color', '#212121', '.sticky-header-active .shfb-component-search .header-search .sydney-image.is-svg' );

    // Sticky Header - Icon Color Hover
    $css .= Sydney_Custom_CSS::get_fill_css( 'shfb_search_icon_sticky_color_hover', '#757575', '.sticky-header-active .shfb-component-search .header-search:hover svg' );
    $css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_search_icon_sticky_color_hover', '#757575', '.sticky-header-active .shfb-component-search .header-search:hover .sydney-image.is-svg' );
}

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_search_icon_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-search', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_search_icon_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-search', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound