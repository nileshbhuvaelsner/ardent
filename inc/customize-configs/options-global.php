<?php
/* Global Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'ardent_global_settings',
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Global', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);

// Sidebar settings
$wp_customize->add_setting( 'ardent_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'right-sidebar',
		//'transport'			=> 'postMessage'
	)
);

$wp_customize->add_control( 'ardent_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Site Layout', 'ardent' ),
		'description' => esc_html__( 'Site Layout, apply for all pages, exclude home page and custom page templates.', 'ardent' ),
		'section'     => 'ardent_global_settings',
		'choices'     => array(
			'right-sidebar' => esc_html__( 'Right sidebar', 'ardent' ),
			'left-sidebar'  => esc_html__( 'Left sidebar', 'ardent' ),
			'no-sidebar'    => esc_html__( 'No sidebar', 'ardent' ),
		)
	)
);


// Disable Animation
$wp_customize->add_setting( 'ardent_animation_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_animation_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Disable animation effect?', 'ardent' ),
		'section'     => 'ardent_global_settings',
		'description' => esc_html__( 'Check this box to disable all element animation when scroll.', 'ardent' )
	)
);

// Disable Animation
$wp_customize->add_setting( 'ardent_btt_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control( 'ardent_btt_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Hide footer back to top?', 'ardent' ),
		'section'     => 'ardent_global_settings',
		'description' => esc_html__( 'Check this box to hide footer back to top button.', 'ardent' )
	)
);

// Disable Google Font
$wp_customize->add_setting( 'ardent_disable_g_font',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control( 'ardent_disable_g_font',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Disable Google Fonts', 'ardent' ),
		'section'     => 'ardent_global_settings',
		'description' => esc_html__( 'Check this if you want to disable default google fonts in theme.', 'ardent' )
	)
);