<?php

/**
 * Load section template
 *
 * @since 1.2.1
 *
 * @param $template_names
 * @return string
 */
function ardent_customizer_load_template( $template_names ) {
	$located = '';

	$is_child = get_stylesheet_directory() != get_template_directory();
	foreach ( (array) $template_names as $template_name ) {
		if ( ! $template_name ) {
			continue;
		}

		if ( $is_child && file_exists( get_stylesheet_directory() . '/' . $template_name ) ) {  // Child them
			$located = get_stylesheet_directory() . '/' . $template_name;
			break;

		} elseif ( defined( 'ONEPRESS_PLUS_PATH' ) && file_exists( ONEPRESS_PLUS_PATH . $template_name ) ) { // Check part in the plugin
			$located = ONEPRESS_PLUS_PATH . $template_name;
			break;
		} elseif ( file_exists( get_template_directory() . '/' . $template_name ) ) { // current_theme
			$located = get_template_directory() . '/' . $template_name;
			break;
		}
	}

	return $located;
}

/**
 * Render customizer section
 *
 * @since 1.2.1
 *
 * @param $section_tpl
 * @param array       $section
 * @return string
 */
function ardent_get_customizer_section_content( $section_tpl, $section = array() ) {
	ob_start();
	$GLOBALS['ardent_is_selective_refresh'] = true;
	$file = ardent_customizer_load_template( $section_tpl );
	if ( $file ) {
		include $file;
	}
	$content = ob_get_clean();
	return trim( $content );
}


/**
 * Add customizer selective refresh
 *
 * @since 1.2.1
 *
 * @param $wp_customize
 */
function ardent_customizer_partials( $wp_customize ) {

	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}

	$selective_refresh_keys = array(
		// section features
		array(
			'id' => 'features',
			'selector' => '.section-features',
			'settings' => array(
				'ardent_features_boxes',
				'ardent_features_title',
				'ardent_features_subtitle',
				'ardent_features_desc',
				'ardent_features_layout',
			),
		),

		// section services
		array(
			'id' => 'services',
			'selector' => '.section-services',
			'settings' => array(
				'ardent_services',
				'ardent_services_title',
				'ardent_services_subtitle',
				'ardent_services_desc',
				'ardent_service_layout',
				'ardent_service_icon_size',
				'ardent_service_content_source',
			),
		),

		// section gallery
		'gallery' => array(
			'id' => 'gallery',
			'selector' => '.section-gallery',
			'settings' => array(
				'ardent_gallery_source',

				'ardent_gallery_title',
				'ardent_gallery_subtitle',
				'ardent_gallery_desc',
				'ardent_gallery_source_page',
				'ardent_gallery_layout',
				'ardent_gallery_display',
				'ardent_g_number',
				'ardent_g_row_height',
				'ardent_g_col',
				'ardent_g_readmore_link',
				'ardent_g_readmore_text',
			),
		),

		// section news
		array(
			'id' => 'news',
			'selector' => '.section-news',
			'settings' => array(
				'ardent_news_title',
				'ardent_news_subtitle',
				'ardent_news_desc',
				'ardent_news_number',
				'ardent_news_more_link',
				'ardent_news_more_text',

				'ardent_news_hide_meta', // @since  2.1.0
				'ardent_news_excerpt_length', // @since  2.1.0
				'ardent_news_more_page', // @since  2.1.0

				'ardent_news_cat',
				'ardent_news_orderby',
				'ardent_news_order',
			),
		),

		// section contact
		array(
			'id' => 'contact',
			'selector' => '.section-contact',
			'settings' => array(
				'ardent_contact_title',
				'ardent_contact_subtitle',
				'ardent_contact_desc',
				'ardent_contact_cf7',
				'ardent_contact_cf7_disable',
				'ardent_contact_text',
				'ardent_contact_address_title',
				'ardent_contact_address',
				'ardent_contact_phone',
				'ardent_contact_email',
				'ardent_contact_fax',
			),
		),

		// section counter
		array(
			'id' => 'counter',
			'selector' => '.section-counter',
			'settings' => array(
				'ardent_counter_boxes',
				'ardent_counter_title',
				'ardent_counter_subtitle',
				'ardent_counter_desc',
			),
		),
		// section videolightbox
		array(
			'id' => 'videolightbox',
			'selector' => '.section-videolightbox',
			'settings' => array(
				'ardent_videolightbox_title',
				'ardent_videolightbox_url',
			),
		),

		// Section about
		array(
			'id' => 'about',
			'selector' => '.section-about',
			'settings' => array(
				'ardent_about_boxes',
				'ardent_about_title',
				'ardent_about_subtitle',
				'ardent_about_desc',
				'ardent_about_content_source',
				'ardent_about_layout',
			),
		),

		// Section team
		array(
			'id' => 'team',
			'selector' => '.section-team',
			'settings' => array(
				'ardent_team_members',
				'ardent_team_title',
				'ardent_team_subtitle',
				'ardent_team_desc',
				'ardent_team_layout',
			),
		),
	);

	$selective_refresh_keys = apply_filters( 'ardent_customizer_partials_selective_refresh_keys', $selective_refresh_keys );

	foreach ( $selective_refresh_keys as $section ) {
		foreach ( $section['settings'] as $key ) {
			if ( $wp_customize->get_setting( $key ) ) {
				$wp_customize->get_setting( $key )->transport = 'postMessage';
			}
		}

		$wp_customize->selective_refresh->add_partial(
			'section-' . $section['id'],
			array(
				'selector' => $section['selector'],
				'settings' => $section['settings'],
				'render_callback' => 'ardent_selective_refresh_render_section_content',
			)
		);
	}

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'ardent_hide_sitetitle' )->transport = 'postMessage';
	$wp_customize->get_setting( 'ardent_hide_tagline' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial(
		'header_brand',
		array(
			'selector' => '.site-header .site-branding',
			'settings' => array( 'blogname', 'blogdescription', 'ardent_hide_sitetitle', 'ardent_hide_tagline' ),
			'render_callback' => 'ardent_site_logo',
		)
	);

	// Footer social heading
	$wp_customize->selective_refresh->add_partial(
		'ardent_social_footer_title',
		array(
			'selector' => '.footer-social .follow-heading',
			'settings' => array( 'ardent_social_footer_title' ),
			'render_callback' => 'ardent_selective_refresh_social_footer_title',
		)
	);
	// Footer social icons
	$wp_customize->selective_refresh->add_partial(
		'ardent_social_profiles',
		array(
			'selector' => '.footer-social .footer-social-icons',
			'settings' => array( 'ardent_social_profiles' ),
			'render_callback' => 'ardent_get_social_profiles',
		)
	);

	// Footer New letter heading
	$wp_customize->selective_refresh->add_partial(
		'ardent_newsletter_title',
		array(
			'selector' => '.footer-subscribe .follow-heading',
			'settings' => array( 'ardent_newsletter_title' ),
			'render_callback' => 'ardent_selective_refresh_newsletter_title',
		)
	);

	/**
	 * Footer Widgets
	 *
	 * @since 2.0.0
	 */
	$wp_customize->selective_refresh->add_partial(
		'ardent-footer-widgets',
		array(
			'selector' => '#footer-widgets',
			'settings' => array( 'footer_layout', 'footer_custom_1_columns', 'footer_custom_2_columns', 'footer_custom_3_columns', 'footer_custom_4_columns' ),
			'render_callback' => 'ardent_footer_widgets',
			'container_inclusive' => true,
		)
	);

	/**
	 * Header Position
	 *
	 * @since 2.0.0
	 */
	$wp_customize->selective_refresh->add_partial(
		'ardent-header-section',
		array(
			'selector' => '#header-section',
			'settings' => array( 'ardent_sticky_header_disable', 'ardent_header_transparent', 'ardent_header_width' ),
			'render_callback' => 'ardent_header',
			'container_inclusive' => true,
		)
	);

	/**
	 * Footer Connect
	 *
	 * @since 2.0.0
	 */
	$wp_customize->selective_refresh->add_partial(
		'ardent-footer-connect',
		array(
			'selector' => '.footer-connect',
			'settings' => array( 'ardent_newsletter_disable', 'ardent_social_disable' ),
			'render_callback' => 'ardent_footer_connect',
			'container_inclusive' => true,
		)
	);

	/**
	 * Selective Refresh style
	 *
	 * @since 2.0.0
	 */
	$css_settings = array(
		'ardent_logo_height',
		'ardent_transparent_logo_height',
		'ardent_tagline_text_color',
		'ardent_logo_text_color',

		'ardent_transparent_site_title_c',
		'ardent_transparent_tag_title_c',
		'ardent_logo_height',

		'ardent_hero_overlay_color',
		// 'ardent_hero_overlay_opacity',
		'ardent_primary_color',
		'ardent_secondary_color',
		'ardent_text_color',
		'ardent_menu_item_padding',

		'ardent_page_cover_align',
		'ardent_page_normal_align',
		'ardent_page_cover_color',
		'ardent_page_cover_overlay',
		'ardent_page_cover_pd_top',
		'ardent_page_cover_pd_bottom',

		'ardent_header_bg_color',
		'ardent_menu_color',
		'ardent_menu_hover_color',
		'ardent_menu_hover_bg_color',
		'ardent_menu_hover_bg_color',
		'ardent_menu_toggle_button_color',

		'ardent_footer_info_bg',
		'ardent_footer_bg',
		'ardent_footer_top_color',

		'ardent_footer_c_color',
		'ardent_footer_c_link_color',
		'ardent_footer_c_link_hover_color',

		'footer_widgets_color',
		'footer_widgets_bg_color',
		'footer_widgets_title_color',
		'footer_widgets_link_color',
		'footer_widgets_link_hover_color',

		'ardent_hcl1_r_color',
		'ardent_hcl1_r_bg_color',

		'ardent_sections_nav___color',
		'ardent_sections_nav___color2',
		'ardent_sections_nav___label_bg',
		'ardent_sections_nav___label_color',

	);

	/**
	 * @since 2.1.1
	 */
	$css_settings = apply_filters( 'ardent_selective_refresh_css_settings', $css_settings );

	foreach ( $css_settings as $index => $key ) {
		if ( $wp_customize->get_setting( $key ) ) {
			$wp_customize->get_setting( $key )->transport = 'postMessage';

		} else {
			unset( $css_settings[ $index ] );
		}
	}

	$wp_customize->selective_refresh->add_partial(
		'ardent-style-live-css',
		array(
			'selector' => '#ardent-style-inline-css',
			'settings' => $css_settings,
			'container_inclusive' => false,
			'render_callback' => 'ardent_custom_inline_style',
		)
	);

	// Retina logo
	$wp_customize->selective_refresh->add_partial(
		'ardent_site_logo',
		array(
			'selector' => '.site-branding',
			'settings' => array( 'ardent_retina_logo', 'ardent_transparent_logo', 'ardent_transparent_retina_logo' ),
			'render_callback' => 'ardent_site_logo',
		)
	);

}
add_action( 'customize_register', 'ardent_customizer_partials', 199 );



/**
 * Selective render content
 *
 * @param $partial
 * @param array   $container_context
 */
function ardent_selective_refresh_render_section_content( $partial, $container_context = array() ) {
	$tpl = 'section-parts/' . $partial->id . '.php';
	$GLOBALS['ardent_is_selective_refresh'] = true;
	$file = ardent_customizer_load_template( $tpl );
	if ( $file ) {
		include $file;
	}
}

function ardent_selective_refresh_social_footer_title() {
	return get_theme_mod( 'ardent_social_footer_title' );
}

function ardent_selective_refresh_newsletter_title() {
	return get_theme_mod( 'ardent_newsletter_title' );
}
