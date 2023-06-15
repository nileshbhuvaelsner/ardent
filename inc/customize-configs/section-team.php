<?php
/**
 * Section: Team
 */
$wp_customize->add_panel( 'ardent_team' ,
	array(
		'priority'        => 250,
		'title'           => esc_html__( 'Section: Team', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

$wp_customize->add_section( 'ardent_team_settings' ,
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_team',
	)
);

// Show Content
$wp_customize->add_setting( 'ardent_team_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_team_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Hide this section?', 'ardent'),
		'section'     => 'ardent_team_settings',
		'description' => esc_html__('Check this box to hide this section.', 'ardent'),
	)
);
// Section ID
$wp_customize->add_setting( 'ardent_team_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('team', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_team_id',
	array(
		'label'     	=> esc_html__('Section ID:', 'ardent'),
		'section' 		=> 'ardent_team_settings',
		'description'   => 'The section ID should be English character, lowercase and no space.'
	)
);

// Title
$wp_customize->add_setting( 'ardent_team_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Our Team', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_team_title',
	array(
		'label'    		=> esc_html__('Section Title', 'ardent'),
		'section' 		=> 'ardent_team_settings',
		'description'   => '',
	)
);

// Sub Title
$wp_customize->add_setting( 'ardent_team_subtitle',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Section subtitle', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_team_subtitle',
	array(
		'label'     => esc_html__('Section Subtitle', 'ardent'),
		'section' 		=> 'ardent_team_settings',
		'description'   => '',
	)
);

// Description
$wp_customize->add_setting( 'ardent_team_desc',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_team_desc',
	array(
		'label' 		=> esc_html__('Section Description', 'ardent'),
		'section' 		=> 'ardent_team_settings',
		'description'   => '',
	)
));

// Team layout
$wp_customize->add_setting( 'ardent_team_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '3',
	)
);

$wp_customize->add_control( 'ardent_team_layout',
	array(
		'label' 		=> esc_html__('Team Layout Settings', 'ardent'),
		'section' 		=> 'ardent_team_settings',
		'description'   => '',
		'type'          => 'select',
		'choices'       => array(
			'3' => esc_html__( '4 Columns', 'ardent' ),
			'4' => esc_html__( '3 Columns', 'ardent' ),
			'6' => esc_html__( '2 Columns', 'ardent' ),
		),
	)
);

ardent_add_upsell_for_section( $wp_customize, 'ardent_team_settings' );

$wp_customize->add_section( 'ardent_team_content' ,
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Section Content', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_team',
	)
);

// Team member settings
$wp_customize->add_setting(
	'ardent_team_members',
	array(
		'sanitize_callback' => 'ardent_sanitize_repeatable_data_field',
		'transport' => 'refresh', // refresh or postMessage
	) );


$wp_customize->add_control(
	new Ardent_Customize_Repeatable_Control(
		$wp_customize,
		'ardent_team_members',
		array(
			'label'     => esc_html__('Team members', 'ardent'),
			'description'   => '',
			'section'       => 'ardent_team_content',
			//'live_title_id' => 'user_id', // apply for unput text and textarea only
			'title_format'  => esc_html__( '[live_title]', 'ardent'), // [live_title]
			'max_item'      => 4, // Maximum item can add
			'limited_msg' 	=> wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/ardent-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=ardent_customizer#get-started">ARDENT Plus</a> to be able to add more items and unlock other premium features!', 'ardent' ) ),
			'fields'    => array(
				'user_id' => array(
					'title' => esc_html__('User media', 'ardent'),
					'type'  =>'media',
					'desc'  => '',
				),
				'link' => array(
					'title' => esc_html__('Custom Link', 'ardent'),
					'type'  =>'text',
					'desc'  => '',
				),
			),

		)
	)
);