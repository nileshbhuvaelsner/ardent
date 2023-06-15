<?php
/**
 *  Section: News
 */
$wp_customize->add_panel( 'ardent_news',
	array(
		'priority'        => 260,
		'title'           => esc_html__( 'Section: News', 'ardent' ),
		'description'     => '',
		'active_callback' => 'ardent_showon_frontpage'
	)
);

$wp_customize->add_section( 'ardent_news_settings',
	array(
		'priority'    => 3,
		'title'       => esc_html__( 'Section Settings', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_news',
	)
);

// Show Content
$wp_customize->add_setting( 'ardent_news_disable',
	array(
		'sanitize_callback' => 'ardent_sanitize_checkbox',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_news_disable',
	array(
		'type'        => 'checkbox',
		'label'       => esc_html__( 'Hide this section?', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => esc_html__( 'Check this box to hide this section.', 'ardent' ),
	)
);

// Section ID
$wp_customize->add_setting( 'ardent_news_id',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => esc_html__( 'news', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_news_id',
	array(
		'label'       => esc_html__( 'Section ID:', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => esc_html__( 'The section ID should be English character, lowercase and no space.', 'ardent' )
	)
);

// Title
$wp_customize->add_setting( 'ardent_news_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Latest News', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_news_title',
	array(
		'label'       => esc_html__( 'Section Title', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => '',
	)
);

// Sub Title
$wp_customize->add_setting( 'ardent_news_subtitle',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Section subtitle', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_news_subtitle',
	array(
		'label'       => esc_html__( 'Section Subtitle', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => '',
	)
);

// Description
$wp_customize->add_setting( 'ardent_news_desc',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
		'default'           => '',
	)
);
$wp_customize->add_control( new ARDENT_Editor_Custom_Control(
	$wp_customize,
	'ardent_news_desc',
	array(
		'label'       => esc_html__( 'Section Description', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => '',
	)
) );

// hr
$wp_customize->add_setting( 'ardent_news_settings_hr',
	array(
		'sanitize_callback' => 'ardent_sanitize_text',
	)
);
$wp_customize->add_control( new ARDENT_Misc_Control( $wp_customize, 'ardent_news_settings_hr',
	array(
		'section' => 'ardent_news_settings',
		'type'    => 'hr'
	)
) );

/**
 * @since 2.1.0
 */
$wp_customize->add_setting( 'ardent_news_hide_meta',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => false,
	)
);
$wp_customize->add_control( 'ardent_news_hide_meta',
	array(
		'label'       => esc_html__( 'Hide post categories', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'type' => 'checkbox',
		'description' => '',
	)
);

/**
 * @since 2.1.0
 */
$wp_customize->add_setting( 'ardent_news_excerpt_type',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'custom',
	)
);
$wp_customize->add_control( 'ardent_news_excerpt_type',
	array(
		'label'       => esc_html__( 'Custom excerpt length', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'type' => 'select',
		'choices' => array(
			'custom' => __( 'Custom', 'ardent' ),
			'excerpt' => __( 'Use excerpt metabox', 'ardent' ),
			'more_tag' => __( 'Strip excerpt by more tag', 'ardent' ),
			'content' => __( 'Full content', 'ardent' ),
		),
		'description' => '',
	)
);

/**
 * @since 2.1.0
 */
$wp_customize->add_setting( 'ardent_news_excerpt_length',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
	)
);
$wp_customize->add_control( 'ardent_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Custom excerpt length', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => '',
	)
);


// Number of post to show.
$wp_customize->add_setting( 'ardent_news_number',
	array(
		'sanitize_callback' => 'ardent_sanitize_number',
		'default'           => '3',
	)
);
$wp_customize->add_control( 'ardent_news_number',
	array(
		'label'       => esc_html__( 'Number of post to show', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => '',
	)
);

$wp_customize->add_setting( 'ardent_news_cat',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 0,
	)
);

$wp_customize->add_control( new ARDENT_Category_Control(
	$wp_customize,
	'ardent_news_cat',
	array(
		'label'       => esc_html__( 'Category to show', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => '',
	)
) );

$wp_customize->add_setting( 'ardent_news_orderby',
	array(
		'sanitize_callback' => 'ardent_sanitize_select',
		'default'           => 0,
	)
);

$wp_customize->add_control(
	'ardent_news_orderby',
	array(
		'label'   => esc_html__( 'Order By', 'ardent' ),
		'section' => 'ardent_news_settings',
		'type'    => 'select',
		'choices' => array(
			'default'       => esc_html__( 'Default', 'ardent' ),
			'id'            => esc_html__( 'ID', 'ardent' ),
			'author'        => esc_html__( 'Author', 'ardent' ),
			'title'         => esc_html__( 'Title', 'ardent' ),
			'date'          => esc_html__( 'Date', 'ardent' ),
			'comment_count' => esc_html__( 'Comment Count', 'ardent' ),
			'menu_order'    => esc_html__( 'Order by Page Order', 'ardent' ),
			'rand'          => esc_html__( 'Random order', 'ardent' ),
		)
	)
);

$wp_customize->add_setting( 'ardent_news_order',
	array(
		'sanitize_callback' => 'ardent_sanitize_select',
		'default'           => 'desc',
	)
);

$wp_customize->add_control(
	'ardent_news_order',
	array(
		'label'   => esc_html__( 'Order', 'ardent' ),
		'section' => 'ardent_news_settings',
		'type'    => 'select',
		'choices' => array(
			'desc' => esc_html__( 'Descending', 'ardent' ),
			'asc'  => esc_html__( 'Ascending', 'ardent' ),
		)
	)
);

// Blog Button

$wp_customize->add_setting( 'ardent_news_more_page',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
	)
);

$wp_customize->add_control( new ARDENT_Pages_Control(
	$wp_customize,
	'ardent_news_more_page',
	array(
		'label'       => esc_html__( 'More News Page', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'show_option_none' =>  esc_html__( 'Custom Link', 'ardent' ),
		'description' => esc_html__( 'It should be your blog page link.', 'ardent' )
	)
) );


$wp_customize->add_setting( 'ardent_news_more_link',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
	)
);

$wp_customize->add_control(
	'ardent_news_more_link',
	array(
		'label'       => esc_html__( 'Custom More News link', 'ardent' ),
		'section'     => 'ardent_news_settings'
	)
);


$wp_customize->add_setting( 'ardent_news_more_text',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Read Our Blog', 'ardent' ),
	)
);
$wp_customize->add_control( 'ardent_news_more_text',
	array(
		'label'       => esc_html__( 'More News Button Text', 'ardent' ),
		'section'     => 'ardent_news_settings',
		'description' => '',
	)
);

ardent_add_upsell_for_section( $wp_customize, 'ardent_news_settings' );
