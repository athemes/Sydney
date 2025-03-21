<?php
/**
 * Header/Footer Builder
 * WooCommerce Icons Component
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// List of options we'll need to move.
$opts_to_move = apply_filters( 'sydney_hfb_header_component_wc_icons_opts_to_move', array(
    'general' => array(
        'main_header_cart_account_title',
        'enable_header_cart',
        'enable_header_account'
    ),
    'style'   => array(
        'main_header_minicart_count_background_color',
        'main_header_minicart_count_text_color'
    )
) );

$wp_customize->add_section(
    new Sydney_Section_Hidden(
        $wp_customize,
        'sydney_section_hb_component__woo_icons',
        array(
            'title'      => esc_html__( 'WooCommerce Icons', 'sydney' ),
            'panel'      => 'sydney_panel_header'
        )
    )
);

$wp_customize->add_setting(
    'sydney_section_hb_component__woo_icons_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Tab_Control (
        $wp_customize,
        'sydney_section_hb_component__woo_icons_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'sydney_section_hb_component__woo_icons',
            'controls_general'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-shfb_woo_icons_visibility',
                    ),
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'general' ] )
                ),
            ),
            'controls_design'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-shfb_woo_icons',
                        '#customize-control-shfb_woo_icons_sticky_title',
                        '#customize-control-shfb_woo_icons_sticky',
                        '#customize-control-shfb_woo_icons_space_between_icons',
                        '#customize-control-shfb_wc_icons_layout_title',
                        '#customize-control-shfb_woo_icons_padding',
                        '#customize-control-shfb_woo_icons_margin'
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
    'shfb_woo_icons_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'shfb_woo_icons_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'shfb_woo_icons_visibility_mobile',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'shfb_woo_icons_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'sydney' ),
            'section'       => 'sydney_section_hb_component__woo_icons',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'shfb_woo_icons_visibility_desktop',
                'tablet' 		=> 'shfb_woo_icons_visibility_tablet',
                'mobile' 		=> 'shfb_woo_icons_visibility_mobile'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'sydney' ),
                'hidden'  => esc_html__( 'Hidden', 'sydney' )
            ),
            'priority'      => 60
        )
    ) 
);

// Icon Color
$wp_customize->add_setting(
	'shfb_woo_icons_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'shfb_woo_icons_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
    new Sydney_Color_Group(
        $wp_customize,
        'shfb_woo_icons',
        array(
            'label'    => esc_html__( 'Icons Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__woo_icons',
            'settings' => array(
                'normal' => 'shfb_woo_icons_color',
                'hover'  => 'shfb_woo_icons_color_hover',
            ),
            'priority' => 25
        )
    )
);

// Sticky Header - Title
$wp_customize->add_setting( 
    'shfb_woo_icons_sticky_title',
    array(
        'default' 			=> '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control( 
    new Sydney_Text_Control( 
        $wp_customize, 
        'shfb_woo_icons_sticky_title',
        array(
            'label'			  => esc_html__( 'Sticky Mode', 'sydney' ),
            'section' 		  => 'sydney_section_hb_component__woo_icons',
            'active_callback' => 'sydney_callback_sticky_header',
            'priority'	 	  => 51
        )
    )
);

// Sticky Header - Icon Color
$wp_customize->add_setting(
	'shfb_woo_icons_sticky_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
	'shfb_woo_icons_sticky_color_hover',
	array(
		'default'           => '#757575',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
    new Sydney_Color_Group(
        $wp_customize,
        'shfb_woo_icons_sticky',
        array(
            'label'    => esc_html__( 'Icons Color', 'sydney' ),
            'section'  => 'sydney_section_hb_component__woo_icons',
            'settings' => array(
                'normal' => 'shfb_woo_icons_sticky_color',
                'hover'  => 'shfb_woo_icons_sticky_color_hover',
            ),
            'active_callback'   => 'sydney_callback_sticky_header',
            'priority' => 52
        )
    )
);

// Elements spacing.
$wp_customize->add_setting('shfb_woo_icons_space_between_icons_desktop', array(
	'default'           => 25,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('shfb_woo_icons_space_between_icons_tablet', array(
	'default'           => 25,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'absint',
));

$wp_customize->add_setting('shfb_woo_icons_space_between_icons_mobile', array(
	'default'           => 25,
	'transport'         => 'postMessage',
	'sanitize_callback' => 'absint',
));
$wp_customize->add_control(new Sydney_Responsive_Slider(
	$wp_customize,
	'shfb_woo_icons_space_between_icons',
	array(
		'label'         => esc_html__('Elements spacing', 'sydney'),
		'section'       => 'sydney_section_hb_component__woo_icons',
		'is_responsive' => 1,
		'settings'      => array(
			'size_desktop'      => 'shfb_woo_icons_space_between_icons_desktop',
			'size_tablet'       => 'shfb_woo_icons_space_between_icons_tablet',
			'size_mobile'       => 'shfb_woo_icons_space_between_icons_mobile',
		),
		'input_attrs' => array(
			'min'   => 0,
			'max'   => 200,
		),
        'priority' => 71
	)
));

// Layout Title
$wp_customize->add_setting(
    'shfb_wc_icons_layout_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'shfb_wc_icons_layout_title',
        array(
            'label'    => esc_html__( 'Layout', 'sydney' ),
            'section'  => 'sydney_section_hb_component__woo_icons',
            'priority' => 70,
            'separator' => 'before'
        )
    )
);

// Padding
$wp_customize->add_setting( 
    'shfb_woo_icons_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_woo_icons_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_woo_icons_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'shfb_woo_icons_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__woo_icons',
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
                'desktop' => 'shfb_woo_icons_padding_desktop',
                'tablet'  => 'shfb_woo_icons_padding_tablet',
                'mobile'  => 'shfb_woo_icons_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Margin
$wp_customize->add_setting( 
    'shfb_woo_icons_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_woo_icons_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_woo_icons_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'shfb_woo_icons_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'sydney' ),
            'section'         	=> 'sydney_section_hb_component__woo_icons',
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
                'desktop' => 'shfb_woo_icons_margin_desktop',
                'tablet'  => 'shfb_woo_icons_margin_tablet',
                'mobile'  => 'shfb_woo_icons_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Move existing options.
$priority = 35;
foreach( $opts_to_move as $control_tabs ) {
    foreach( $control_tabs as $option_name ) {
        
        if( $wp_customize->get_control( $option_name ) === NULL ) {
            continue;
        }

        $wp_customize->get_control( $option_name )->section  = 'sydney_section_hb_component__woo_icons';
        $wp_customize->get_control( $option_name )->priority = $priority;

        if( in_array( $option_name, array( 'enable_header_cart', 'enable_header_account' ) ) ) {
            $wp_customize->get_control( $option_name )->active_callback  = function(){};
        }
        
        $priority++;
    }
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound