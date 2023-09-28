<?php
/**
 * Pro upsell options
 *
 * @package Sydney
 */

/**
 * Main Header
 */
$wp_customize->add_setting( 
    'sydney_upsell_main_header',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_main_header',
        array(
            'section'     => 'sydney_section_main_header',
            'description' => __( 'Enhance your header with Sydney Pro!', 'sydney' ),
            'features'    => array(
                __( 'Build Headers with Elementor', 'sydney' ),
                __( 'Extra header layouts', 'sydney' ),
                __( 'Top bar', 'sydney' ),
                __( 'Language switcher', 'sydney' ),
                __( 'Page Headers module', 'sydney' ),
                __( 'Elementor mega menu builder', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',
            ),    
            'priority'    => 999
        )
    ) 
);

/**
 * Mobile Header
 */
$wp_customize->add_setting( 
    'sydney_upsell_mobile_header',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_mobile_header',
        array(
            'section'     => 'sydney_section_mobile_header',
            'description' => __( 'Build better-performing mobile headers with Sydney Pro!', 'sydney' ),
            'features'    => array(
                __( 'Elementor header builder', 'sydney' ),
                __( 'A mobile-only menu', 'sydney' ),
                __( 'Custom breakpoints', 'sydney' ),
                __( 'A different logo for mobile', 'sydney' ),
                __( 'Extra mobile header layouts', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',
            ),             
            'priority'    => 999
        )
    ) 
);

/**
 * Footer widgets
 */
$wp_customize->add_setting( 
    'sydney_upsell_footer_widgets',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_footer_widgets',
        array(
            'section'     => 'sydney_section_footer_widgets',
            'description' => __( 'Create one-of-a-kind footer designs with Sydney Pro!', 'sydney' ),
            'features'    => array(
                __( 'Elementor footer builder', 'sydney' ),
                __( 'Footer background image', 'sydney' ),
                __( 'Pre-footer area', 'sydney' ),
                __( 'SVG footer separators', 'sydney' ),
                __( 'Reveal animation effect', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',                
            ),            
            'priority'    => 999
        )
    ) 
);

/**
 * Footer credits
 */
$wp_customize->add_setting( 
    'sydney_upsell_footer_credits',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_footer_credits',
        array(
            'section'     => 'sydney_section_footer_credits',
            'description' => __( 'Create one-of-a-kind footer designs with Sydney Pro!', 'sydney' ),
            'features'    => array(
                __( 'Elementor footer builder', 'sydney' ),
                __( 'Footer background image', 'sydney' ),
                __( 'Pre-footer area', 'sydney' ),
                __( 'SVG footer separators', 'sydney' ),
                __( 'Reveal animation effect', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',   
            ), 
            'priority'    => 999
        )
    ) 
);

/**
 * Blog
 */
$wp_customize->add_setting( 
    'sydney_upsell_blog_archives',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_blog_archives',
        array(
            'section'     => 'sydney_section_blog_archives',
            'description' => __( 'Improve your blog’s conversion rate with Sydney Pro!', 'sydney' ),
            'features'    => array(
                __( 'Premium post header layouts', 'sydney' ),
                __( 'Featured posts area', 'sydney' ),
                __( 'Reading time', 'sydney' ),
                __( 'Progress bar', 'sydney' ),
                __( 'Social sharing buttons', 'sydney' ),
                __( 'Elementor template builder for category pages', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',                
            ),
            'priority'    => 999
        )
    ) 
);

$wp_customize->add_setting( 
    'sydney_upsell_blog_singles',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_blog_singles',
        array(
            'section'     => 'sydney_section_blog_singles',
            'description' => __( 'Improve your blog’s conversion rate with Sydney Pro!', 'sydney' ),
            'features'    => array(
                __( 'Extra post header layouts', 'sydney' ),
                __( 'Reading time', 'sydney' ),
                __( 'Progress bar', 'sydney' ),
                __( 'Last updated date', 'sydney' ),
                __( 'Social sharing buttons', 'sydney' ),
                __( 'Elementor template builder for single posts', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',                
            ),            
            'priority'    => 999
        )
    ) 
);

/**
 * Slider
 */
$wp_customize->add_setting( 
    'sydney_upsell_hero_slider',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_hero_slider',
        array(
            'section'     => 'sydney_slider',
            'description' => __( 'Create an even more engaging slider with Sydney Pro!', 'sydney' ),
            'features'    => array(
                __( 'Extra styling options', 'sydney' ),
                __( 'A different button for each slide', 'sydney' ),
                __( 'Fade and slide transitions', 'sydney' ),
                __( 'Button and text animations', 'sydney' ),
                __( 'Title tag control', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',
            ),             
            'priority'    => 999
        )
    ) 
);


/**
 * Typography
 */
$wp_customize->add_setting( 
    'sydney_upsell_typography',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_typography',
        array(
            'section'     => 'sydney_section_typography_headings',
            'description' => __( 'Get access to more fonts with Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Adobe Fonts integration', 'sydney' ),
                __( 'An option to upload custom fonts', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',
            ),             
            'priority'    => 999
        )
    ) 
);
$wp_customize->add_setting( 
    'sydney_upsell_typography_body',
	array(
		'default'           => '',
		'sanitize_callback' => 'sydney_sanitize_text'
	)
);

$wp_customize->add_control( 
    new Sydney_Upsell_Message( 
        $wp_customize, 
        'sydney_upsell_typography_body',
        array(
            'section'     => 'sydney_section_typography_body',
            'description' => __( 'Get access to more fonts with Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Adobe Fonts integration', 'sydney' ),
                __( 'An option to upload custom fonts', 'sydney' ),
                '<a target="_blank" href="https://athemes.com/theme/sydney/#see-all-features">' . __( '&hellip;and many more premium features', 'sydney' ) . '</a>',
            ),             
            'priority'    => 999
        )
    ) 
);