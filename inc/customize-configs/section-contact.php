<?php
/**
 * Section: Contact
 */
$wp_customize->add_panel( 'ardent_contact' ,
	array(
		'priority'        => 270,
		'title'           => esc_html__( 'Section: Contact', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

$wp_customize->add_section( 'ardent_contact_settings' ,
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_contact',
	)
);

// Show Content
$wp_customize->add_setting( 'ardent_contact_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_contact_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Hide this section?', 'ardent'),
		'section'     => 'ardent_contact_settings',
		'description' => esc_html__('Check this box to hide this section.', 'ardent'),
	)
);

// Section ID
$wp_customize->add_setting( 'ardent_contact_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('contact', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_contact_id',
	array(
		'label'     => esc_html__('Section ID:', 'ardent'),
		'section' 		=> 'ardent_contact_settings',
		'description'   => esc_html__( 'The section ID should be English character, lowercase and no space.', 'ardent' )
	)
);

// Title
$wp_customize->add_setting( 'ardent_contact_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Get in touch', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_contact_title',
	array(
		'label'     => esc_html__('Section Title', 'ardent'),
		'section' 		=> 'ardent_contact_settings',
		'description'   => '',
	)
);

// Sub Title
$wp_customize->add_setting( 'ardent_contact_subtitle',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__('Section subtitle', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_contact_subtitle',
	array(
		'label'     => esc_html__('Section Subtitle', 'ardent'),
		'section' 		=> 'ardent_contact_settings',
		'description'   => '',
	)
);

// Description
$wp_customize->add_setting( 'ardent_contact_desc',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_contact_desc',
	array(
		'label' 		=> esc_html__('Section Description', 'ardent'),
		'section' 		=> 'ardent_contact_settings',
		'description'   => '',
	)
));


ardent_add_upsell_for_section( $wp_customize, 'ardent_contact_settings' );


$wp_customize->add_section( 'ardent_contact_content' ,
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Section Content', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_contact',
	)
);
// Contact form 7 guide.
$wp_customize->add_setting( 'ardent_contact_cf7_guide',
	array(
		'sanitize_callback' => 'ardent_sanitize_text'
	)
);
$wp_customize->add_control( new ARDENT_Misc_Control( $wp_customize, 'ardent_contact_cf7_guide',
	array(
		'section'     => 'ardent_contact_content',
		'type'        => 'custom_message',
		'description' => wp_kses_post( 'Paste your form shortcode from contact form plugin here, e.g <code>[wpforms  id="123"]</code>', 'ardent' )
	)
));

// Contact Form 7 Shortcode
$wp_customize->add_setting( 'ardent_contact_cf7',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_contact_cf7',
	array(
		'label'     	=> esc_html__('Contact Form Shortcode.', 'ardent'),
		'section' 		=> 'ardent_contact_content',
		'description'   => '',
	)
);

// Show CF7
$wp_customize->add_setting( 'ardent_contact_cf7_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_contact_cf7_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Hide contact form completely.', 'ardent'),
		'section'     => 'ardent_contact_content',
		'description' => esc_html__('Check this box to hide contact form.', 'ardent'),
	)
);

// Contact Text
$wp_customize->add_setting( 'ardent_contact_text',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_contact_text',
	array(
		'label'     	=> esc_html__('Contact Text', 'ardent'),
		'section' 		=> 'ardent_contact_content',
		'description'   => '',
	)
));

// hr
$wp_customize->add_setting( 'ardent_contact_text_hr', array( 'sanitize_callback' => 'ardent_sanitize_text' ) );
$wp_customize->add_control( new ARDENT_Misc_Control( $wp_customize, 'ardent_contact_text_hr',
	array(
		'section'     => 'ardent_contact_content',
		'type'        => 'hr'
	)
));

// Address Box
$wp_customize->add_setting( 'ardent_contact_address_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_contact_address_title',
	array(
		'label'     	=> esc_html__('Contact Box Title', 'ardent'),
		'section' 		=> 'ardent_contact_content',
		'description'   => '',
	)
);

// Contact Text
$wp_customize->add_setting( 'ardent_contact_address',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_contact_address',
	array(
		'label'     => esc_html__('Address', 'ardent'),
		'section' 		=> 'ardent_contact_content',
		'description'   => '',
	)
);

// Contact Phone
$wp_customize->add_setting( 'ardent_contact_phone',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_contact_phone',
	array(
		'label'     	=> esc_html__('Phone', 'ardent'),
		'section' 		=> 'ardent_contact_content',
		'description'   => '',
	)
);

// Contact Email
$wp_customize->add_setting( 'ardent_contact_email',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_contact_email',
	array(
		'label'     	=> esc_html__('Email', 'ardent'),
		'section' 		=> 'ardent_contact_content',
		'description'   => '',
	)
);

// Contact Fax
$wp_customize->add_setting( 'ardent_contact_fax',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_contact_fax',
	array(
		'label'     	=> esc_html__('Fax', 'ardent'),
		'section' 		=> 'ardent_contact_content',
		'description'   => '',
	)
);