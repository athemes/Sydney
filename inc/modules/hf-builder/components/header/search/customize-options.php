<?php
/**
 * Header/Footer Builder
 * Search Component
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// List of options we'll need to move.
$opts_to_move = apply_filters( 'sydney_hfb_header_component_search_opts_to_move', array(
    'general' => array(),
    'style'   => array()
) );

$wp_customize->add_section(
    new Sydney_Section_Hidden(
        $wp_customize,
        'sydney_section_hb_component__search',
        array(
            'title'      => esc_html__( 'Search', 'sydney' ),
            'panel'      => 'sydney_panel_header'
        )
    )
);

$wp_customize->add_setting(
    'sydney_section_hb_component__search_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Tab_Control (
        $wp_customize,
        'sydney_section_hb_component__search_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'sydney_section_hb_component__search',
            'controls_general'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-shfb_search_icon_visibility'
                    ),
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'general' ] )
                ),
            ),
            'controls_design'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-shfb_search_icon',
                        '#customize-control-shfb_search_icon_sticky_title',
                        '#customize-control-shfb_search_icon_sticky',
                        '#customize-control-shfb_search_layout_title',
                        '#customize-control-shfb_search_icon_padding',
                        '#customize-control-shfb_search_icon_margin'
                    ),
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'style' ] )
                )
            ),
            'priority' 				=> 20
        )
    )
);

// Visibility
$wp_customize->add_setting( 
    'shfb_search_icon_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'shfb_search_icon_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'shfb_search_icon_visibility_mobile',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'shfb_search_icon_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'sydney' ),
            'section'       => 'sydney_section_hb_component__search',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'shfb_search_icon_visibility_desktop',
                'tablet' 		=> 'shfb_search_icon_visibility_tablet',
                'mobile' 		=> 'shfb_search_icon_visibility_mobile'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'sydney' ),
                'hidden'  => esc_html__( 'Hidden', 'sydney' )
            ),
            'priority'      => 45
        )
    ) 
);

// Icon Color
$wp_customize->add_setting(
	'shfb_search_icon_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'shfb_search_icon_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
    new Sydney_Color_Group(
        $wp_customize,
        'shfb_search_icon',
        array(
            'label'    => esc_html__( 'Icon Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__search',
            'settings' => array(
                'normal' => 'shfb_search_icon_color',
                'hover'  => 'shfb_search_icon_color_hover',
            ),
            'priority' => 25
        )
    )
);

// Sticky Header - Title
$wp_customize->add_setting( 
    'shfb_search_icon_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control( 
    new Sydney_Text_Control( 
        $wp_customize, 
        'shfb_search_icon_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Mode', 'sydney' ),
            'section' 		  => 'sydney_section_hb_component__search',
            'active_callback' => 'sydney_callback_sticky_header',
            'priority'	 	  => 25
        )
    )
);

// Sticky Header - Icon Color
$wp_customize->add_setting(
	'shfb_search_icon_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'shfb_search_icon_sticky_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
    new Sydney_Color_Group(
        $wp_customize,
        'shfb_search_icon_sticky',
        array(
            'label'    => esc_html__( 'Icon Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__search',
            'settings' => array(
                'normal' => 'shfb_search_icon_sticky_color',
                'hover'  => 'shfb_search_icon_color_hover',
            ),
            'active_callback' => 'sydney_callback_sticky_header',
            'priority' => 25
        )
    )
);

// Layout Title
$wp_customize->add_setting(
    'shfb_search_layout_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'shfb_search_layout_title',
        array(
            'label'    => esc_html__( 'Layout', 'sydney' ),
            'section'  => 'sydney_section_hb_component__search',
            'priority' => 70,
            'separator' => 'before'
        )
    )
);

// Padding
$wp_customize->add_setting( 
    'shfb_search_icon_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_search_icon_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_search_icon_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'shfb_search_icon_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__search',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', '%', 'rem', 'em', 'vw', 'vh' ),
            'link_values_toggle' => true,
            'is_responsive'   	 => true,
            'settings'        	 => array(
                'desktop' => 'shfb_search_icon_padding_desktop',
                'tablet'  => 'shfb_search_icon_padding_tablet',
                'mobile'  => 'shfb_search_icon_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Margin
$wp_customize->add_setting( 
    'shfb_search_icon_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_search_icon_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_search_icon_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'shfb_search_icon_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__search',
            'sides'             => array(
                'top'    => true,
                'right'  => true,
                'bottom' => true,
                'left'   => true
            ),
            'units'              => array( 'px', '%', 'rem', 'em', 'vw', 'vh' ),
            'link_values_toggle' => true,
            'is_responsive'   	 => true,
            'settings'        	 => array(
                'desktop' => 'shfb_search_icon_margin_desktop',
                'tablet'  => 'shfb_search_icon_margin_tablet',
                'mobile'  => 'shfb_search_icon_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Move existing options.
$priority = 40;
foreach( $opts_to_move as $control_tabs ) {
    foreach( $control_tabs as $option_name ) {
        
        if( $wp_customize->get_control( $option_name ) === NULL ) {
            continue;
        }

        $wp_customize->get_control( $option_name )->section  = 'sydney_section_hb_component__search';
        $wp_customize->get_control( $option_name )->priority = $priority;
        
        $priority++;
    }
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound