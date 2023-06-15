<?php
/*------------------------------------------------------------------------*/
/*  Section: Hero
/*------------------------------------------------------------------------*/

$wp_customize->add_panel( 'ardent_hero_panel' ,
	array(
		'priority'        => 130,
		'title'           => esc_html__( 'Section: Hero', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

// Hero settings
$wp_customize->add_section( 'ardent_hero_settings' ,
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Hero Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_hero_panel',
	)
);

// Show section
$wp_customize->add_setting( 'ardent_hero_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_hero_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Hide this section?', 'ardent'),
		'section'     => 'ardent_hero_settings',
		'description' => esc_html__('Check this box to hide this section.', 'ardent'),
	)
);
// Section ID
$wp_customize->add_setting( 'ardent_hero_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('hero', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_hero_id',
	array(
		'label' 		=> esc_html__('Section ID:', 'ardent'),
		'section' 		=> 'ardent_hero_settings',
		'description'   => esc_html__( 'The section ID should be English character, lowercase and no space.', 'ardent' )
	)
);

// Show hero full screen
$wp_customize->add_setting( 'ardent_hero_fullscreen',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_hero_fullscreen',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Make hero section full screen', 'ardent'),
		'section'     => 'ardent_hero_settings',
		'description' => esc_html__('Check this box to make hero section full screen.', 'ardent'),
	)
);

// Show hero full screen
$wp_customize->add_setting( 'ardent_hero_disable_preload',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_hero_disable_preload',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__('Disable Preload Icon', 'ardent'),
		'section'     => 'ardent_hero_settings',
	)
);

// Hero content padding top
$wp_customize->add_setting( 'ardent_hero_pdtop',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('10', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_hero_pdtop',
	array(
		'label'           => esc_html__('Padding Top:', 'ardent'),
		'section'         => 'ardent_hero_settings',
		'description'     => esc_html__( 'The hero content padding top in percent (%).', 'ardent' ),
		'active_callback' => 'ardent_hero_fullscreen_callback'
	)
);

// Hero content padding bottom
$wp_customize->add_setting( 'ardent_hero_pdbotom',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('10', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_hero_pdbotom',
	array(
		'label'           => esc_html__('Padding Bottom:', 'ardent'),
		'section'         => 'ardent_hero_settings',
		'description'     => esc_html__( 'The hero content padding bottom in percent (%).', 'ardent' ),
		'active_callback' => 'ardent_hero_fullscreen_callback'
	)
);


/* Hero options
----------------------------------------------------------------------*/

$wp_customize->add_setting(
	'ardent_hero_option_animation',
	array(
		'default'              => 'flipInX',
		'sanitize_callback'    => 'sanitize_text_field',
	)
);

/**
 * @see https://github.com/daneden/animate.css
 */

$animations_css = 'bounce flash pulse rubberBand shake headShake swing tada wobble jello bounceIn bounceInDown bounceInLeft bounceInRight bounceInUp bounceOut bounceOutDown bounceOutLeft bounceOutRight bounceOutUp fadeIn fadeInDown fadeInDownBig fadeInLeft fadeInLeftBig fadeInRight fadeInRightBig fadeInUp fadeInUpBig fadeOut fadeOutDown fadeOutDownBig fadeOutLeft fadeOutLeftBig fadeOutRight fadeOutRightBig fadeOutUp fadeOutUpBig flipInX flipInY flipOutX flipOutY lightSpeedIn lightSpeedOut rotateIn rotateInDownLeft rotateInDownRight rotateInUpLeft rotateInUpRight rotateOut rotateOutDownLeft rotateOutDownRight rotateOutUpLeft rotateOutUpRight hinge rollIn rollOut zoomIn zoomInDown zoomInLeft zoomInRight zoomInUp zoomOut zoomOutDown zoomOutLeft zoomOutRight zoomOutUp slideInDown slideInLeft slideInRight slideInUp slideOutDown slideOutLeft slideOutRight slideOutUp';

$animations_css = explode( ' ', $animations_css );
$animations = array();
foreach ( $animations_css as $v ) {
	$v =  trim( $v );
	if ( $v ){
		$animations[ $v ]= $v;
	}
}

$wp_customize->add_control(
	'ardent_hero_option_animation',
	array(
		'label'    => __( 'Text animation', 'ardent' ),
		'section'  => 'ardent_hero_settings',
		'type'     => 'select',
		'choices' => $animations,
	)
);


$wp_customize->add_setting(
	'ardent_hero_option_speed',
	array(
		'default'              => '5000',
		'sanitize_callback'    => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ardent_hero_option_speed',
	array(
		'label'    => __( 'Text animation speed', 'ardent' ),
		'description' => esc_html__( 'The delay between the changing of each phrase in milliseconds.', 'ardent' ),
		'section'  => 'ardent_hero_settings',
	)
);


$wp_customize->add_setting(
	'ardent_hero_slider_fade',
	array(
		'default'              => '750',
		'sanitize_callback'    => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ardent_hero_slider_fade',
	array(
		'label'    => __( 'Slider animation speed', 'ardent' ),
		'description' => esc_html__( 'This is the speed at which the image will fade in. Integers in milliseconds are accepted.', 'ardent' ),
		'section'  => 'ardent_hero_settings',
	)
);

$wp_customize->add_setting(
	'ardent_hero_slider_duration',
	array(
		'default'              => '5000',
		'sanitize_callback'    => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'ardent_hero_slider_duration',
	array(
		'label'    => __( 'Slider duration speed', 'ardent' ),
		'description' => esc_html__( 'The amount of time in between slides, expressed as the number of milliseconds.', 'ardent' ),
		'section'  => 'ardent_hero_settings',
	)
);



$wp_customize->add_section( 'ardent_hero_images' ,
	array(
		'priority'    => 6,
		'title'       => esc_html__( 'Hero Background Media', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_hero_panel',
	)
);

$wp_customize->add_setting(
	'ardent_hero_images',
	array(
		'sanitize_callback' => 'ardent_sanitize_repeatable_data_field',
		'transport' => 'refresh', // refresh or postMessage
		'default' => json_encode( array(
			array(
				'image'=> array(
					'url' => get_template_directory_uri().'/assets/images/hero5.jpg',
					'id' => ''
				)
			)
		) )
	) );

$wp_customize->add_control(
	new Ardent_Customize_Repeatable_Control(
		$wp_customize,
		'ardent_hero_images',
		array(
			'label'     => esc_html__('Background Images', 'ardent'),
			'description'   => '',
			'priority'     => 40,
			'section'       => 'ardent_hero_images',
			'title_format'  => esc_html__( 'Background', 'ardent'), // [live_title]
			'max_item'      => 2, // Maximum item can add

			'fields'    => array(
				'image' => array(
					'title' => esc_html__('Background Image', 'ardent'),
					'type'  =>'media',
					'default' => array(
						'url' => get_template_directory_uri().'/assets/images/hero5.jpg',
						'id' => ''
					)
				),

			),

		)
	)
);

// Overlay color
$wp_customize->add_setting( 'ardent_hero_overlay_color',
	array(
		'sanitize_callback' => 'ardent_sanitize_color_alpha',
		'default'           => 'rgba(0,0,0,.3)',
		//'transport' => 'refresh', // refresh or postMessage
	)
);
$wp_customize->add_control( new ARDENT_Alpha_Color_Control(
		$wp_customize,
		'ardent_hero_overlay_color',
		array(
			'label' 		=> esc_html__('Background Overlay Color', 'ardent'),
			'section' 		=> 'ardent_hero_images',
			'priority'      => 130,
		)
	)
);


// Parallax
$wp_customize->add_setting( 'ardent_hero_parallax',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => 0,
		'transport' => 'refresh', // refresh or postMessage
	)
);
$wp_customize->add_control(
	'ardent_hero_parallax',
	array(
		'label' 		=> esc_html__('Enable parallax effect (apply for first BG image only)', 'ardent'),
		'section' 		=> 'ardent_hero_images',
		'type' 		   => 'checkbox',
		'priority'      => 50,
		'description' => '',
	)
);

// Background Video
$wp_customize->add_setting( 'ardent_hero_videobackground_upsell',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
	)
);
$wp_customize->add_control( new ARDENT_Misc_Control( $wp_customize, 'ardent_hero_videobackground_upsell',
	array(
		'section'     => 'ardent_hero_images',
		'type'        => 'custom_message',
		'description' => wp_kses_post( __( 'Want to add <strong>background video</strong> for hero section? Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/ardent-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=ardent_customizer#get-started">ARDENT Plus</a> version.', 'ardent' ) ),
		'priority'    => 131,
	)
));



$wp_customize->add_section( 'ardent_hero_content_layout1' ,
	array(
		'priority'    => 9,
		'title'       => esc_html__( 'Hero Content Layout', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_hero_panel',

	)
);

// Hero Layout
$wp_customize->add_setting( 'ardent_hero_layout',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '1',
	)
);
$wp_customize->add_control( 'ardent_hero_layout',
	array(
		'label' 		=> esc_html__('Display Layout', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'description'   => '',
		'type'          => 'select',
		'choices'       => array(
			'1' => esc_html__('Layout 1', 'ardent' ),
			'2' => esc_html__('Layout 2', 'ardent' ),
		),
	)
);
// For Hero layout ------------------------

// Large Text
$wp_customize->add_setting( 'ardent_hcl1_largetext',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'mod' 				=> 'html',
		'default'           => wp_kses_post( __( 'We are <span class="js-rotating">ARDENT | One Page | Responsive | Perfection</span>', 'ardent') ),
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_hcl1_largetext',
	array(
		'label' 		=> esc_html__('Large Text', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'description'   => esc_html__('Text Rotating Guide: Put your rotate texts separate by "|" into <span class="js-rotating">...</span>, go to Customizer -> Theme Options -> Section: Hero -> Hero Settings to control rotate animation.', 'ardent'),
	)
));


$wp_customize->add_setting( 'ardent_hcl1_r_color',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => null,
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_hcl1_r_color',
		array(
			'label' 		=> esc_html__('Rotating Text Color', 'ardent'),
			'section' 		=> 'ardent_hero_content_layout1'
		)
	)
);
$wp_customize->add_setting( 'ardent_hcl1_r_bg_color',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => null,
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'ardent_hcl1_r_bg_color',
		array(
			'label' 		=> esc_html__('Rotating Text Background', 'ardent'),
			'section' 		=> 'ardent_hero_content_layout1'
		)
	)
);

// Small Text
$wp_customize->add_setting( 'ardent_hcl1_smalltext',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'			=> wp_kses_post('Morbi tempus porta nunc <strong>pharetra quisque</strong> ligula imperdiet posuere<br> vitae felis proin sagittis leo ac tellus blandit sollicitudin quisque vitae placerat.', 'ardent'),
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_hcl1_smalltext',
	array(
		'label' 		=> esc_html__('Small Text', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'mod' 				=> 'html',
		'description'   => esc_html__('You can use text rotate slider in this textarea too.', 'ardent'),
	)
));

// Button #1 Text
$wp_customize->add_setting( 'ardent_hcl1_btn1_text',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('About Us', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_hcl1_btn1_text',
	array(
		'label' 		=> esc_html__('Button #1 Text', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1'
	)
);

// Button #1 Link
$wp_customize->add_setting( 'ardent_hcl1_btn1_link',
	array(
		'sanitize_callback' => 'esc_url',
		'default'           => esc_url( home_url( '/' )).esc_html__('#about', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_hcl1_btn1_link',
	array(
		'label' 		=> esc_html__('Button #1 Link', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1'
	)
);
// Button #1 Style
$wp_customize->add_setting( 'ardent_hcl1_btn1_style',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => 'btn-theme-primary',
	)
);
$wp_customize->add_control( 'ardent_hcl1_btn1_style',
	array(
		'label' 		=> esc_html__('Button #1 style', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'type'          => 'select',
		'choices' => array(
			'btn-theme-primary' => esc_html__('Button Primary', 'ardent'),
			'btn-secondary-outline' => esc_html__('Button Secondary', 'ardent'),
			'btn-default' => esc_html__('Button', 'ardent'),
			'btn-primary' => esc_html__('Primary', 'ardent'),
			'btn-success' => esc_html__('Success', 'ardent'),
			'btn-info' => esc_html__('Info', 'ardent'),
			'btn-warning' => esc_html__('Warning', 'ardent'),
			'btn-danger' => esc_html__('Danger', 'ardent'),
		)
	)
);
$wp_customize->add_setting( 'ardent_hcl1_btn1_target',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => null,
	)
);
$wp_customize->add_control( 'ardent_hcl1_btn1_target',
	array(
		'label' 		=> __('Open Button #1 In New Window', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'type'          => 'checkbox',
	)
);

// Button #2 Text
$wp_customize->add_setting( 'ardent_hcl1_btn2_text',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__('Get Started', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_hcl1_btn2_text',
	array(
		'label' 		=> esc_html__('Button #2 Text', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1'
	)
);

// Button #2 Link
$wp_customize->add_setting( 'ardent_hcl1_btn2_link',
	array(
		'sanitize_callback' => 'esc_url',
		'default'           => esc_url( home_url( '/' )).esc_html__('#contact', 'ardent'),
	)
);
$wp_customize->add_control( 'ardent_hcl1_btn2_link',
	array(
		'label' 		=> esc_html__('Button #2 Link', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1'
	)
);

// Button #2 Style
$wp_customize->add_setting( 'ardent_hcl1_btn2_style',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => 'btn-secondary-outline',
	)
);
$wp_customize->add_control( 'ardent_hcl1_btn2_style',
	array(
		'label' 		=> esc_html__('Button #2 style', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'type'          => 'select',
		'choices' => array(
			'btn-theme-primary' => esc_html__('Button Primary', 'ardent'),
			'btn-secondary-outline' => esc_html__('Button Secondary', 'ardent'),
			'btn-default' => esc_html__('Button', 'ardent'),
			'btn-primary' => esc_html__('Primary', 'ardent'),
			'btn-success' => esc_html__('Success', 'ardent'),
			'btn-info' => esc_html__('Info', 'ardent'),
			'btn-warning' => esc_html__('Warning', 'ardent'),
			'btn-danger' => esc_html__('Danger', 'ardent'),
		)
	)
);
$wp_customize->add_setting( 'ardent_hcl1_btn2_target',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => null,
	)
);
$wp_customize->add_control( 'ardent_hcl1_btn2_target',
	array(
		'label' 		=> __('Open Button #2 In New Window', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'type'          => 'checkbox',
	)
);


/* Layout 2 ---- */

// Layout 22 content text
$wp_customize->add_setting( 'ardent_hcl2_content',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'mod' 				=> 'html',
		'default'           =>  wp_kses_post( '<h1>Business Website'."\n".'Made Simple.</h1>'."\n".'We provide creative solutions to clients around the world,'."\n".'creating things that get attention and meaningful.'."\n\n".'<a class="btn btn-secondary-outline btn-lg" href="#">Get Started</a>' ),
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_hcl2_content',
	array(
		'label' 		=> esc_html__('Content Text', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'description'   => '',
	)
));

// Layout 2 image
$wp_customize->add_setting( 'ardent_hcl2_image',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'mod' 				=> 'html',
		'default'           =>  get_template_directory_uri().'/assets/images/ardent_responsive.png',
	)
);
$wp_customize->add_control( new WP_Customize_Image_Control(
	$wp_customize,
	'ardent_hcl2_image',
	array(
		'label' 		=> esc_html__('Image', 'ardent'),
		'section' 		=> 'ardent_hero_content_layout1',
		'description'   => '',
	)
));


// END For Hero layout ------------------------