<?php
/**
 * Section: Features
 */
$wp_customize->add_panel( 'ardent_features' ,
	array(
		'priority'        => 150,
		'title'           => esc_html__( 'Section: Features', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

$wp_customize->add_section( 'ardent_features_settings' ,
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_features',
	)
);

// Show Content
$wp_customize->add_setting( 'ardent_features_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_features_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Hide this section?', 'ardent'),
		'section'     => 'ardent_features_settings',
		'description' => esc_html__('Check this box to hide this section.', 'ardent'),
	)
);

// Section ID
$wp_customize->add_setting( 'ardent_features_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('features', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_features_id',
	array(
		'label' 		=> esc_html__('Section ID:', 'ardent'),
		'section' 		=> 'ardent_features_settings',
		'description'   => esc_html__( 'The section ID should be English character, lowercase and no space.', 'ardent' )
	)
);

// Title
$wp_customize->add_setting( 'ardent_features_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Features', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_features_title',
	array(
		'label' 		=> esc_html__('Section Title', 'ardent'),
		'section' 		=> 'ardent_features_settings',
		'description'   => '',
	)
);

// Sub Title
$wp_customize->add_setting( 'ardent_features_subtitle',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Section subtitle', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_features_subtitle',
	array(
		'label' 		=> esc_html__('Section Subtitle', 'ardent'),
		'section' 		=> 'ardent_features_settings',
		'description'   => '',
	)
);

// Description
$wp_customize->add_setting( 'ardent_features_desc',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_features_desc',
	array(
		'label' 		=> esc_html__('Section Description', 'ardent'),
		'section' 		=> 'ardent_features_settings',
		'description'   => '',
	)
));

// Features layout
$wp_customize->add_setting( 'ardent_features_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '3',
	)
);

$wp_customize->add_control( 'ardent_features_layout',
	array(
		'label' 		=> esc_html__('Features Layout Setting', 'ardent'),
		'section' 		=> 'ardent_features_settings',
		'description'   => '',
		'type'          => 'select',
		'choices'       => array(
			'3' => esc_html__( '4 Columns', 'ardent' ),
			'4' => esc_html__( '3 Columns', 'ardent' ),
			'6' => esc_html__( '2 Columns', 'ardent' ),
		),
	)
);


ardent_add_upsell_for_section( $wp_customize, 'ardent_features_settings' );


$wp_customize->add_section( 'ardent_features_content' ,
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Section Content', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_features',
	)
);

// Features content
$wp_customize->add_setting(
	'ardent_features_boxes',
	array(
		//'default' => '',
		'sanitize_callback' => 'ardent_sanitize_repeatable_data_field',
		'transport' => 'refresh', // refresh or postMessage
	) );

$wp_customize->add_control(
	new Ardent_Customize_Repeatable_Control(
		$wp_customize,
		'ardent_features_boxes',
		array(
			'label' 		=> esc_html__('Features content', 'ardent'),
			'description'   => '',
			'section'       => 'ardent_features_content',
			'live_title_id' => 'title', // apply for unput text and textarea only
			'title_format'  => esc_html__('[live_title]', 'ardent'), // [live_title]
			'max_item'      => 4, // Maximum item can add
			'limited_msg' 	=> wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/ardent-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=ardent_customizer#get-started">ARDENT Plus</a> to be able to add more items and unlock other premium features!', 'ardent' ) ),
			'fields'    => array(
				'title'  => array(
					'title' => esc_html__('Title', 'ardent'),
					'type'  =>'text',
				),
				'icon_type'  => array(
					'title' => esc_html__('Custom icon', 'ardent'),
					'type'  =>'select',
					'options' => array(
						'icon' => esc_html__('Icon', 'ardent'),
						'image' => esc_html__('image', 'ardent'),
					),
				),
				'icon'  => array(
					'title' => esc_html__('Icon', 'ardent'),
					'type'  =>'icon',
					'required' => array( 'icon_type', '=', 'icon' ),
				),
				'image'  => array(
					'title' => esc_html__('Image', 'ardent'),
					'type'  =>'media',
					'required' => array( 'icon_type', '=', 'image' ),
				),
				'desc'  => array(
					'title' => esc_html__('Description', 'ardent'),
					'type'  =>'editor',
				),
				'link'  => array(
					'title' => esc_html__('Custom Link', 'ardent'),
					'type'  =>'text',
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
		'label' 		=> esc_html__('Item content source', 'ardent'),
		'section' 		=> 'ardent_about_content',
		'description'   => '',
		'type'          => 'select',
		'choices'       => array(
			'content' => esc_html__( 'Full Page Content', 'ardent' ),
			'excerpt' => esc_html__( 'Page Excerpt', 'ardent' ),
		),
	)
);
