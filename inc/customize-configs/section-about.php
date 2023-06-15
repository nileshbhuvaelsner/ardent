<?php
/**
 * Section: About
 */
$wp_customize->add_panel( 'ardent_about',
	array(
		'priority'        => 160,
		'title'           => esc_html__( 'Section: About', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

$wp_customize->add_section( 'ardent_about_settings',
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_about',
	)
);

// Show Content
$wp_customize->add_setting( 'ardent_about_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_about_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Hide this section?', 'ardent' ),
		'section'     => 'ardent_about_settings',
		'description' => esc_html__( 'Check this box to hide this section.', 'ardent' ),
	)
);

// Section ID
$wp_customize->add_setting( 'ardent_about_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__( 'about', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_about_id',
	array(
		'label'       => esc_html__( 'Section ID:', 'ardent' ),
		'section'     => 'ardent_about_settings',
		'description' => esc_html__( 'The section ID should be English character, lowercase and no space.', 'ardent' )
	)
);

// Title
$wp_customize->add_setting( 'ardent_about_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'About Us', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_about_title',
	array(
		'label'       => esc_html__( 'Section Title', 'ardent' ),
		'section'     => 'ardent_about_settings',
		'description' => '',
	)
);

// Sub Title
$wp_customize->add_setting( 'ardent_about_subtitle',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Section subtitle', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_about_subtitle',
	array(
		'label'       => esc_html__( 'Section Subtitle', 'ardent' ),
		'section'     => 'ardent_about_settings',
		'description' => '',
	)
);

// Description
$wp_customize->add_setting( 'ardent_about_desc',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_about_desc',
	array(
		'label'       => esc_html__( 'Section Description', 'ardent' ),
		'section'     => 'ardent_about_settings',
		'description' => '',
	)
) );

if ( class_exists( 'ARDENT_Plus' ) ) {
	// About column
	$wp_customize->add_setting( 'ardent_about_layout',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => 3,
		)
	);

	$wp_customize->add_control( 'ardent_about_layout',
		array(
			'label'       => esc_html__( 'Layout Settings', 'ardent' ),
			'section'     => 'ardent_about_settings',
			'description' => '',
			'type'        => 'select',
			'choices'     => array(
				4 => esc_html__( '4 Columns', 'ardent' ),
				3 => esc_html__( '3 Columns', 'ardent' ),
				2 => esc_html__( '2 Columns', 'ardent' ),
				1 => esc_html__( '1 Column', 'ardent' ),
			),
		)
	);
}

ardent_add_upsell_for_section( $wp_customize , 'ardent_about_settings' );


$wp_customize->add_section( 'ardent_about_content',
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Section Content', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_about',
	)
);

// About Items
$wp_customize->add_setting(
	'ardent_about_boxes',
	array(
		//'default' => '',
		'sanitize_callback' => 'ardent_sanitize_repeatable_data_field',
		'transport'         => 'refresh', // refresh or postMessage
	) );


$wp_customize->add_control(
	new Ardent_Customize_Repeatable_Control(
		$wp_customize,
		'ardent_about_boxes',
		array(
			'label'         => esc_html__( 'About content page', 'ardent' ),
			'description'   => '',
			'section'       => 'ardent_about_content',
			'live_title_id' => 'content_page', // apply for unput text and textarea only
			'title_format'  => esc_html__( '[live_title]', 'ardent' ), // [live_title]
			'max_item'      => 3, // Maximum item can add
			'limited_msg'   => wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/ardent-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=ardent_customizer#get-started">ARDENT Plus</a> to be able to add more items and unlock other premium features!', 'ardent' ) ),
			'fields'        => array(
				'content_page' => array(
					'title'   => esc_html__( 'Select a page', 'ardent' ),
					'type'    => 'select',
					'options' => $option_pages
				),
				'hide_title'   => array(
					'title' => esc_html__( 'Hide item title', 'ardent' ),
					'type'  => 'checkbox',
				),
				'enable_link'  => array(
					'title' => esc_html__( 'Link to single page', 'ardent' ),
					'type'  => 'checkbox',
				),
			),

		)
	)
);

// About content source
$wp_customize->add_setting( 'ardent_about_content_source',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'content',
	)
);

$wp_customize->add_control( 'ardent_about_content_source',
	array(
		'label'       => esc_html__( 'Item content source', 'ardent' ),
		'section'     => 'ardent_about_content',
		'description' => '',
		'type'        => 'select',
		'choices'     => array(
			'content' => esc_html__( 'Full Page Content', 'ardent' ),
			'excerpt' => esc_html__( 'Page Excerpt', 'ardent' ),
		),
	)
);
