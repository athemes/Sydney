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
            'description' => __( 'More header options are available in Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Build Headers with Elementor', 'sydney' ),
                __( 'Extra desktop and mobile layouts', 'sydney' ),
                __( 'Top Bar', 'sydney' ),
                ///__( 'Build a Mega-Menu with Elementor', 'sydney' ),
                __( 'More header components', 'sydney' ),
                __( 'Mobile-only menu', 'sydney' ),
                __( 'Custom breakpoints', 'sydney' ),
                __( 'Different mobile logo', 'sydney' ),
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
            'description' => __( 'More header options are available in Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Build Headers with Elementor', 'sydney' ),
                __( 'Extra desktop and mobile layouts', 'sydney' ),
                __( 'Top Bar', 'sydney' ),
                //__( 'Build a Mega-Menu with Elementor', 'sydney' ),
                __( 'More header components', 'sydney' ),
                __( 'Mobile-only menu', 'sydney' ),
                __( 'Custom breakpoints', 'sydney' ),
                __( 'Different mobile logo', 'sydney' ),
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
            'description' => __( 'More footer options are available in Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Build Footers with Elementor', 'sydney' ),
                __( 'Reveal effect', 'sydney' ),
                __( 'SVG Footer separators', 'sydney' ),
                __( 'Pre-footer area', 'sydney' ),
                __( 'Background image', 'sydney' ),
                __( 'Extra elements', 'sydney' ),
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
            'description' => __( 'More footer options are available in Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Build Footers with Elementor', 'sydney' ),
                __( 'Reveal effect', 'sydney' ),
                __( 'SVG Footer separators', 'sydney' ),
                __( 'Pre-footer area', 'sydney' ),
                __( 'Background image', 'sydney' ),
                __( 'Extra elements', 'sydney' ),
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
            'description' => __( 'More blog options are available in Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Build Archive Templates with Elementor', 'sydney' ),
                __( 'Page Headers module', 'sydney' ),
                __( 'Extra blog layouts', 'sydney' ),
                __( 'Featured posts area', 'sydney' ),
                __( 'Featured boxes', 'sydney' ),
                __( 'Image hover effects', 'sydney' ),
                __( 'Reading progress and reading time', 'sydney' ),
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
            'description' => __( 'More blog options are available in Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Build Single Templates with Elementor', 'sydney' ),
                __( 'Post headers', 'sydney' ),
                __( 'Reading progress and reading time', 'sydney' ),
                __( 'Last updated date', 'sydney' ),
                __( 'Post sharing', 'sydney' ),
                __( 'Related posts layouts', 'sydney' ),
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
            'description' => __( 'More slider options are available in Sydney Pro', 'sydney' ),
            'features'    => array(
                __( 'Styling options', 'sydney' ),
                __( 'Individual buttons for each slide', 'sydney' ),
                __( 'Fade or slide transitions', 'sydney' ),
                __( 'Button and text animations', 'sydney' ),
                __( 'Title tag control', 'sydney' ),
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
                //__( 'Custom fonts upload', 'sydney' ),
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
                __( 'Custom fonts upload', 'sydney' ),
            ),             
            'priority'    => 999
        )
    ) 
);