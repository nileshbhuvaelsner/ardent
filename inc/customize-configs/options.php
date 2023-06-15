<?php
/**
 * Site Options
 *
 * @package ardent
 */

$wp_customize->add_panel(
	'ardent_options',
	array(
		'priority'       => 5,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'ardent' ),
		'description'    => '',
	)
);


if ( ! function_exists( 'wp_get_custom_css' ) ) {  // Back-compat for WordPress < 4.7.

	// Custom CSS Settings.
	$wp_customize->add_section(
		'ardent_custom_code',
		array(
			'title' => __( 'Custom CSS', 'ardent' ),
			'panel' => 'ardent_options',
		)
	);


	$wp_customize->add_setting(
		'ardent_custom_css',
		array(
			'default'           => '',
			'sanitize_callback' => 'ardent_sanitize_css',
			'type'              => 'option',
		)
	);

	$wp_customize->add_control(
		'ardent_custom_css',
		array(
			'label'   => __( 'Custom CSS', 'ardent' ),
			'section' => 'ardent_custom_code',
			'type'    => 'textarea',
		)
	);
} else {
	$wp_customize->get_section( 'custom_css' )->priority = 994;
}
