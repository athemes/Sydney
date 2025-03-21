<?php
/**
 * Header/Footer Builder
 * Secondary Menu CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'secondary_menu_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-secondary_menu, .shfb-mobile_offcanvas .shfb-builder-item.shfb-component-secondary_menu', 
    'display',
    ''
);

// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'secondary_menu_color', '#212121', '.shfb .secondary-navigation a.sydney-dropdown-link' );
$css .= Sydney_Custom_CSS::get_fill_css( 'secondary_menu_color', '#212121', '.shfb .secondary-navigation a.sydney-dropdown-link + .dropdown-symbol svg' );

// Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'secondary_menu_color_hover', '#757575', '.shfb .secondary-navigation a.sydney-dropdown-link:hover' );
$css .= Sydney_Custom_CSS::get_fill_css( 'secondary_menu_color_hover', '#757575', '.shfb .secondary-navigation a.sydney-dropdown-link:hover + .dropdown-symbol svg' );

// Submenu Background
$css .= Sydney_Custom_CSS::get_background_color_css( 'secondary_menu_submenu_background', '#FFF', '.shfb .secondary-navigation .sub-menu.sydney-dropdown-ul, .shfb .secondary-navigation .sub-menu.sydney-dropdown-ul li.sydney-dropdown-li' );

// Submenu Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'secondary_menu_submenu_color', '#212121', '.shfb .secondary-navigation .sub-menu.sydney-dropdown-ul a' );
$css .= Sydney_Custom_CSS::get_fill_css( 'secondary_menu_submenu_color', '#212121', '.shfb .secondary-navigation .sub-menu.sydney-dropdown-ul a + .dropdown-symbol svg' );

// Submenu Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'secondary_menu_submenu_color_hover', '#757575', '.shfb .secondary-navigation .sub-menu.sydney-dropdown-ul a:hover' );
$css .= Sydney_Custom_CSS::get_fill_css( 'secondary_menu_submenu_color_hover', '#757575', '.shfb .secondary-navigation .sub-menu.sydney-dropdown-ul a:hover + .dropdown-symbol svg' );

if( sydney_callback_sticky_header() ) {
    // Sticky Header - Text Color
    $css .= Sydney_Custom_CSS::get_color_css( 'secondary_menu_sticky_color', '#212121', '.sticky-header-active .shfb .secondary-navigation a.sydney-dropdown-link' );
    $css .= Sydney_Custom_CSS::get_fill_css( 'secondary_menu_sticky_color', '#212121', '.sticky-header-active .shfb .secondary-navigation a.sydney-dropdown-link + .dropdown-symbol svg' );
    
    // Sticky Header - Text Color Hover
    $css .= Sydney_Custom_CSS::get_color_css( 'secondary_menu_sticky_color_hover', '#757575', '.sticky-header-active .shfb .secondary-navigation a.sydney-dropdown-link:hover' );
    $css .= Sydney_Custom_CSS::get_fill_css( 'secondary_menu_sticky_color_hover', '#757575', '.sticky-header-active .shfb .secondary-navigation a.sydney-dropdown-link:hover + .dropdown-symbol svg' );
    
    // Sticky Header - Submenu Background
    $css .= Sydney_Custom_CSS::get_background_color_css( 'secondary_menu_sticky_submenu_background', '#FFF', '.sticky-header-active .shfb .secondary-navigation .sub-menu.sydney-dropdown-ul, .sticky-header-active .shfb .secondary-navigation .sub-menu.sydney-dropdown-ul li.sydney-dropdown-li' );
    
    // Sticky Header - Submenu Text Color
    $css .= Sydney_Custom_CSS::get_color_css( 'secondary_menu_sticky_submenu_color', '#212121', '.sticky-header-active .shfb .secondary-navigation .sub-menu.sydney-dropdown-ul a' );
    $css .= Sydney_Custom_CSS::get_fill_css( 'secondary_menu_sticky_submenu_color', '#212121', '.sticky-header-active .shfb .secondary-navigation .sub-menu.sydney-dropdown-ul a + .dropdown-symbol svg' );
    
    // Sticky Header - Submenu Text Color Hover
    $css .= Sydney_Custom_CSS::get_color_css( 'secondary_menu_sticky_submenu_color_hover', '#757575', '.sticky-header-active .shfb .secondary-navigation .sub-menu.sydney-dropdown-ul a:hover' );
    $css .= Sydney_Custom_CSS::get_fill_css( 'secondary_menu_sticky_submenu_color_hover', '#757575', '.sticky-header-active .shfb .secondary-navigation .sub-menu.sydney-dropdown-ul a:hover + .dropdown-symbol svg' );
}

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'secondary_menu_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb .secondary-navigation', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'secondary_menu_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb .secondary-navigation', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound