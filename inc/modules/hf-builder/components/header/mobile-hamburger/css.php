<?php
/**
 * Header/Footer Builder
 * Mobile Hamburger Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'shfb_mobile_hamburger_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-mobile_hamburger', 
    'display',
    ''
);

// Icon Color
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_mobile_hamburger_icon_color', '#212121', '.shfb-component-mobile_hamburger .menu-toggle svg' );

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_mobile_hamburger_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-mobile_hamburger', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_mobile_hamburger_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-mobile_hamburger', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound