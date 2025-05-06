<?php
/**
 * Footer Builder
 * HTML Component
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
        'sydney_section_fb_component__html',
        array(
            'title'      => esc_html__( 'HTML', 'sydney' ),
            'panel'      => 'sydney_panel_footer'
        )
    )
);

$wp_customize->add_setting(
    'sydney_section_fb_component__html_tabs',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);
$wp_customize->add_control(
    new Sydney_Tab_Control (
        $wp_customize,
        'sydney_section_fb_component__html_tabs',
        array(
            'label' 				=> '',
            'section'       		=> 'sydney_section_fb_component__html',
            'controls_general'		=> wp_json_encode(
                array_merge(
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'general' ] ),
                    array(
                        '#customize-control-footer_html_content',
                        '#customize-control-sydney_section_fb_component__html_text_align',
                        '#customize-control-sydney_section_fb_component__html_visibility'
                    ),
                )
            ),
            'controls_design'		=> wp_json_encode(
                array_merge(
                    array(
                        '#customize-control-sydney_section_fb_component__html_text_color',
                        '#customize-control-sydney_section_fb_component__html_link',
                        '#customize-control-sydney_section_fb_component__html_padding',
                        '#customize-control-sydney_section_fb_component__html_margin'
                    ),
                    array_map( function( $name ){ return "#customize-control-$name"; }, $opts_to_move[ 'style' ] )
                )
            ),
            'priority' 				=> 20
        )
    )
);


$wp_customize->add_setting(
	'footer_html_content',
	array(
		'sanitize_callback' => 'sydney_sanitize_text',
		'default'           => '',
	)       
);
$wp_customize->add_control( 'footer_html_content', array(
	'label'       => esc_html__( 'Add your HTML', 'sydney' ),
	'type'        => 'textarea',
	'section'     => 'sydney_section_fb_component__html',
    'priority'    => 30
) );

// Text Alignment.
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_text_align_desktop',
    array(
        'default' 			=> 'left',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_text_align_tablet',
    array(
        'default' 			=> 'left',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_text_align_mobile',
    array(
        'default' 			=> 'left',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'sydney_section_fb_component__html_text_align',
        array(
            'label'         => esc_html__( 'Text Alignment', 'sydney' ),
            'section'       => 'sydney_section_fb_component__html',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'sydney_section_fb_component__html_text_align_desktop',
                'tablet' 		=> 'sydney_section_fb_component__html_text_align_tablet',
                'mobile' 		=> 'sydney_section_fb_component__html_text_align_mobile'
            ),
            'choices'       => array(
                'left' 		=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h10v1H0zM0 4h16v1H0zM0 8h10v1H0zM0 12h16v1H0z"/></svg>',
                'center' 	=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 0h10v1H3zM0 4h16v1H0zM3 8h10v1H3zM0 12h16v1H0z"/></svg>',
                'right' 	=> '<svg width="16" height="13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 0h10v1H6zM0 4h16v1H0zM6 8h10v1H6zM0 12h16v1H0z"/></svg>'
            ),
            'priority'      => 30
        )
    ) 
);

// Visibility
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_visibility_desktop',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_visibility_tablet',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_visibility_mobile',
    array(
        'default' 			=> 'visible',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control( 
    new Sydney_Radio_Buttons( 
        $wp_customize, 
        'sydney_section_fb_component__html_visibility',
        array(
            'label'         => esc_html__( 'Visibility', 'sydney' ),
            'section'       => 'sydney_section_fb_component__html',
            'is_responsive' => true,
            'settings' => array(
                'desktop' 		=> 'sydney_section_fb_component__html_visibility_desktop',
                'tablet' 		=> 'sydney_section_fb_component__html_visibility_tablet',
                'mobile' 		=> 'sydney_section_fb_component__html_visibility_mobile'
            ),
            'choices'       => array(
                'visible' => esc_html__( 'Visible', 'sydney' ),
                'hidden'  => esc_html__( 'Hidden', 'sydney' )
            ),
            'priority'      => 42
        )
    ) 
);

// Text Color.
$wp_customize->add_setting(
	'sydney_section_fb_component__html_text_color',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control(
	new Sydney_Alpha_Color(
		$wp_customize,
		'sydney_section_fb_component__html_text_color',
		array(
			'label'         	=> esc_html__( 'Text Color', 'sydney' ),
			'section'       	=> 'sydney_section_fb_component__html',
            'priority'          => 40
		)
	)
);

// Link Color.
$wp_customize->add_setting(
	'sydney_section_fb_component__html_link_color',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_hex_rgba',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_setting(
    'sydney_section_fb_component__html_link_color_hover',
    array(
        'default'           => '',
        'sanitize_callback' => 'sydney_sanitize_hex_rgba',
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(
    new Sydney_Color_Group(
        $wp_customize,
        'sydney_section_fb_component__html_link',
        array(
            'label'    => esc_html__( 'Link Color', 'sydney' ),
            'section'  => 'sydney_section_fb_component__html',
            'settings' => array(
                'normal' => 'sydney_section_fb_component__html_link_color',
                'hover'  => 'sydney_section_fb_component__html_link_color_hover',
            ),
            'priority' => 41
        )
    )
);

// Layout Title
$wp_customize->add_setting(
    'shfb_footer_html_layout_title',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_attr'
    )
);

$wp_customize->add_control(
    new Sydney_Text_Control(
        $wp_customize,
        'shfb_footer_html_layout_title',
        array(
            'label'    => esc_html__( 'Layout', 'sydney' ),
            'section'  => 'sydney_section_fb_component__html',
            'priority' => 70,
            'separator' => 'before'
        )
    )
);

// Padding
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_padding_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_padding_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_padding_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'sydney_section_fb_component__html_padding',
        array(
            'label'           	=> __( 'Wrapper Padding', 'sydney' ),
            'section'         	=> 'sydney_section_fb_component__html',
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
                'desktop' => 'sydney_section_fb_component__html_padding_desktop',
                'tablet'  => 'sydney_section_fb_component__html_padding_tablet',
                'mobile'  => 'sydney_section_fb_component__html_padding_mobile'
            ),
            'priority'	      	 => 72
        )
    )
);

// Margin
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_margin_desktop',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_margin_tablet',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_setting( 
    'sydney_section_fb_component__html_margin_mobile',
    array(
        'default'           => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'sanitize_callback' => 'sydney_sanitize_text',
        'transport'         => 'postMessage'
    ) 
);
$wp_customize->add_control( 
    new Sydney_Dimensions_Control( 
        $wp_customize, 
        'sydney_section_fb_component__html_margin',
        array(
            'label'           	=> __( 'Wrapper Margin', 'sydney' ),
            'section'         	=> 'sydney_section_fb_component__html',
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
                'desktop' => 'sydney_section_fb_component__html_margin_desktop',
                'tablet'  => 'sydney_section_fb_component__html_margin_tablet',
                'mobile'  => 'sydney_section_fb_component__html_margin_mobile'
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
        
        $wp_customize->get_control( $option_name )->section  = 'sydney_section_fb_component__html';
        $wp_customize->get_control( $option_name )->priority = $priority;
        $wp_customize->get_control( $option_name )->active_callback  = function(){};
        
        $priority++;
    }
}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound