<?php
/**
 * Section: Services
 */
$wp_customize->add_panel( 'ardent_services',
	array(
		'priority'        => 170,
		'title'           => esc_html__( 'Section: Services', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

$wp_customize->add_section( 'ardent_service_settings',
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_services',
	)
);

// Show Content
$wp_customize->add_setting( 'ardent_services_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_services_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Hide this section?', 'ardent' ),
		'section'     => 'ardent_service_settings',
		'description' => esc_html__( 'Check this box to hide this section.', 'ardent' ),
	)
);

// Section ID
$wp_customize->add_setting( 'ardent_services_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__( 'services', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_services_id',
	array(
		'label'       => esc_html__( 'Section ID:', 'ardent' ),
		'section'     => 'ardent_service_settings',
		'description' => 'The section ID should be English character, lowercase and no space.'
	)
);

// Title
$wp_customize->add_setting( 'ardent_services_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Our Services', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_services_title',
	array(
		'label'       => esc_html__( 'Section Title', 'ardent' ),
		'section'     => 'ardent_service_settings',
		'description' => '',
	)
);

// Sub Title
$wp_customize->add_setting( 'ardent_services_subtitle',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Section subtitle', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_services_subtitle',
	array(
		'label'       => esc_html__( 'Section Subtitle', 'ardent' ),
		'section'     => 'ardent_service_settings',
		'description' => '',
	)
);

// Description
$wp_customize->add_setting( 'ardent_services_desc',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_services_desc',
	array(
		'label'       => esc_html__( 'Section Description', 'ardent' ),
		'section'     => 'ardent_service_settings',
		'description' => '',
	)
) );


// Services layout
$wp_customize->add_setting( 'ardent_service_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '6',
	)
);

$wp_customize->add_control( 'ardent_service_layout',
	array(
		'label'       => esc_html__( 'Services Layout Settings', 'ardent' ),
		'section'     => 'ardent_service_settings',
		'description' => '',
		'type'        => 'select',
		'choices'     => array(
			'3'  => esc_html__( '4 Columns', 'ardent' ),
			'4'  => esc_html__( '3 Columns', 'ardent' ),
			'6'  => esc_html__( '2 Columns', 'ardent' ),
			'12' => esc_html__( '1 Column', 'ardent' ),
		),
	)
);


ardent_add_upsell_for_section( $wp_customize, 'ardent_service_settings' );


$wp_customize->add_section( 'ardent_service_content',
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Section Content', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_services',
	)
);

// Section service content.
$wp_customize->add_setting(
	'ardent_services',
	array(
		'sanitize_callback' => 'ardent_sanitize_repeatable_data_field',
		'transport'         => 'refresh', // refresh or postMessage
	) );


$wp_customize->add_control(
	new Ardent_Customize_Repeatable_Control(
		$wp_customize,
		'ardent_services',
		array(
			'label'         => esc_html__( 'Service content', 'ardent' ),
			'description'   => '',
			'section'       => 'ardent_service_content',
			'live_title_id' => 'content_page', // apply for unput text and textarea only
			'title_format'  => esc_html__( '[live_title]', 'ardent' ), // [live_title]
			'max_item'      => 4, // Maximum item can add,
			'limited_msg'   => wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/ardent-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=ardent_customizer#get-started">ARDENT Plus</a> to be able to add more items and unlock other premium features!', 'ardent' ) ),
			'fields'        => array(
				'icon_type' => array(
					'title'   => esc_html__( 'Custom icon', 'ardent' ),
					'type'    => 'select',
					'options' => array(
						'icon'  => esc_html__( 'Icon', 'ardent' ),
						'image' => esc_html__( 'image', 'ardent' ),
					),
				),
				'icon'      => array(
					'title'    => esc_html__( 'Icon', 'ardent' ),
					'type'     => 'icon',
					'required' => array( 'icon_type', '=', 'icon' ),
				),
				'image'     => array(
					'title'    => esc_html__( 'Image', 'ardent' ),
					'type'     => 'media',
					'required' => array( 'icon_type', '=', 'image' ),
				),

				'content_page' => array(
					'title'   => esc_html__( 'Select a page', 'ardent' ),
					'type'    => 'select',
					'options' => $option_pages
				),
				'enable_link'  => array(
					'title' => esc_html__( 'Link to single page', 'ardent' ),
					'type'  => 'checkbox',
				),
			),

		)
	)
);


// Services icon size
$wp_customize->add_setting( 'ardent_service_icon_size',
	array(
		'sanitize_callback' => 'ardent_sanitize_select',
		'default'           => '5x',
	)
);

$wp_customize->add_control( 'ardent_service_icon_size',
	array(
		'label'       => esc_html__( 'Icon Size', 'ardent' ),
		'section'     => 'ardent_service_content',
		'description' => '',
		'type'        => 'select',
		'choices'     => array(
			'5x' => esc_html__( '5x', 'ardent' ),
			'4x' => esc_html__( '4x', 'ardent' ),
			'3x' => esc_html__( '3x', 'ardent' ),
			'2x' => esc_html__( '2x', 'ardent' ),
			'1x' => esc_html__( '1x', 'ardent' ),
		),
	)
);

// Service content source
$wp_customize->add_setting( 'ardent_service_content_source',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'excerpt',
	)
);

$wp_customize->add_control( 'ardent_service_content_source',
	array(
		'label'       => esc_html__( 'Item content source', 'ardent' ),
		'section'     => 'ardent_service_content',
		'description' => '',
		'type'        => 'select',
		'choices'     => array(
			'content' => esc_html__( 'Full Page Content', 'ardent' ),
			'excerpt' => esc_html__( 'Page Excerpt', 'ardent' ),
		),
	)
);
