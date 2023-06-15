<?php
/* Navigation Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'ardent_nav',
	array(
		'priority'    => null,
		'title'       => esc_html__( 'Navigation', 'ardent' ),
		'description' => '',
		'panel'       => 'ardent_options',
	)
);
$wp_customize->add_setting( 'ardent_menu_item_padding',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
		'transport'         => 'postMessage'
	)
);
$wp_customize->add_control( 'ardent_menu_item_padding',
	array(
		'label'       => esc_html__( 'Menu Item Padding', 'ardent' ),
		'description' => esc_html__( 'Padding left and right for Navigation items (pixels).', 'ardent' ),
		'section'     => 'ardent_nav',
	)
);