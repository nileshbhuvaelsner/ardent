<?php
/**
 * Page Settings
 *
 * @package ardent
 */

$wp_customize->add_section(
	'ardent_page',
	array(
		'priority'    => null,
		'title'       => esc_html__( 'Page Title Area', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);

// Disable the page title bar.
$wp_customize->add_setting(
	'ardent_page_title_bar_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control(
	'ardent_page_title_bar_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Disable Page Title bar?', 'ardent' ),
		'section'     => 'ardent_page',
		'description' => esc_html__( 'Check this box to disable the page title bar on all pages.', 'ardent' ),
	)
);

$wp_customize->add_setting(
	'ardent_page_cover_pd_top',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	'ardent_page_cover_pd_top',
	array(
		'label'       => esc_html__( 'Padding Top', 'ardent' ),
		'description' => esc_html__( 'The page cover padding top in percent (%).', 'ardent' ),
		'section'     => 'ardent_page',
	)
);

$wp_customize->add_setting(
	'ardent_page_cover_pd_bottom',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	'ardent_page_cover_pd_bottom',
	array(
		'label'       => esc_html__( 'Padding Bottom', 'ardent' ),
		'description' => esc_html__( 'The page cover padding bottom in percent (%).', 'ardent' ),
		'section'     => 'ardent_page',
	)
);

$wp_customize->add_setting(
	'ardent_page_cover_color',
	array(
		'sanitize_callback' => 'ardent_sanitize_color_alpha',
		'default'           => null,
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_page_cover_color',
		array(
			'label'   => esc_html__( 'Color', 'ardent' ),
			'section' => 'ardent_page',
		)
	)
);

// Overlay color.
$wp_customize->add_setting(
	'ardent_page_cover_overlay',
	array(
		'sanitize_callback' => 'ardent_sanitize_color_alpha',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	new ARDENT_Alpha_Color_Control(
		$wp_customize,
		'ardent_page_cover_overlay',
		array(
			'label'   => esc_html__( 'Background Overlay Color', 'ardent' ),
			'section' => 'ardent_page',
		)
	)
);

/**
 * Normal page title align.
 *
 * @since 2.2.1
*/
$wp_customize->add_setting(
	'ardent_page_normal_align',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'left',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	'ardent_page_normal_align',
	array(
		'label'   => esc_html__( 'Page Title Alignment', 'ardent' ),
		'section' => 'ardent_page',
		'type'    => 'select',
		'choices' => array(
			'left'   => esc_html__( 'Left', 'ardent' ),
			'right'  => esc_html__( 'Right', 'ardent' ),
			'center' => esc_html__( 'Center', 'ardent' ),
		),
	)
);


$wp_customize->add_setting(
	'ardent_page_cover_align',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'center',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	'ardent_page_cover_align',
	array(
		'label'   => esc_html__( 'Page Title Cover Alignment', 'ardent' ),
		'description'   => esc_html__( 'Apply when the page display featured image as header cover.', 'ardent' ),
		'section' => 'ardent_page',
		'type'    => 'select',
		'choices' => array(
			'center' => esc_html__( 'Center', 'ardent' ),
			'left'   => esc_html__( 'Left', 'ardent' ),
			'right'  => esc_html__( 'Right', 'ardent' ),
		),
	)
);

