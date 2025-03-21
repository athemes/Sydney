<?php
/**
 * Header/Footer Builder
 * Button Component CSS Output
 * 
 * @package Sydney_Pro
 */

/**
 * Default State
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'shfb_button_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-button, .shfb-mobile_offcanvas .shfb-builder-item.shfb-component-button', 
    'display',
    ''
);

// Background Color
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_button_background_color', '#212121', '.shfb-component-button .button', true );

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_button_color', '#FFF', '.shfb-component-button .button', true );

// Border Color
$css .= Sydney_Custom_CSS::get_border_color_css( 'shfb_button_border_color', '#212121', '.shfb-component-button .button', true );

/**
 * Hover State
 */

// Background Color
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_button_background_color_hover', '#757575', '.shfb-component-button .button:hover', true );

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_button_color_hover', '#FFF', '.shfb-component-button .button:hover', true );

// Border Color
$css .= Sydney_Custom_CSS::get_border_color_css( 'shfb_button_border_color_hover', '#757575', '.shfb-component-button .button:hover', true );

/**
 * Sticky Header Active State
 */
if( sydney_callback_sticky_header() ) {

    /**
     * Default State
     */

    // Background Color
    $css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_button_sticky_background_color', '#212121', '.sticky-header-active .shfb-component-button .button', true );

    // Text Color
    $css .= Sydney_Custom_CSS::get_color_css( 'shfb_button_sticky_color', '#FFF', '.sticky-header-active .shfb-component-button .button', true );

    // Border Color
    $css .= Sydney_Custom_CSS::get_border_color_css( 'shfb_button_sticky_border_color', '#212121', '.sticky-header-active .shfb-component-button .button', true );

    /**
     * Hover State
     */

    // Background Color
    $css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_button_sticky_background_color_hover', '#757575', '.sticky-header-active .shfb-component-button .button:hover', true );

    // Text Color
    $css .= Sydney_Custom_CSS::get_color_css( 'shfb_button_sticky_color_hover', '#757575', '.sticky-header-active .shfb-component-button .button:hover', true );

    // Border Color
    $css .= Sydney_Custom_CSS::get_border_color_css( 'shfb_button_sticky_border_color_hover', '#757575', '.sticky-header-active .shfb-component-button .button:hover', true );

}

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_button_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-header .shfb-component-button', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_button_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-header .shfb-component-button', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound