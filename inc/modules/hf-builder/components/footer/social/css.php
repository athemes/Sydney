<?php
/**
 * Footer Builder
 * Social Icons Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'shfb_footer_social_visibility', 
    'visible', 
    '.shfb.shfb-footer .shfb-builder-item.shfb-component-social', 
    'display',
    ''
);

// Icon Color
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_footer_social_color', '', '.shfb-footer .shfb-component-social .social-profile > a svg' );

// Icon Color Hover
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_footer_social_color_hover', '', '.shfb-footer .shfb-component-social .social-profile > a:hover svg' );

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_footer_social_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-footer .shfb-component-social', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'shfb_footer_social_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-footer .shfb-component-social', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound