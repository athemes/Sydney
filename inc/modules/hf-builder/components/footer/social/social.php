<?php
/**
 * Footer Builder
 * Social Component
 * 
 * @package Sydney_Pro
 */

echo '<div class="shfb-builder-item shfb-component-social" data-component-id="social">';
    $this->customizer_edit_button();
    sydney_social_profile( 'social_profiles_footer' );
echo '</div>';