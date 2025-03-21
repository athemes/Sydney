<?php
/**
 * Footer Builder
 * Copyright/credits Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'sydney_section_fb_component__copyright_visibility', 
    'visible', 
    '.shfb.shfb-footer .shfb-builder-item.shfb-component-copyright',
    'display',
    ''
);

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_fb_component__copyright_text_color', '', '.shfb .sydney-credits' );

// Links Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_fb_component__copyright_links_color', '', '.shfb .sydney-credits a' );

// Links Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_fb_component__copyright_links_color_hover', '', '.shfb .sydney-credits a:hover' );

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_fb_component__copyright_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-copyright', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_fb_component__copyright_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-copyright', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound