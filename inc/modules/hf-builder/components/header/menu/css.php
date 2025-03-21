<?php
/**
 * Header/Footer Builder
 * Primary Menu CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'sydney_section_hb_component__menu_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-menu', 
    'display',
    ''
);

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_main_header_color', '', '.shfb .main-navigation a.sydney-dropdown-link' );
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_main_header_color', '', '.shfb .main-navigation a.sydney-dropdown-link + .dropdown-symbol svg' );

// Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_main_header_color_hover', '', '.shfb .main-navigation a.sydney-dropdown-link:hover' );
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_main_header_color_hover', '', '.shfb .main-navigation a.sydney-dropdown-link:hover + .dropdown-symbol svg' );

// Submenu Background
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_main_header_submenu_background', '', '.shfb .sub-menu.sydney-dropdown-ul, .shfb .sub-menu.sydney-dropdown-ul li.sydney-dropdown-li' );

// Submenu Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_main_header_submenu_color', '', '.shfb .main-navigation .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link' );
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_main_header_submenu_color', '', '.shfb .main-navigation .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link + .dropdown-symbol svg' );

// Submenu Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_main_header_submenu_color_hover', '', '.shfb .main-navigation .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link:hover' );
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_main_header_submenu_color_hover', '', '.shfb .main-navigation .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link:hover + .dropdown-symbol svg' );

// Sticky Header - Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_main_header_sticky_active_color', '', '.sticky-header-active .shfb .main-navigation a.sydney-dropdown-link' );
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_main_header_sticky_active_color', '', '.sticky-header-active .shfb .main-navigation a.sydney-dropdown-link + .dropdown-symbol svg' );

// Sticky Header - Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_main_header_sticky_active_color_hover', '', '.sticky-header-active .shfb .main-navigation a.sydney-dropdown-link:hover' );
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_main_header_sticky_active_color_hover', '', '.sticky-header-active .shfb .main-navigation a.sydney-dropdown-link:hover + .dropdown-symbol svg' );

// Sticky Header - Submenu Background
$css .= Sydney_Custom_CSS::get_background_color_css( 'shfb_main_header_sticky_active_submenu_background_color', '', '.sticky-header-active .shfb .sub-menu.sydney-dropdown-ul, .sticky-header-active .shfb .sub-menu.sydney-dropdown-ul li.sydney-dropdown-li' );

// Sticky Header - Submenu Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_main_header_sticky_active_submenu_color', '', '.sticky-header-active .shfb .main-navigation .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link' );
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_main_header_sticky_active_submenu_color', '', '.sticky-header-active .shfb .main-navigation .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link + .dropdown-symbol svg' );

// Sticky Header - Submenu Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'shfb_main_header_sticky_active_submenu_color_hover', '', '.sticky-header-active .shfb .main-navigation .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link:hover' );
$css .= Sydney_Custom_CSS::get_fill_css( 'shfb_main_header_sticky_active_submenu_color_hover', '', '.sticky-header-active .shfb .main-navigation .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link:hover + .dropdown-symbol svg' );

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_hb_component__menu_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-header .shfb-component-menu', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'sydney_section_hb_component__menu_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-header .shfb-component-menu', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound