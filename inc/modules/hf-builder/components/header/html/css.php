<?php
/**
 * Header/Footer Builder
 * HTML Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Text Alignment
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'sydney_section_hb_component__html_text_align', 
    array( 'desktop' => 'left', 'tablet' => 'left', 'mobile' => 'left' ), 
    '.shfb.shfb-header .shfb-component-html',
    'text-align',
    '' 
);

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'sydney_section_hb_component__html_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-html, .shfb-mobile_offcanvas .shfb-builder-item.shfb-component-html', 
    'display',
    ''
);

/**
 * Colors Default State
 */

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_hb_component__html_text_color', '', '.shfb.shfb-header .shfb-component-html' );

// Links Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_hb_component__html_link_color', '', '.shfb.shfb-header .shfb-component-html a' );

// Links Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_hb_component__html_link_color_hover', '', '.shfb.shfb-header .shfb-component-html a:hover' );

/** 
 * Colors Sticky Header State
 */

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_hb_component__html_sticky_text_color', '', '.sticky-header-active .shfb.shfb-header .shfb-component-html' );

// Links Color
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_hb_component__html_sticky_link_color', '', '.sticky-header-active .shfb.shfb-header .shfb-component-html a' );

// Links Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'sydney_section_hb_component__html_sticky_link_color_hover', '', '.sticky-header-active .shfb.shfb-header .shfb-component-html a:hover' );

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_hb_component__html_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb.shfb-header .shfb-component-html', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_hb_component__html_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb.shfb-header .shfb-component-html', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound