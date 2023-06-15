<?php
/**
 * Blog Post Settings
 * 
 * @package ardent
 *
 * @since 2.1.0
 * @since 2.2.1
 */

$wp_customize->add_section(
	'ardent_blog_posts',
	array(
		'priority'    => null,
		'title'       => esc_html__( 'Blog Posts', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);

$wp_customize->add_setting(
	'ardent_disable_archive_prefix',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control(
	'ardent_disable_archive_prefix',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Disable archive prefix', 'ardent' ),
		'section'     => 'ardent_blog_posts',
		'description' => esc_html__( 'Check this to disable archive prefix on category, date, tag page.', 'ardent' ),
	)
);

$wp_customize->add_setting(
	'ardent_hide_thumnail_if_not_exists',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control(
	'ardent_hide_thumnail_if_not_exists',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Hide thumbnail placeholder', 'ardent' ),
		'section'     => 'ardent_blog_posts',
		'description' => esc_html__( 'Hide placeholder if the post thumbnail not exists.', 'ardent' ),
	)
);
