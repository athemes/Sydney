<?php
/**
 * Header/Footer Builder
 * Contact Info Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'shfb_contact_info_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-contact_info, .shfb-mobile_offcanvas .shfb-builder-item.shfb-component-contact_info', 
    'display',
    ''
);

// Icons Color
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_contact_info_icon_color', '#212121', '.shfb-component-contact_info .header-contact > a svg' );

// Icons Color Hover
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_contact_info_icon_color_hover', '#757575', '.shfb-component-contact_info .header-contact > a:hover svg' );

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_contact_info_text_color', '#212121', '.shfb-component-contact_info .header-contact > a' );

// Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_contact_info_text_color_hover', '#757575', '.shfb-component-contact_info .header-contact > a:hover' );

// Sticky Header Active
if( sydney_callback_sticky_header() ) {

    // Icons Color
    $css .= Sydney_Custom_CSS::get_fill_css( 'shfb_contact_info_icon_sticky_color', '#212121', '.sticky-header-active .shfb-component-contact_info .header-contact > a svg' );

    // Icons Color Hover
    $css .= Sydney_Custom_CSS::get_fill_css( 'shfb_contact_info_icon_sticky_color_hover', '#757575', '.sticky-header-active .shfb-component-contact_info .header-contact > a:hover svg' );

    // Text Color
    $css .= Sydney_Custom_CSS::get_color_css( 'shfb_contact_info_text_sticky_color', '#212121', '.sticky-header-active .shfb-component-contact_info .header-contact > a' );

    // Text Color Hover
    $css .= Sydney_Custom_CSS::get_color_css( 'shfb_contact_info_text_sticky_color_hover', '#757575', '.sticky-header-active .shfb-component-contact_info .header-contact > a:hover' );

}

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_contact_info_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-contact_info', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_contact_info_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-contact_info', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound