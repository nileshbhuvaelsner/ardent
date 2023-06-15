<?php
/**
 *  Dots Navigation Settings
 * @since 2.1.0
 */
$wp_customize->add_section( 'ardent_sections_nav',
	array(
		'priority'    => null,
		'title'       => esc_html__( 'Sections Navigation', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);

Ardent_Dots_Navigation::get_instance()->add_customize( $wp_customize, 'ardent_sections_nav' );
