<?php
/**
 * Header/Footer Builder
 * WooCommerce Icons component
 * 
 * @package Sydney_Pro
 */

if ( ! class_exists( 'WooCommerce' ) ) {
    return;
}

echo '<div class="shfb-builder-item shfb-component-woo_icons" data-component-id="woo_icons">'; 
    $this->customizer_edit_button();
    
    echo sydney_woocommerce_header_cart( true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped    
echo '</div>';