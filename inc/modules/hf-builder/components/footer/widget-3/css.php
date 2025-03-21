<?php
/**
 * Footer Builder
 * Widget 3 CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'sydney_section_fb_component__widget3_visibility', 
    'visible', 
    '.shfb.shfb-footer .shfb-builder-item.shfb-component-widget3', 
    'display',
    ''
);

// Widget Title Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_fb_component__widget3_title_color', '', '.shfb-footer .shfb-component-widget3 .widget-column .widget .widget-title' );

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_fb_component__widget3_text_color', '', '.shfb-footer .shfb-component-widget3 .widget-column .widget' );

// Links Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_fb_component__widget3_links_color', '', '.shfb-footer .shfb-component-widget3 .widget-column .widget a' );

// Links Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_fb_component__widget3_links_color_hover', '', '.shfb-footer .shfb-component-widget3 .widget-column .widget a:hover' );

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_fb_component__widget3_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-footer .shfb-component-widget3', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_fb_component__widget3_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-footer .shfb-component-widget3', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound