<?php
/**
 * Section: Counter
 */
$wp_customize->add_panel( 'ardent_counter' ,
	array(
		'priority'        => 210,
		'title'           => esc_html__( 'Section: Counter', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

$wp_customize->add_section( 'ardent_counter_settings' ,
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_counter',
	)
);
// Show Content
$wp_customize->add_setting( 'ardent_counter_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_counter_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Hide this section?', 'ardent'),
		'section'     => 'ardent_counter_settings',
		'description' => esc_html__('Check this box to hide this section.', 'ardent'),
	)
);

// Section ID
$wp_customize->add_setting( 'ardent_counter_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('counter', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_counter_id',
	array(
		'label'     	=> esc_html__('Section ID:', 'ardent'),
		'section' 		=> 'ardent_counter_settings',
		'description'   => esc_html__( 'The section ID should be English character, lowercase and no space.', 'ardent' )
	)
);

// Title
$wp_customize->add_setting( 'ardent_counter_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Our Numbers', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_counter_title',
	array(
		'label'     	=> esc_html__('Section Title', 'ardent'),
		'section' 		=> 'ardent_counter_settings',
		'description'   => '',
	)
);

// Sub Title
$wp_customize->add_setting( 'ardent_counter_subtitle',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Section subtitle', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_counter_subtitle',
	array(
		'label'     	=> esc_html__('Section Subtitle', 'ardent'),
		'section' 		=> 'ardent_counter_settings',
		'description'   => '',
	)
);

// Description
$wp_customize->add_setting( 'ardent_counter_desc',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_counter_desc',
	array(
		'label' 		=> esc_html__('Section Description', 'ardent'),
		'section' 		=> 'ardent_counter_settings',
		'description'   => '',
	)
));

ardent_add_upsell_for_section( $wp_customize, 'ardent_counter_settings' );

$wp_customize->add_section( 'ardent_counter_content' ,
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Section Content', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_counter',
	)
);

// Order & Styling
$wp_customize->add_setting(
	'ardent_counter_boxes',
	array(
		'sanitize_callback' => 'ardent_sanitize_repeatable_data_field',
		'transport' => 'refresh', // refresh or postMessage
	) );


$wp_customize->add_control(
	new Ardent_Customize_Repeatable_Control(
		$wp_customize,
		'ardent_counter_boxes',
		array(
			'label'     	=> esc_html__('Counter content', 'ardent'),
			'description'   => '',
			'section'       => 'ardent_counter_content',
			'live_title_id' => 'title', // apply for unput text and textarea only
			'title_format'  => esc_html__('[live_title]', 'ardent'), // [live_title]
			'max_item'      => 4, // Maximum item can add
			'limited_msg' 	=> wp_kses_post( __('Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/ardent-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=ardent_customizer#get-started">ARDENT Plus</a> to be able to add more items and unlock other premium features!', 'ardent' ) ),
			'fields'    => array(
				'title' => array(
					'title' => esc_html__('Title', 'ardent'),
					'type'  =>'text',
					'desc'  => '',
					'default' => esc_html__( 'Your counter label', 'ardent' ),
				),
				'number' => array(
					'title' => esc_html__('Number', 'ardent'),
					'type'  =>'text',
					'default' => 99,
				),
				'unit_before'  => array(
					'title' => esc_html__('Before number', 'ardent'),
					'type'  =>'text',
					'default' => '',
				),
				'unit_after'  => array(
					'title' => esc_html__('After number', 'ardent'),
					'type'  =>'text',
					'default' => '',
				),
			),

		)
	)
);
