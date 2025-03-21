<?php
/**
 * Footer Builder
 * Button 1 Component CSS Output
 * 
 * @package Sydney_Pro
 */

/**
 * Default State
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'shfb_footer_button_visibility', 
    'visible', 
    '.shfb.shfb-footer .shfb-builder-item.shfb-component-button', 
    'display',
    ''
);

// Background Color
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_footer_button_background_color', '', '.shfb-footer .shfb-component-button .button', true );

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_footer_button_color', '', '.shfb-footer .shfb-component-button .button', true );

// Border Color
$css .= Sydney_Custom_CSS::get_border_color_css( 'shfb_footer_button_border_color', '', '.shfb-footer .shfb-component-button .button', true );

/**
 * Hover State
 */

// Background Color
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_footer_button_background_color_hover', '', '.shfb-footer .shfb-component-button .button:hover', true );

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_footer_button_color_hover', '', '.shfb-footer .shfb-component-button .button:hover', true );

// Border Color
$css .= Sydney_Custom_CSS::get_border_color_css( 'shfb_footer_button_border_color_hover', '', '.shfb-footer .shfb-component-button .button:hover', true );

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_footer_button_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-footer .shfb-component-button', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_footer_button_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-footer .shfb-component-button', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound