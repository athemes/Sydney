<?php
/**
 * Header/Footer Builder
 * Secondary Menu Component
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
        'sydney_section_hb_component__secondary_menu',
        array(
            'title'      => esc_html__( 'Secondary Menu', 'sydney' ),
            'panel'      => 'sydney_panel_header'
        )
    )
);

$wp_customize->add_setting(
    'sydney_section_hb_component__secondary_menu_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Tab_Control (
        $wp_customize,
        'sydney_section_hb_component__secondary_menu_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'sydney_section_hb_component__secondary_menu',
            'controls_general'		=> wp_json_encode(
                array_merge(
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'general' ] ),
                    array(
                        '#customize-control-secondary_menu_visibility',
                        '#customize-control-topbar_nav_link'
                    )
                ),
            ),
            'controls_design'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-secondary_menu',
                        '#customize-control-secondary_menu_submenu_background',
                        '#customize-control-secondary_menu_submenu',
                        '#customize-control-secondary_menu_sticky_title',
						'#customize-control-secondary_menu_sticky',
                        '#customize-control-secondary_menu_sticky_submenu_background',
                        '#customize-control-secondary_menu_sticky_submenu',
						'#customize-control-secondary_menu_layout_title',
						'#customize-control-secondary_menu_padding',
						'#customize-control-secondary_menu_margin'
                    ),
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'style' ] )
                )
            ),
            'priority' 				=> 20
        )
    )
);

$wp_customize->add_setting( 'topbar_nav_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_attr',
	)
);

$wp_customize->add_control( new Sydney_Text_Control( $wp_customize, 'topbar_nav_link',
		array(
			'description'   => '<a class="sydney-to-widget-area-link" href="javascript:wp.customize.panel( \'nav_menus\' ).focus();">' . esc_html__( 'Configure menu', 'sydney' ) . '<span class="dashicons dashicons-arrow-right-alt2"></span></a>',
			'section'       => 'sydney_section_hb_component__secondary_menu',
			'priority'      => 25,
		)
	)
);

// Visibility
$wp_customize->add_setting( 
    'secondary_menu_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'secondary_menu_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'secondary_menu_visibility_mobile',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'secondary_menu_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'sydney' ),
            'section'       => 'sydney_section_hb_component__secondary_menu',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'secondary_menu_visibility_desktop',
                'tablet' 		=> 'secondary_menu_visibility_tablet',
                'mobile' 		=> 'secondary_menu_visibility_mobile'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'sydney' ),
                'hidden'  => esc_html__( 'Hidden', 'sydney' )
            ),
            'priority'      => 25
        )
    ) 
);

// Text Color
$wp_customize->add_setting(
	'secondary_menu_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'secondary_menu_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Color_Group(
		$wp_customize,
		'secondary_menu',
		array(
			'label'    => esc_html__( 'Text Color', 'sydney' ),
			'section'  => 'sydney_section_hb_component__secondary_menu',
			'settings' => array(
				'normal' => 'secondary_menu_color',
				'hover'  => 'secondary_menu_color_hover',
			),
			'priority' => 35
		)
	)
);

// Submenu Background
$wp_customize->add_setting(
	'secondary_menu_submenu_background',
	array(
		'default'           => '#FFF',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Alpha_Color(
		$wp_customize,
		'secondary_menu_submenu_background',
		array(
			'label'         	=> esc_html__( 'Submenu Background', 'sydney' ),
			'section'       	=> 'sydney_section_hb_component__secondary_menu',
			'priority'			=> 35
		)
	)
);

// Submenu Text Color
$wp_customize->add_setting(
	'secondary_menu_submenu_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'secondary_menu_submenu_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Color_Group(
		$wp_customize,
		'secondary_menu_submenu',
		array(
			'label'    => esc_html__( 'Submenu Text Color', 'sydney' ),
			'section'  => 'sydney_section_hb_component__secondary_menu',
			'settings' => array(
				'normal' => 'secondary_menu_submenu_color',
				'hover'  => 'secondary_menu_submenu_color_hover',
			),
			'priority' => 40
		)
	)
);

// Sticky Header - Title
$wp_customize->add_setting( 
    'secondary_menu_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control( 
    new Sydney_Text_Control( 
        $wp_customize, 
        'secondary_menu_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Mode', 'sydney' ),
            'section' 		  => 'sydney_section_hb_component__secondary_menu',
            'active_callback' => 'sydney_callback_sticky_header',
            'priority'	 	  => 47
        )
    )
);

// Sticky Header - Text Color
$wp_customize->add_setting(
	'secondary_menu_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'secondary_menu_sticky_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Color_Group(
		$wp_customize,
		'secondary_menu_sticky',
		array(
			'label'    => esc_html__( 'Text Color', 'sydney' ),
			'section'  => 'sydney_section_hb_component__secondary_menu',
			'settings' => array(
				'normal' => 'secondary_menu_sticky_color',
				'hover'  => 'secondary_menu_sticky_color_hover',
			),
			'active_callback' => 'sydney_callback_sticky_header',
			'priority' => 48
		)
	)
);

// Sticky Header - Submenu Background
$wp_customize->add_setting(
	'secondary_menu_sticky_submenu_background',
	array(
		'default'           => '#FFF',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Alpha_Color(
		$wp_customize,
		'secondary_menu_sticky_submenu_background',
		array(
			'label'         	=> esc_html__( 'Submenu Background', 'sydney' ),
			'section'       	=> 'sydney_section_hb_component__secondary_menu',
			'active_callback'	=> 'sydney_callback_sticky_header',
			'priority'			=> 50
		)
	)
);

// Sticky Header - Submenu Text Color
$wp_customize->add_setting(
	'secondary_menu_sticky_submenu_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'secondary_menu_sticky_submenu_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Color_Group(
		$wp_customize,
		'secondary_menu_sticky_submenu',
		array(
			'label'    => esc_html__( 'Submenu Text Color', 'sydney' ),
			'section'  => 'sydney_section_hb_component__secondary_menu',
			'settings' => array(
				'normal' => 'secondary_menu_sticky_submenu_color',
				'hover'  => 'secondary_menu_sticky_submenu_color_hover',
			),
			'active_callback' => 'sydney_callback_sticky_header',
			'priority' => 51
		)
	)
);

// Layout Title
$wp_customize->add_setting(
    'secondary_menu_layout_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'secondary_menu_layout_title',
        array(
            'label'    => esc_html__( 'Layout', 'sydney' ),
            'section'  => 'sydney_section_hb_component__secondary_menu',
            'priority' => 70,
            'separator' => 'before'
        )
    )
);

// Padding
$wp_customize->add_setting( 
    'secondary_menu_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'secondary_menu_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'secondary_menu_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'secondary_menu_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__secondary_menu',
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
                'desktop' => 'secondary_menu_padding_desktop',
                'tablet'  => 'secondary_menu_padding_tablet',
                'mobile'  => 'secondary_menu_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Margin
$wp_customize->add_setting( 
    'secondary_menu_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'secondary_menu_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'secondary_menu_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'secondary_menu_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__secondary_menu',
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
                'desktop' => 'secondary_menu_margin_desktop',
                'tablet'  => 'secondary_menu_margin_tablet',
                'mobile'  => 'secondary_menu_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Move existing options.
$priority = 21;
foreach( $opts_to_move as $control_tabs ) {
    foreach( $control_tabs as $option_name ) {

		if( $wp_customize->get_control( $option_name ) === NULL ) {
            continue;
        }

        if( 'topbar_nav_link' === $option_name ) {
            $wp_customize->get_control( $option_name )->label = esc_html__( 'Secondary Menu', 'sydney' );   
            $wp_customize->get_control( $option_name )->rm_desc_mt = true;    
        }
		
        $wp_customize->get_control( $option_name )->section  = 'sydney_section_hb_component__secondary_menu';
        $wp_customize->get_control( $option_name )->priority = $priority;
        $wp_customize->get_control( $option_name )->active_callback  = function(){};
        
        $priority++;
    }
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound