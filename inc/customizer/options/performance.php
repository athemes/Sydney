<?php
/**
 * Performance Customizer Options
 *
 * @package Sydney
 */

$wp_customize->add_section(
    'sydney_section_performance',
    array(
        'title'      => esc_html__( 'Performance', 'sydney' ),
        'panel'      => 'sydney_panel_general',
        'priority'   => 999
    )
);

$wp_customize->add_setting(
	'perf_google_fonts_local',
	array(
		'default'           => 0,
		'sanitize_callback' => 'sydney_sanitize_checkbox'
	)
);
$wp_customize->add_control(
	new Sydney_Toggle_Control(
		$wp_customize,
		'perf_google_fonts_local',
		array(
			'label'         	=> esc_html__( 'Load Google Fonts Locally?', 'sydney' ),
			'section'       	=> 'sydney_section_performance',
		)
	)
);