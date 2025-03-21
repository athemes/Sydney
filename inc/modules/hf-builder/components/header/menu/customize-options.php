<?php
/**
 * Header/Footer Builder
 * Menu Component
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// List of options we'll need to move.
$opts_to_move = array(
    'general' => array(),
    'style'   => array()
);

$wp_customize->add_section(
    new Sydney_Section_Hidden(
        $wp_customize,
        'sydney_section_hb_component__menu',
        array(
            'title'      => esc_html__( 'Primary Menu', 'sydney' ),
            'panel'      => 'sydney_panel_header'
        )
    )
);

$wp_customize->add_setting(
    'sydney_section_hb_component__menu_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Tab_Control (
        $wp_customize,
        'sydney_section_hb_component__menu_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'sydney_section_hb_component__menu',
            'controls_general'		=> wp_json_encode(
                array_merge(
                    array( 
                        '#customize-control-sydney_section_hb_component__menu_config',
                        '#customize-control-sydney_section_hb_component__menu_visibility'
                    ),
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'general' ] )
                )
            ),
            'controls_design'		=> wp_json_encode(
                array_merge(
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'style' ] ),
                    array(
                        '#customize-control-sydney_section_hb_component__menu_padding',
                        '#customize-control-sydney_section_hb_component__menu_margin',
                        '#customize-control-shfb_main_header_color',
                        '#customize-control-shfb_main_header_color_hover',
                        '#customize-control-shfb_main_header_submenu_background',
                        '#customize-control-shfb_main_header_submenu_color',
                        '#customize-control-shfb_main_header_submenu_color_hover',
                        '#customize-control-shfb_main_header_sticky_active_color',
                        '#customize-control-shfb_main_header_sticky_active_color_hover',
                        '#customize-control-shfb_main_header_sticky_active_submenu_background_color',
                        '#customize-control-shfb_main_header_sticky_active_submenu_color',
                        '#customize-control-shfb_main_header_sticky_active_submenu_color_hover',
                        '#customize-control-shfb_main_header_submenu_title',
                        '#customize-control-shfb_main_header_sticky_title',
                        '#customize-control-shfb_menu_layout_title',
                        '#customize-control-shfb_menu_padding',
                        '#customize-control-shfb_menu_margin',
                        '#customize-control-shfb_menu_sticky_border'
                    ),
                )
            ),
            'priority' 				=> 20
        )
    )
);

$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_config',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);
$wp_customize->add_control( 
    new Sydney_Text_Control( 
        $wp_customize, 
        'sydney_section_hb_component__menu_config',
		array(
			'description' 	=> '<span class="customize-control-title" style="font-style: normal;">' . esc_html__( 'Configure Menu', 'sydney' ) . '</span><a class="sydney-to-widget-area-link" href="javascript:wp.customize.section( \'menu_locations\' ).focus();">' . esc_html__( 'Configure Menu', 'sydney' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>',
			'section' 		=> 'sydney_section_hb_component__menu',
            'priority'      => 20
		)
	)
);

// Visibility
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_visibility_mobile',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'sydney_section_hb_component__menu_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'sydney' ),
            'section'       => 'sydney_section_hb_component__menu',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'sydney_section_hb_component__menu_visibility_desktop',
                'tablet' 		=> 'sydney_section_hb_component__menu_visibility_tablet',
                'mobile' 		=> 'sydney_section_hb_component__menu_visibility_mobile'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'sydney' ),
                'hidden'  => esc_html__( 'Hidden', 'sydney' )
            ),
            'priority'      => 22
        )
    ) 
);

$wp_customize->add_setting(
    'sydney_section_hb_component__menu_top_level_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'sydney_section_hb_component__menu_top_level_title',
        array(
            'label'    => esc_html__( 'Top Level Menu Items', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'priority' => 70
        )
    )
);

$wp_customize->add_setting(
	'global_shfb_main_header_color',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage'
	)
);

$wp_customize->add_setting(
	'shfb_main_header_color',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);

$wp_customize->add_control(
	new Sydney_Alpha_Color(
		$wp_customize,
		'shfb_main_header_color',
		array(
			'label'         	=> esc_html__( 'Text color', 'sydney' ),
			'section'       	=> 'sydney_section_hb_component__menu',
			'settings'			=> array(
				'global'	=> 'global_shfb_main_header_color',
				'setting'	=> 'shfb_main_header_color',
			),
            'priority'      	=> 70
		)
	)
);

// Text Color Hover Global
$wp_customize->add_setting(
    'global_shfb_main_header_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_color_hover',
        array(
            'label'    => esc_html__( 'Text Color Hover', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_color_hover',
                'setting' => 'shfb_main_header_color_hover',
            ),
            'priority' => 70
        )
    )
);

$wp_customize->add_setting( 'shfb_main_header_submenu_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control( new Sydney_Text_Control( $wp_customize, 'shfb_main_header_submenu_title',
		array(
			'label'			=> esc_html__( 'Submenu', 'sydney' ),
			'section' 		=> 'sydney_section_hb_component__menu',
			'separator'		=> 'before',
            'priority'		=> 70
		)
	)
);

// Submenu Background Global
$wp_customize->add_setting(
    'global_shfb_main_header_submenu_background',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_submenu_background',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_submenu_background',
        array(
            'label'    => esc_html__( 'Submenu Background', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_submenu_background',
                'setting' => 'shfb_main_header_submenu_background',
            ),
            'priority' => 70
        )
    )
);

// Submenu Text Color Global
$wp_customize->add_setting(
    'global_shfb_main_header_submenu_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_submenu_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_submenu_color',
        array(
            'label'    => esc_html__( 'Submenu Text Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_submenu_color',
                'setting' => 'shfb_main_header_submenu_color',
            ),
            'priority' => 70
        )
    )
);

// Submenu Text Color Hover Global
$wp_customize->add_setting(
    'global_shfb_main_header_submenu_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_submenu_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_submenu_color_hover',
        array(
            'label'    => esc_html__( 'Submenu Text Color Hover', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_submenu_color_hover',
                'setting' => 'shfb_main_header_submenu_color_hover',
            ),
            'priority' => 70,
        )
    )
);

$wp_customize->add_setting( 'shfb_main_header_sticky_title',
	array(
		'default' 			=> '',
		'sanitize_callback' => 'esc_attr'
	)
);

$wp_customize->add_control( new Sydney_Text_Control( $wp_customize, 'shfb_main_header_sticky_title',
		array(
			'label'			=> esc_html__( 'Sticky mode', 'sydney' ),
			'section' 		=> 'sydney_section_hb_component__menu',
			'separator'		=> 'before',
            'priority'		=> 70
		)
	)
);

// Text Color Global
$wp_customize->add_setting(
    'global_shfb_main_header_sticky_active_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_sticky_active_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_sticky_active_color',
        array(
            'label'    => esc_html__( 'Text Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_sticky_active_color',
                'setting' => 'shfb_main_header_sticky_active_color',
            ),
            'priority' => 70
        )
    )
);

// Text Color Hover Global
$wp_customize->add_setting(
    'global_shfb_main_header_sticky_active_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_sticky_active_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_sticky_active_color_hover',
        array(
            'label'    => esc_html__( 'Text Color Hover', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_sticky_active_color_hover',
                'setting' => 'shfb_main_header_sticky_active_color_hover',
            ),
            'priority' => 70
        )
    )
);

// Submenu Background Global
$wp_customize->add_setting(
    'global_shfb_main_header_sticky_active_submenu_background_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_sticky_active_submenu_background_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_sticky_active_submenu_background_color',
        array(
            'label'    => esc_html__( 'Submenu Background', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_sticky_active_submenu_background_color',
                'setting' => 'shfb_main_header_sticky_active_submenu_background_color',
            ),
            'priority' => 70
        )
    )
);

// Submenu Text Color Global
$wp_customize->add_setting(
    'global_shfb_main_header_sticky_active_submenu_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_sticky_active_submenu_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_sticky_active_submenu_color',
        array(
            'label'    => esc_html__( 'Submenu Text Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_sticky_active_submenu_color',
                'setting' => 'shfb_main_header_sticky_active_submenu_color',
            ),
            'priority' => 70
        )
    )
);

// Submenu Text Color Hover Global
$wp_customize->add_setting(
    'global_shfb_main_header_sticky_active_submenu_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting(
    'shfb_main_header_sticky_active_submenu_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Alpha_Color(
        $wp_customize,
        'shfb_main_header_sticky_active_submenu_color_hover',
        array(
            'label'    => esc_html__( 'Submenu Text Color Hover', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'settings' => array(
                'global'  => 'global_shfb_main_header_sticky_active_submenu_color_hover',
                'setting' => 'shfb_main_header_sticky_active_submenu_color_hover',
            ),
            'priority' => 70,
            'separator' => 'after'
        )
    )
);

// Layout Title
$wp_customize->add_setting(
    'shfb_menu_layout_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'shfb_menu_layout_title',
        array(
            'label'    => esc_html__( 'Layout', 'sydney' ),
            'section'  => 'sydney_section_hb_component__menu',
            'priority' => 70,
            'separator' => 'before'
        )
    )
);

// Padding
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'sydney_section_hb_component__menu_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__menu',
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
                'desktop' => 'sydney_section_hb_component__menu_padding_desktop',
                'tablet'  => 'sydney_section_hb_component__menu_padding_tablet',
                'mobile'  => 'sydney_section_hb_component__menu_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Margin
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_hb_component__menu_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'sydney_section_hb_component__menu_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__menu',
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
                'desktop' => 'sydney_section_hb_component__menu_margin_desktop',
                'tablet'  => 'sydney_section_hb_component__menu_margin_tablet',
                'mobile'  => 'sydney_section_hb_component__menu_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Move existing options.
$priority = 30;
foreach( $opts_to_move as $control_tabs ) {
    foreach( $control_tabs as $option_name ) {

        if( $wp_customize->get_control( $option_name ) === NULL ) {
            continue;
        }
        
        $wp_customize->get_control( $option_name )->section  = 'sydney_section_hb_component__menu';
        $wp_customize->get_control( $option_name )->priority = $priority;
        
        $priority++;
    }
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound