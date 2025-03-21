<?php
/**
 * Header/Footer Builder
 * Menu Component
 * 
 * @package Sydney_Pro
 */

echo '<div class="shfb-builder-item shfb-component-menu" data-component-id="menu">';
    $this->customizer_edit_button();
    if ( function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled( 'primary' ) ) : ?>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    <?php else: 
        $has_hover_delay = get_option( 'sydney_dropdowns_hover_delay', 'yes' );
        ?>
        <nav id="site-navigation" class="sydney-dropdown main-navigation<?php echo 'yes' === $has_hover_delay ? ' with-hover-delay' : ''; ?>" <?php sydney_get_schema( 'nav' ); ?>>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => has_nav_menu( 'primary' ) ? 'primary' : '',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'sydney-dropdown-ul menu',

                    /**
                     * Hook 'sydney_primary_wp_nav_menu_walker'
                     *
                     * @since 1.0.0
                     */
                    'walker'         => apply_filters( 'sydney_primary_wp_nav_menu_walker', '' ),
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    <?php endif;
echo '</div>';
