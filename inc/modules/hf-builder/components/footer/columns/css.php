<?php
/**
 * Footer Builder
 * Columns CSS Output
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

$rows = array( 'above_footer_row', 'main_footer_row', 'below_footer_row' );
foreach( $rows as $row ) {

    // Up to 6 columns.
    for( $i=1; $i<=6; $i++ ) {
        $section_id      = "sydney_footer_row__{$row}_column$i";
        $column_selector = ".shfb-footer .shfb-$row .shfb-column-$i"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

        // Vertical Alignment.
        $default = Sydney_Header_Footer_Builder::get_row_column_default_customizer_value( $row, $i, 'vertical_alignment' );
        $css .= Sydney_Header_Footer_Builder::get_responsive_css( 
            $section_id . '_vertical_alignment', 
            array( 'desktop' => $default, 'tablet' => $default, 'mobile' => $default ), 
            $column_selector,
            'align-items',
            '',
            $row,
            $section_id
        );

        // Inner Layout.
        $default = Sydney_Header_Footer_Builder::get_row_column_default_customizer_value( $row, $i, 'inner_layout' );
        $css .= Sydney_Header_Footer_Builder::get_responsive_css( 
            $section_id . '_inner_layout', 
            array( 'desktop' => $default, 'tablet' => $default, 'mobile' => $default ), 
            $column_selector,
            'flex-direction',
            '',
            $row,
            $section_id
        );

        // Horizontal Alignment.
        $default = Sydney_Header_Footer_Builder::get_row_column_default_customizer_value( $row, $i, 'horizontal_alignment' );
        $css .= Sydney_Header_Footer_Builder::get_responsive_css( 
            $section_id . '_horizontal_alignment', 
            array( 'desktop' => $default, 'tablet' => $default, 'mobile' => $default ), 
            $column_selector,
            'justify-content',
            '',
            $row,
            $section_id
        );

        // Elements Spacing.
        $css .= Sydney_Header_Footer_Builder::get_responsive_css( 
            $section_id . '_elements_spacing', 
            array( 'desktop' => '25', 'tablet' => '25', 'mobile' => '25' ), 
            "$column_selector .shfb-builder-item + .shfb-builder-item",
            is_rtl() ? 'margin-right' : 'margin-left',
            'px',
            $row,
            $section_id
        );

        // Padding
        $css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
            $section_id . '_padding',
            array(
                'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
            ), 
            $column_selector, 
            'padding'
        );

        // Margin
        $css .= Sydney_Custom_CSS::get_responsive_dimensions_css( 
            $section_id . '_margin',
            array(
                'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
                'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
            ), 
            $column_selector, 
            'margin'
        );
    }

}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound