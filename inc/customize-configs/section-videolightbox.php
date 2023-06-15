<?php
/*------------------------------------------------------------------------*/
/*  Section: Video Popup
/*------------------------------------------------------------------------*/
$wp_customize->add_panel( 'ardent_videolightbox' ,
	array(
		'priority'        => 180,
		'title'           => esc_html__( 'Section: Video Lightbox', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

$wp_customize->add_section( 'ardent_videolightbox_settings' ,
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_videolightbox',
	)
);

// Show Content
$wp_customize->add_setting( 'ardent_videolightbox_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_videolightbox_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Hide this section?', 'ardent'),
		'section'     => 'ardent_videolightbox_settings',
		'description' => esc_html__('Check this box to hide this section.', 'ardent'),
	)
);

// Section ID
$wp_customize->add_setting( 'ardent_videolightbox_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => 'videolightbox',
	)
);
$wp_customize->add_control( 'ardent_videolightbox_id',
	array(
		'label' 		=> esc_html__('Section ID:', 'ardent'),
		'section' 		=> 'ardent_videolightbox_settings',
		'description'   => esc_html__('The section ID should be English character, lowercase and no space.', 'ardent' )
	)
);

// Title
$wp_customize->add_setting( 'ardent_videolightbox_title',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);

$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_videolightbox_title',
	array(
		'label'     	=>  esc_html__('Section heading', 'ardent'),
		'section' 		=> 'ardent_videolightbox_settings',
		'description'   => '',
	)
));

// Video URL
$wp_customize->add_setting( 'ardent_videolightbox_url',
	array(
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_videolightbox_url',
	array(
		'label' 		=> esc_html__('Video url', 'ardent'),
		'section' 		=> 'ardent_videolightbox_settings',
		'description'   =>  esc_html__('Paste Youtube or Vimeo url here', 'ardent'),
	)
);

// Parallax image
$wp_customize->add_setting( 'ardent_videolightbox_image',
	array(
		'sanitize_callback' => 'ardent_sanitize_number',
		'default'           => '',
	)
);
$wp_customize->add_control( new WP_Customize_Media_Control(
	$wp_customize,
	'ardent_videolightbox_image',
	array(
		'label' 		=> esc_html__('Background image', 'ardent'),
		'section' 		=> 'ardent_videolightbox_settings',
	)
));

ardent_add_upsell_for_section( $wp_customize, 'ardent_videolightbox_settings' );