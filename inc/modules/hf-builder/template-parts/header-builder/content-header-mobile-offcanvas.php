<?php
/**
 * Header Builder.
 * Header Mobile Offcanvas Template File.
 * 
 * @package Sydney
 * @var array $args Contains mobile offcanvas data
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
$row_data   = $args[ 'row_data' ];
$device     = 'mobile';

$component_args = array(
    'builder_type' => 'header',
    'device'       => $device
);

if( $row_data === NULL ) {
    return;
}

$elements = $row_data->mobile_offcanvas;

// Get instance from shfb class
$shfb = Sydney_Header_Footer_Builder::get_instance(); ?>

<div class="container">
    <div class="shfb-row shfb-cols-1">
        <?php 
        if( is_array( $elements[0] ) && count( $elements[0] ) > 0 ) : ?>

            <div class="shfb-column shfb-mobile-offcanvas-col">
                <?php foreach( $elements[0] as $component_callback ) {
                    if( method_exists( $shfb, $component_callback  ) ) {
                        call_user_func( array( $shfb, $component_callback ), $component_args );
                    } else if( class_exists( 'Sydney_Pro_HF_Builder_Components' ) ) {
                        $bp_bphfbc = Sydney_Pro_HF_Builder_Components::get_instance();

                        if( method_exists( $bp_bphfbc, $component_callback  ) ) {
                            call_user_func( array( $bp_bphfbc, $component_callback ), $component_args );
                        }
                    }
                } ?>

            </div>

        <?php 
        endif; ?>
    </div>
</div>
<?php // @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound ?>