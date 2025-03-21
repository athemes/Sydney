<?php
/**
 * Footer Builder
 * Widget 1 Component
 * 
 * @package Sydney_Pro
 */ 
?>

<div class="shfb-builder-item shfb-component-widget1" data-component-id="widget1">
    <?php $this->customizer_edit_button(); ?>
    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
        <div class="footer-widget">
            <div class="widget-column">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </div>
        </div>
    <?php endif; ?>
</div>