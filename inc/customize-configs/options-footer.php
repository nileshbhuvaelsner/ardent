<?php
/* Footer top Social Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'arden_footer_top',
	array(
		'title'       => esc_html__( 'Footer Socials', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);

// Disable Social
$wp_customize->add_setting( 'ardent_social_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '1',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'ardent_social_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Hide Footer Social?', 'ardent' ),
		'section'     => 'arden_footer_top',
		'description' => esc_html__( 'Check this box to hide footer social section.', 'ardent' )
	)
);

$wp_customize->add_setting( 'ardent_social_footer_guide',
	array(
		'sanitize_callback' => 'ardent_sanitize_text'
	)
);
$wp_customize->add_control( new ARDENT_Misc_Control( $wp_customize, 'ardent_social_footer_guide',
	array(
		'section'     => 'arden_footer_top',
		'type'        => 'custom_message',
		'description' => esc_html__( 'The social profiles specified below will be displayed in the footer of your site.', 'ardent' )
	)
) );

// Footer Social Title
$wp_customize->add_setting( 'ardent_social_footer_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Keep Updated', 'ardent' ),
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'ardent_social_footer_title',
	array(
		'label'       => esc_html__( 'Social Footer Title', 'ardent' ),
		'section'     => 'arden_footer_top',
		'description' => ''
	)
);

// Socials
$wp_customize->add_setting(
	'ardent_social_profiles',
	array(
		//'default' => '',
		'sanitize_callback' => 'ardent_sanitize_repeatable_data_field',
		'transport'         => 'postMessage', // refresh or postMessage
	) );

$wp_customize->add_control(
	new Ardent_Customize_Repeatable_Control(
		$wp_customize,
		'ardent_social_profiles',
		array(
			'label'         => esc_html__( 'Socials', 'ardent' ),
			'description'   => '',
			'section'       => 'arden_footer_top',
			'live_title_id' => 'network', // apply for unput text and textarea only
			'title_format'  => esc_html__( '[live_title]', 'ardent' ), // [live_title]
			'max_item'      => 5, // Maximum item can add
			'limited_msg'   => wp_kses_post( __( 'Upgrade to <a target="_blank" href="https://www.famethemes.com/plugins/ardent-plus/?utm_source=theme_customizer&utm_medium=text_link&utm_campaign=ardent_customizer#get-started">ARDENT Plus</a> to be able to add more items and unlock other premium features!', 'ardent' ) ),
			'fields'        => array(
				'network' => array(
					'title' => esc_html__( 'Social network', 'ardent' ),
					'type'  => 'text',
				),
				'icon'    => array(
					'title' => esc_html__( 'Icon', 'ardent' ),
					'type'  => 'icon',
				),
				'link'    => array(
					'title' => esc_html__( 'URL', 'ardent' ),
					'type'  => 'text',
				),
			),

		)
	)
);


/* Newsletter Settings
----------------------------------------------------------------------*/

// Disable Newsletter
$wp_customize->add_setting( 'ardent_newsletter_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '1',
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'ardent_newsletter_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Hide Footer Newsletter?', 'ardent' ),
		'section'     => 'arden_footer_top',
		'description' => esc_html__( 'Check this box to hide footer newsletter form.', 'ardent' )
	)
);

// Mailchimp Form Title
$wp_customize->add_setting( 'ardent_newsletter_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Join our Newsletter', 'ardent' ),
		'transport'         => 'postMessage', // refresh or postMessage
	)
);
$wp_customize->add_control( 'ardent_newsletter_title',
	array(
		'label'       => esc_html__( 'Newsletter Form Title', 'ardent' ),
		'section'     => 'arden_footer_top',
		'description' => ''
	)
);

// Mailchimp action url
$wp_customize->add_setting( 'ardent_newsletter_mailchimp',
	array(
		'sanitize_callback' => 'esc_url',
		'default'           => '',
		'transport'         => 'postMessage', // refresh or postMessage
	)
);
$wp_customize->add_control( 'ardent_newsletter_mailchimp',
	array(
		'label'       => esc_html__( 'MailChimp Action URL', 'ardent' ),
		'section'     => 'arden_footer_top',
		'description' => __( 'The newsletter form use MailChimp, please follow <a target="_blank" href="https://mailchimp.com/help/host-your-own-signup-forms/">this guide</a> to know how to get MailChimp Action URL. Example <i>//famethemes.us8.list-manage.com/subscribe/post?u=521c400d049a59a4b9c0550c2&amp;id=83187e0006</i>', 'ardent' )
	)
);

// Footer BG Color
$wp_customize->add_setting( 'ardent_footer_bg', array(
	'sanitize_callback'    => 'sanitize_hex_color_no_hash',
	'sanitize_js_callback' => 'maybe_hash_hex_color',
	'default'              => '',
	'transport'            => 'postMessage'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ardent_footer_bg',
	array(
		'label'       => esc_html__( 'Background', 'ardent' ),
		'section'     => 'arden_footer_top',
		'description' => '',
	)
) );


$wp_customize->add_setting( 'ardent_footer_top_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '',
	'transport'         => 'postMessage'
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ardent_footer_top_color',
	array(
		'label'       => esc_html__( 'Text Color', 'ardent' ),
		'section'     => 'arden_footer_top',
		'description' => '',
	)
) );


/* Footer Widgets Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'ardent_footer',
	array(
		'priority'    => null,
		'title'       => esc_html__( 'Footer Widgets', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);

$wp_customize->add_setting( 'footer_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
		'transport'         => 'postMessage',
	)
);

$wp_customize->add_control( 'footer_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Layout', 'ardent' ),
		'section'     => 'ardent_footer',
		'default'     => '0',
		'description' => esc_html__( 'Number footer columns to display.', 'ardent' ),
		'choices'     => array(
			'4' => 4,
			'3' => 3,
			'2' => 2,
			'1' => 1,
			'0' => esc_html__( 'Disable footer widgets', 'ardent' ),
		)
	)
);

for ( $i = 1; $i <= 4; $i ++ ) {
	$df = 12;
	if ( $i > 1 ) {
		$_n = 12 / $i;
		$df = array();
		for ( $j = 0; $j < $i; $j ++ ) {
			$df[ $j ] = $_n;
		}
		$df = join( '+', $df );
	}
	$wp_customize->add_setting( 'footer_custom_' . $i . '_columns',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => $df,
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control( 'footer_custom_' . $i . '_columns',
		array(
			'label'       => $i == 1 ? __( 'Custom footer 1 column width', 'ardent' ) : sprintf( __( 'Custom footer %s columns width', 'ardent' ), $i ),
			'section'     => 'ardent_footer',
			'description' => esc_html__( 'Enter int numbers and sum of them must smaller or equal 12, separated by "+"', 'ardent' ),
		)
	);
}

// ardent_sanitize_color_alpha
$wp_customize->add_setting( 'footer_widgets_color',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'footer_widgets_color',
		array(
			'label'   => esc_html__( 'Text Color', 'ardent' ),
			'section' => 'ardent_footer',
		)
	)
);

$wp_customize->add_setting( 'footer_widgets_bg_color',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'footer_widgets_bg_color',
		array(
			'label'   => esc_html__( 'Background Color', 'ardent' ),
			'section' => 'ardent_footer',
		)
	)
);

// Footer Heading color
$wp_customize->add_setting( 'footer_widgets_title_color',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'footer_widgets_title_color',
		array(
			'label'   => esc_html__( 'Widget Title Color', 'ardent' ),
			'section' => 'ardent_footer',
		)
	)
);


$wp_customize->add_setting( 'footer_widgets_link_color',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'footer_widgets_link_color',
		array(
			'label'   => esc_html__( 'Link Color', 'ardent' ),
			'section' => 'ardent_footer',
		)
	)
);

$wp_customize->add_setting( 'footer_widgets_link_hover_color',
	array(
		'sanitize_callback' => 'sanitize_hex_color',
		'default'           => '',
	)
);
$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'footer_widgets_link_hover_color',
		array(
			'label'   => esc_html__( 'Link Hover Color', 'ardent' ),
			'section' => 'ardent_footer',
		)
	)
);


/* Footer Copyright Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'ardent_footer_copyright',
	array(
		'priority'    => null,
		'title'       => esc_html__( 'Footer Copyright', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);

// Footer Widgets Color
$wp_customize->add_setting( 'ardent_footer_info_bg', array(
	'sanitize_callback'    => 'sanitize_hex_color',
	'sanitize_js_callback' => 'maybe_hash_hex_color',
	'default'              => '',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ardent_footer_info_bg',
	array(
		'label'       => esc_html__( 'Background', 'ardent' ),
		'section'     => 'ardent_footer_copyright',
		'description' => '',
	)
) );

// Footer Widgets Color
$wp_customize->add_setting( 'ardent_footer_c_color', array(
	'sanitize_callback'    => 'sanitize_hex_color',
	'sanitize_js_callback' => 'maybe_hash_hex_color',
	'default'              => '',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ardent_footer_c_color',
	array(
		'label'       => esc_html__( 'Text Color', 'ardent' ),
		'section'     => 'ardent_footer_copyright',
		'description' => '',
	)
) );

$wp_customize->add_setting( 'ardent_footer_c_link_color', array(
	'sanitize_callback'    => 'sanitize_hex_color',
	'sanitize_js_callback' => 'maybe_hash_hex_color',
	'default'              => '',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ardent_footer_c_link_color',
	array(
		'label'       => esc_html__( 'Link Color', 'ardent' ),
		'section'     => 'ardent_footer_copyright',
		'description' => '',
	)
) );

$wp_customize->add_setting( 'ardent_footer_c_link_hover_color', array(
	'sanitize_callback'    => 'sanitize_hex_color',
	'sanitize_js_callback' => 'maybe_hash_hex_color',
	'default'              => '',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ardent_footer_c_link_hover_color',
	array(
		'label'       => esc_html__( 'Link Hover Color', 'ardent' ),
		'section'     => 'ardent_footer_copyright',
		'description' => '',
	)
) );