<?php
/**
 * Footer Builder
 * Social Component
 * 
 * @package Sydney_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// List of options we'll need to move.
$opts_to_move = array(
    'general' => array(
        'social_profiles_footer'
    ),
    'style'   => array()
);

$wp_customize->add_section(
    new Sydney_Section_Hidden(
        $wp_customize,
        'sydney_section_fb_component__social',
        array(
            'title'      => esc_html__( 'Social Icons', 'sydney' ),
            'panel'      => 'sydney_panel_footer'
        )
    )
);

$wp_customize->add_setting(
    'sydney_section_fb_component__social_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Tab_Control (
        $wp_customize,
        'sydney_section_fb_component__social_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'sydney_section_fb_component__social',
            'controls_general'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-shfb_footer_social_visibility'
                    ),
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'general' ] )
                ),
            ),
            'controls_design'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-shfb_footer_social',
                        '#customize-control-shfb_footer_social_sticky_border',
                        '#customize-control-shfb_footer_social_layout_title',
                        '#customize-control-shfb_footer_social_padding',
                        '#customize-control-shfb_footer_social_margin'
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
    'shfb_footer_social_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'shfb_footer_social_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'shfb_footer_social_visibility_mobile',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'shfb_footer_social_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'sydney' ),
            'section'       => 'sydney_section_fb_component__social',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'shfb_footer_social_visibility_desktop',
                'tablet' 		=> 'shfb_footer_social_visibility_tablet',
                'mobile' 		=> 'shfb_footer_social_visibility_mobile'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'sydney' ),
                'hidden'  => esc_html__( 'Hidden', 'sydney' )
            ),
            'priority'      => 42
        )
    ) 
);

// Icons Color.
$wp_customize->add_setting(
	'shfb_footer_social_color',
	array(
		'default'           => '#212121',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
    'shfb_footer_social_color_hover',
    array(
        'default'           => '#757575',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Color_Group(
        $wp_customize,
        'shfb_footer_social',
        array(
            'label'    => esc_html__( 'Icons Color', 'sydney' ),
            'section'  => 'sydney_section_fb_component__social',
            'settings' => array(
                'normal' => 'shfb_footer_social_color',
                'hover'  => 'shfb_footer_social_color_hover',
            ),
            'priority' => 25
        )
    )
);

// Layout Title
$wp_customize->add_setting(
    'shfb_footer_social_layout_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'shfb_footer_social_layout_title',
        array(
            'label'    => esc_html__( 'Layout', 'sydney' ),
            'section'  => 'sydney_section_fb_component__social',
            'priority' => 70,
            'separator' => 'before'
        )
    )
);

// Padding
$wp_customize->add_setting( 
    'shfb_footer_social_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_footer_social_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_footer_social_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'shfb_footer_social_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'sydney' ),
            'section'         	=> 'sydney_section_fb_component__social',
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
                'desktop' => 'shfb_footer_social_padding_desktop',
                'tablet'  => 'shfb_footer_social_padding_tablet',
                'mobile'  => 'shfb_footer_social_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Margin
$wp_customize->add_setting( 
    'shfb_footer_social_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_footer_social_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'shfb_footer_social_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'shfb_footer_social_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'sydney' ),
            'section'         	=> 'sydney_section_fb_component__social',
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
                'desktop' => 'shfb_footer_social_margin_desktop',
                'tablet'  => 'shfb_footer_social_margin_tablet',
                'mobile'  => 'shfb_footer_social_margin_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Add selective refresh to existing options.
$wp_customize->selective_refresh->add_partial(
    'social_profiles_footer',
    array(
        'selector'        => '.shfb.shfb-footer .social-profile',
        'render_callback' => function() {
            sydney_social_profile( 'social_profiles_footer' );
        }
    )
);

// Move existing options.
$priority = 35;
foreach( $opts_to_move as $control_tabs ) {
    foreach( $control_tabs as $option_name ) {
        
        if( $wp_customize->get_control( $option_name ) === NULL ) {
            continue;
        }

        if( $option_name === 'social_profiles_footer' ) {
            $wp_customize->get_setting( $option_name )->transport = 'postMessage';
        }

        $wp_customize->get_control( $option_name )->section  = 'sydney_section_fb_component__social';
        $wp_customize->get_control( $option_name )->priority = $priority;
        $wp_customize->get_control( $option_name )->active_callback  = function(){};
        
        $priority++;
    }
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound