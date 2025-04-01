<?php
/**
 * Header/Footer Builder
 * Mobile Offcanvas Options
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// List of options we'll need to move.
$opts_to_move = array(
    'general' => array(
        'mobile_menu_link_separator',
        'mobile_menu_link_spacing',
        'mobile_header_separator_width'
    ),
    'style'   => array(
        'link_separator_color'
    )
);

$wp_customize->add_section(
    new Sydney_Section_Hidden(
        $wp_customize,
        'sydney_section_hb_component__mobile_offcanvas_menu',
        array(
            'title'      => esc_html__( 'Mobile Offcanvas Menu', 'sydney' ),
            'panel'      => 'sydney_panel_header'
        )
    )
);

// Tabs
$wp_customize->add_setting(
    'sydney_section_hb_component__mobile_offcanvas_menu_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Tab_Control (
        $wp_customize,
        'sydney_section_hb_component__mobile_offcanvas_menu_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'sydney_section_hb_component__mobile_offcanvas_menu',
            'controls_general'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-mobile_offcanvas_menu_visibility'
                    ),
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'general' ] )
                ),
            ),
            'controls_design'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-mobile_offcanvas_menu',
                        '#customize-control-mobile_offcanvas_menu_submenu',
                        '#customize-control-shfb_mobile_offcanvas_menu_sticky_border',
                        '#customize-control-shfb_mobile_offcanvas_menu_layout_title',
                        '#customize-control-shfb_mobile_offcanvas_menu_padding',
                        '#customize-control-shfb_mobile_offcanvas_menu_margin'
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
    'mobile_offcanvas_menu_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'mobile_offcanvas_menu_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'mobile_offcanvas_menu_visibility_mobile',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'mobile_offcanvas_menu_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'sydney' ),
            'section'       => 'sydney_section_hb_component__mobile_offcanvas_menu',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'mobile_offcanvas_menu_visibility_desktop',
                'tablet' 		=> 'mobile_offcanvas_menu_visibility_tablet',
                'mobile' 		=> 'mobile_offcanvas_menu_visibility_mobile'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'sydney' ),
                'hidden'  => esc_html__( 'Hidden', 'sydney' )
            ),
            'priority'      => 55
        )
    ) 
);

// Text Color
$wp_customize->add_setting(
	'mobile_offcanvas_menu_color',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'mobile_offcanvas_menu_color_hover',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
    new Sydney_Color_Group(
        $wp_customize,
        'mobile_offcanvas_menu',
        array(
            'label'    => esc_html__( 'Text Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__mobile_offcanvas_menu',
            'settings' => array(
                'normal' => 'mobile_offcanvas_menu_color',
                'hover'  => 'mobile_offcanvas_menu_color_hover',
            ),
            'priority' => 25
        )
    )
);

// Submenu Text Color
$wp_customize->add_setting(
	'mobile_offcanvas_menu_submenu_color',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'mobile_offcanvas_menu_submenu_color_hover',
	array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
    new Sydney_Color_Group(
        $wp_customize,
        'mobile_offcanvas_menu_submenu',
        array(
            'label'    => esc_html__( 'Submenu Text Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__mobile_offcanvas_menu',
            'settings' => array(
                'normal' => 'mobile_offcanvas_menu_submenu_color',
                'hover'  => 'mobile_offcanvas_menu_submenu_color_hover',
            ),
            'priority' => 40
        )
    )
);

// Layout Title
$wp_customize->add_setting(
    'shfb_mobile_offcanvas_menu_layout_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'shfb_mobile_offcanvas_menu_layout_title',
        array(
            'label'    => esc_html__( 'Layout', 'sydney' ),
            'section'  => 'sydney_section_hb_component__mobile_offcanvas_menu',
            'priority' => 70,
            'separator' => 'before'
        )
    )
);

// Padding
$wp_customize->add_setting( 
    'mobile_offcanvas_menu_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'mobile_offcanvas_menu_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'mobile_offcanvas_menu_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'mobile_offcanvas_menu_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__mobile_offcanvas_menu',
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
                'desktop' => 'mobile_offcanvas_menu_padding_desktop',
                'tablet'  => 'mobile_offcanvas_menu_padding_tablet',
                'mobile'  => 'mobile_offcanvas_menu_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Margin
$wp_customize->add_setting( 
    'mobile_offcanvas_menu_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'mobile_offcanvas_menu_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'mobile_offcanvas_menu_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'mobile_offcanvas_menu_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__mobile_offcanvas_menu',
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
                'desktop' => 'mobile_offcanvas_menu_margin_desktop',
                'tablet'  => 'mobile_offcanvas_menu_margin_tablet',
                'mobile'  => 'mobile_offcanvas_menu_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Move existing options.
$priority = 50;
foreach( $opts_to_move as $control_tabs ) {
    foreach( $control_tabs as $option_name ) {

		if( $wp_customize->get_control( $option_name ) === NULL ) {
            continue;
        }
		
        $wp_customize->get_control( $option_name )->section  = 'sydney_section_hb_component__mobile_offcanvas_menu';
        $wp_customize->get_control( $option_name )->priority = $priority;
        
        $priority++;
    }
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound