<?php
/**
 * Site Identity.
 */

$is_old_logo = get_theme_mod( 'ardent_site_image_logo' );

$wp_customize->add_setting( 'ardent_hide_sitetitle',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => $is_old_logo ? 1 : 0,
	)
);
$wp_customize->add_control(
	'ardent_hide_sitetitle',
	array(
		'label'   => esc_html__( 'Hide site title', 'ardent' ),
		'section' => 'title_tagline',
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting( 'ardent_hide_tagline',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => $is_old_logo ? 1 : 0,
	)
);
$wp_customize->add_control(
	'ardent_hide_tagline',
	array(
		'label'   => esc_html__( 'Hide site tagline', 'ardent' ),
		'section' => 'title_tagline',
		'type'    => 'checkbox',

	)
);

// // Retina Logo
// $wp_customize->add_setting( 'ardent_retina_logo',
// 	array(
// 		'sanitize_callback' => 'sanitize_text_field',
// 		'default'           => '',
// 		'transport'         => 'postMessage'
// 	)
// );
// $wp_customize->add_control(
// 	new WP_Customize_Image_Control(
// 		$wp_customize,
// 		'ardent_retina_logo',
// 		array(
// 			'label'   => esc_html__( 'Retina Logo', 'ardent' ),
// 			'section' => 'title_tagline',
// 		)
// 	)
// );


// // Logo Width
// $wp_customize->add_setting( 'ardent_logo_height',
// 	array(
// 		'sanitize_callback' => 'sanitize_text_field',
// 		'default'           => '',
// 		'transport'         => 'postMessage'
// 	)
// );
// $wp_customize->add_control(
// 	'ardent_logo_height',
// 	array(
// 		'label'   => esc_html__( 'Logo Height In Pixel', 'ardent' ),
// 		'section' => 'title_tagline',
// 	)

// );