<?php
/**
 * Header/Footer Builder
 * Mobile Offcanvas Menu Component CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Sydney_Custom_CSS::get_responsive_css( 
    'mobile_offcanvas_menu_visibility', 
    'visible', 
    '.shfb.shfb-header .shfb-builder-item.shfb-component-mobile_offcanvas_menu, .shfb-mobile_offcanvas .shfb-builder-item.shfb-component-mobile_offcanvas_menu', 
    'display',
    ''
);

// Link Separator Color and Size.
$mobile_menu_link_separator 	= get_theme_mod( 'mobile_menu_link_separator', 0 );
$link_separator_color 			= get_theme_mod( 'link_separator_color', 'rgba(238, 238, 238, 0.14)' );
$mobile_header_separator_width	= get_theme_mod( 'mobile_header_separator_width', 1 );

    $css .= ".sydney-offcanvas-menu .sydney-dropdown ul li { padding-top: 5px; border-bottom: " . intval( $mobile_header_separator_width ) . "px solid " . esc_attr( $link_separator_color ) . ";}";
    $css .= ".sydney-offcanvas-menu #mainnav ul ul li:first-of-type { margin-top:5px;border-top: 1px solid rgba(238, 238, 238, 0.14); }";
// Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'mobile_offcanvas_menu_color', '#ffffff', '.shfb.shfb-mobile_offcanvas #mainnav a.sydney-dropdown-link' );
$css .= Sydney_Custom_CSS::get_fill_css( 'mobile_offcanvas_menu_color', '#ffffff', '.shfb.shfb-mobile_offcanvas #mainnav a.sydney-dropdown-link + .dropdown-symbol svg' );

// Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'mobile_offcanvas_menu_color_hover', '#ffffff', '.shfb.shfb-mobile_offcanvas #mainnav a.sydney-dropdown-link:hover' );
$css .= Sydney_Custom_CSS::get_fill_css( 'mobile_offcanvas_menu_color_hover', '#ffffff', '.shfb.shfb-mobile_offcanvas #mainnav a.sydney-dropdown-link:hover + .dropdown-symbol svg' );

// Submenu Text Color
$css .= Sydney_Custom_CSS::get_color_css( 'mobile_offcanvas_menu_submenu_color', '#ffffff', '.shfb.shfb-mobile_offcanvas #mainnav .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link' );
$css .= Sydney_Custom_CSS::get_fill_css( 'mobile_offcanvas_menu_submenu_color', '#ffffff', '.shfb.shfb-mobile_offcanvas #mainnav .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link + .dropdown-symbol svg' );

// Submenu Text Color Hover
$css .= Sydney_Custom_CSS::get_color_css( 'mobile_offcanvas_menu_submenu_color_hover', '#ffffff', '.shfb.shfb-mobile_offcanvas #mainnav .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link:hover' );
$css .= Sydney_Custom_CSS::get_fill_css( 'mobile_offcanvas_menu_submenu_color_hover', '#ffffff', '.shfb.shfb-mobile_offcanvas #mainnav .sub-menu.sydney-dropdown-ul a.sydney-dropdown-link:hover + .dropdown-symbol svg' );

$mobile_menu_alignment = get_theme_mod( 'mobile_menu_alignment', 'left' );
$css .= ".sydney-offcanvas-menu .mainnav ul li,.mobile-header-item.offcanvas-items,.mobile-header-item.offcanvas-items .social-profile { text-align:" . esc_attr( $mobile_menu_alignment ) . ";}" . "\n";
$css .= ".sydney-offcanvas-menu #mainnav ul li { text-align:" . esc_attr( $mobile_menu_alignment ) . ";}" . "\n";
if ( 'center' === $mobile_menu_alignment ) {
    $css .= ".sydney-offcanvas-menu .header-item.header-woo {justify-content:center;} .mobile-header-item.offcanvas-items .button {align-self:center;}" . "\n";
} elseif ( 'right' === $mobile_menu_alignment ) {
    $css .= ".sydney-offcanvas-menu .header-item.header-woo {justify-content:flex-end;} .mobile-header-item.offcanvas-items .button {align-self:flex-end;}" . "\n";
}

// Padding
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'mobile_offcanvas_menu_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-mobile_offcanvas_menu', 
    'padding'
);

// Margin
$css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
    'mobile_offcanvas_menu_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.shfb-component-mobile_offcanvas_menu', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound