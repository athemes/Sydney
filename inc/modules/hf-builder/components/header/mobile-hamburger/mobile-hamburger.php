<?php
/**
 * Header/Footer Builder
 * Mobile Hamburger Component
 * 
 * @package Sydney_Pro
 */

if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled( 'primary' ) && ! has_nav_menu( 'mobile' ) ) {
    return wp_nav_menu( array( 'theme_location' => 'primary' ) );
}

$icon = get_theme_mod( 'mobile_menu_icon', 'mobile-icon2' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound ?>
<div class="shfb-builder-item shfb-component-mobile_hamburger" data-component-id="mobile_hamburger">
    <?php $this->customizer_edit_button(); ?>
    <a href="#" class="menu-toggle" title="<?php echo esc_attr__( 'Open mobile offcanvas menu', 'sydney' ); ?>">
        <i class="sydney-svg-icon"><?php sydney_get_svg_icon( $icon, true ); ?></i>
    </a>
</div>