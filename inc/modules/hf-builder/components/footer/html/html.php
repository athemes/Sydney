<?php
/**
 * Footer Builder
 * HTML Component
 * 
 * @package Sydney_Pro
 */ 

$footer_html_content = get_theme_mod( 'footer_html_content', '' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
if( ! $footer_html_content ) {
    return '';
} ?>

<div class="shfb-builder-item shfb-component-html" data-component-id="html">
    <?php $this->customizer_edit_button(); ?>
    <div class="footer-html">
        <?php echo wp_kses_post( $footer_html_content ); ?>
    </div>
</div>