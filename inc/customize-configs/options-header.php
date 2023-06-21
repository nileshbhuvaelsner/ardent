<?php
/**
 * Header Settings.
 *
 * @package ardent
 */

$wp_customize->add_section(
	'ardent_header_settings',
	array(
		'priority'    => 5,
		'title'       => esc_html__( 'Header', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);

// Header width.
$wp_customize->add_setting(
	'ardent_header_width',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'contained',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control(
	'ardent_header_width',
	array(
		'type'    => 'select',
		'label'   => esc_html__( 'Header Width', 'ardent' ),
		'section' => 'ardent_header_settings',
		'choices' => array(
			'full-width' => esc_html__( 'Full Width', 'ardent' ),
			'contained'  => esc_html__( 'Contained', 'ardent' ),
		),
	)
);

// Header Layout
// $wp_customize->add_setting(
// 	'ardent_header_position',
// 	array(
// 		'sanitize_callback' => 'sanitize_text_field',
// 		'default'           => 'top',
// 		'transport'         => 'postMessage',
// 		'active_callback'   => 'ardent_showon_frontpage',
// 	)
// );

// $wp_customize->add_control(
// 	'ardent_header_position',
// 	array(
// 		'type'    => 'select',
// 		'label'   => esc_html__( 'Header Position', 'ardent' ),
// 		'section' => 'ardent_header_settings',
// 		'choices' => array(
// 			'top'        => esc_html__( 'Top', 'ardent' ),
// 			'below_hero' => esc_html__( 'Below Hero Slider', 'ardent' ),
// 		),
// 	)
// );

// Header Transparent
$wp_customize->add_setting(
	'ardent_header_transparent',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
		'active_callback'   => 'ardent_showon_frontpage',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	'ardent_header_transparent',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Header Transparent', 'ardent' ),
		'section'     => 'ardent_header_settings',
		//'description' => esc_html__( 'Apply for front page template only.', 'ardent' ),
	)
);

// Disable Sticky Header
$wp_customize->add_setting(
	'ardent_sticky_header_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	'ardent_sticky_header_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Disable Sticky Header?', 'ardent' ),
		'section'     => 'ardent_header_settings',
		'description' => esc_html__( 'Check this box to disable sticky header when scroll.', 'ardent' ),
	)
);


// Vertical align menu
// $wp_customize->add_setting(
// 	'ardent_vertical_align_menu',
// 	array(
// 		'sanitize_callback' => 'ardent_sanitize_checkbox',
// 		'default'           => '',
// 	)
// );
// $wp_customize->add_control(
// 	'ardent_vertical_align_menu',
// 	array(
// 		'type'        => 'checkbox',
// 		'label'       => esc_html__( 'Center vertical align for menu', 'ardent' ),
// 		'section'     => 'ardent_header_settings',
// 		'description' => esc_html__( 'If you use logo and your logo is too tall, check this box to auto vertical align menu.', 'ardent' ),
// 	)
// );

// Scroll to top when click to logo
// $wp_customize->add_setting(
// 	'ardent_header_scroll_logo',
// 	array(
// 		'sanitize_callback' => 'ardent_sanitize_checkbox',
// 		'default'           => 0,
// 		'active_callback'   => '',
// 	)
// );
// $wp_customize->add_control(
// 	'ardent_header_scroll_logo',
// 	array(
// 		'type'    => 'checkbox',
// 		'label'   => esc_html__( 'Scroll to top when click to the site logo or site title, only apply on front page.', 'ardent' ),
// 		'section' => 'ardent_header_settings',
// 	)
// );

// Header BG Color
$wp_customize->add_setting(
	'ardent_header_bg_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_header_bg_color',
		array(
			'label'       => esc_html__( 'Background Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => '',
		)
	)
);


// Site Title Color
$wp_customize->add_setting(
	'ardent_logo_text_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_logo_text_color',
		array(
			'label'       => esc_html__( 'Site Title Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => esc_html__( 'Only set if you don\'t use an image logo.', 'ardent' ),
		)
	)
);

$wp_customize->add_setting(
	'ardent_tagline_text_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_tagline_text_color',
		array(
			'label'       => esc_html__( 'Site Tagline Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => esc_html__( 'Only set if display site tagline.', 'ardent' ),
		)
	)
);

// Header Menu Color
$wp_customize->add_setting(
	'ardent_menu_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_menu_color',
		array(
			'label'       => esc_html__( 'Menu Link Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => '',
		)
	)
);

// Header Menu Hover Color
$wp_customize->add_setting(
	'ardent_menu_hover_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_menu_hover_color',
		array(
			'label'       => esc_html__( 'Menu Link Hover/Active Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => '',

		)
	)
);

// Header Menu Hover BG Color
$wp_customize->add_setting(
	'ardent_menu_hover_bg_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_menu_hover_bg_color',
		array(
			'label'       => esc_html__( 'Menu Link Hover/Active BG Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => '',
		)
	)
);

// Responsive Mobile button color
$wp_customize->add_setting(
	'ardent_menu_toggle_button_color',
	array(
		'sanitize_callback'    => 'sanitize_hex_color_no_hash',
		'sanitize_js_callback' => 'maybe_hash_hex_color',
		'default'              => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_menu_toggle_button_color',
		array(
			'label'       => esc_html__( 'Responsive Menu Button Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => '',
		)
	)
);

// Transparent Logo
$wp_customize->add_setting(
	'ardent_transparent_logo',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ardent_transparent_logo',
		array(
			'label'       => esc_html__( 'Transparent Logo', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => esc_html__( 'Only apply when transparent header option is checked.', 'ardent' ),
		)
	)
);

// Transparent Retina Logo
$wp_customize->add_setting(
	'ardent_transparent_retina_logo',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'ardent_transparent_retina_logo',
		array(
			'label'       => esc_html__( 'Transparent Retina Logo', 'ardent' ),
			'description' => esc_html__( 'Only apply when transparent header option is checked.', 'ardent' ),
			'section'     => 'ardent_header_settings',
		)
	)
);

/**
 * @since 2.0.8
 */
$wp_customize->add_setting(
	'ardent_transparent_logo_height',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
	)
);
$wp_customize->add_control(
	'ardent_transparent_logo_height',
	array(
		'label'       => esc_html__( 'Transparent Logo Height in Pixel', 'ardent' ),
		'section'     => 'ardent_header_settings',
		'description' => '',
	)
);

$wp_customize->add_setting(
	'ardent_transparent_site_title_c',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_transparent_site_title_c',
		array(
			'label'       => esc_html__( 'Transparent Site Title Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => '',
		)
	)
);

$wp_customize->add_setting(
	'ardent_transparent_tag_title_c',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_transparent_tag_title_c',
		array(
			'label'       => esc_html__( 'Transparent Site Tagline Color', 'ardent' ),
			'section'     => 'ardent_header_settings',
			'description' => '',
		)
	)
);
