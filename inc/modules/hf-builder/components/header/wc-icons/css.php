<?php
/**
 * Header/Footer Builder
 * WooCommerce Icons Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'shfb_woo_icons_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-woo_icons, .shfb-mobile_offcanvas .shfb-builder-item.shfb-component-woo_icons', 
    'display',
    ''
);

// Icon Color
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_woo_icons_color', '#212121', '.shfb-component-woo_icons .header-item svg:not(.stroke-based)' );
$css .= Sydney_Custom_CSS::get_stroke_css( 'shfb_woo_icons_color', '#212121', '.shfb-component-woo_icons .header-item svg.stroke-based' );
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_woo_icons_color', '#212121', '.shfb-component-woo_icons .header-item .sydney-image.is-svg' );

// Icon Color Hover
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_woo_icons_color_hover', '#757575', '.shfb-component-woo_icons .header-item:hover svg:not(.stroke-based)' );
$css .= Sydney_Custom_CSS::get_stroke_css( 'shfb_woo_icons_color_hover', '#757575', '.shfb-component-woo_icons .header-item:hover svg.stroke-based' );
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_woo_icons_color_hover', '#757575', '.shfb-component-woo_icons .header-item:hover .sydney-image.is-svg' );

// Mini Cart Count Background Color
$css .= Sydney_Custom_CSS::get_background_color_css( 'main_header_minicart_count_background_color', '#ff5858', '.shfb-component-woo_icons .site-header-cart .count-number, .shfb-component-woo_icons .header-wishlist-icon .count-number' );
$css .= Sydney_Custom_CSS::get_border_color_css( 'main_header_minicart_count_background_color', '#ff5858', '.shfb-component-woo_icons .site-header-cart .count-number, .shfb-component-woo_icons .header-wishlist-icon .count-number' );

// Mini Cart Count Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'main_header_minicart_count_text_color', '#FFF', '.shfb-component-woo_icons .site-header-cart .count-number, .shfb-component-woo_icons .header-wishlist-icon .count-number' );

if( sydney_callback_sticky_header() ) {
    // Sticky Header - Icon Color
    $css .= Sydney_Custom_CSS::get_fill_css( 'shfb_woo_icons_sticky_color', '#212121', '.sticky-header-active .shfb-component-woo_icons .header-item svg:not(.stroke-based)' );
    $css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_woo_icons_sticky_color', '#212121', '.sticky-header-active .shfb-component-woo_icons .header-item .sydney-image.is-svg' );

    // Sticky Header - Icon Color Hover
    $css .= Sydney_Custom_CSS::get_fill_css( 'shfb_woo_icons_sticky_color_hover', '#757575', '.sticky-header-active .shfb-component-woo_icons .header-item:hover svg:not(.stroke-based)' );
    $css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_woo_icons_sticky_color_hover', '#757575', '.sticky-header-active .shfb-component-woo_icons .header-item:hover .sydney-image.is-svg' );
}

// Elements spacing.
$css .= Sydney_Custom_CSS::get_variables_css(
    '.shfb-component-woo_icons .header-item',
    array(
        array(
            'setting'  => 'shfb_woo_icons_space_between_icons',
            'defaults' => array( 'desktop' => 25, 'tablet'  => 25, 'mobile'  => 25 ),
            'name'     => '--bt-shfb-woo-icons-gap',
            'unit'     => 'px',
        ),
    ),
);

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_woo_icons_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-woo_icons', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_woo_icons_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-woo_icons', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound