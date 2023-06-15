<?php

/**
 * Class Ardent_Config
 * @since 2.1.1
 */
class Ardent_Config {

	static private $key = 'ardent_sections_settings';

	static function is_section_active( $section_key ){
		$data = get_option( self::$key );
		$force_active = false;
		if ( ! is_array( $data ) || empty( $data ) ) {
			$force_active = true;
			$data = array();
		}
		if ( $force_active ) {
			$active_value = 1;
		} else {
			$active_value = isset( $data[ $section_key ] ) ? $data[ $section_key ] : 1;
		}

		return $active_value;
	}

	static function save_settings( $submitted_data ){

		$sections = Ardent_Config::get_sections();

		if ( is_array( $submitted_data ) ) {
			$data = array();
			foreach ( $sections as $k => $s ) {
				$data[ $k ] = isset( $submitted_data['section_'.$k] ) && $submitted_data['section_'.$k] == 1 ? 1 : false;
			}

			update_option( self::$key, $data );
		}

	}

	static function get_settings( ){
		return get_option( self::$key );
	}

	static function get_plus_sections(){
		$plugin_sections = array(

			'slider' => array(
				'label' => __( 'Section: Slider', 'ardent' ),
				'title' => __( 'Slider', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),

			'clients' => array(
				'label' => __( 'Section: Clients', 'ardent' ),
				'title' => __( 'Our Clients', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'cta' => array(
				'label' => __( 'Section: Call to Action', 'ardent' ),
				'title' => __( '', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'map' => array(
				'label' => __( 'Section: Map', 'ardent' ),
				'title' => __( 'Map', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'pricing' => array(
				'label' => __( 'Section: Pricing', 'ardent' ),
				'title' => __( 'Pricing Table', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'projects' => array(
				'label' => __( 'Section: Projects', 'ardent' ),
				'title' => __( 'Highlight Projects', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'testimonials' => array(
				'label' => __( 'Section: Testimonials', 'ardent' ),
				'title' => __( 'Testimonials', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
		);

		return $plugin_sections;
	}

	/**
	 * Get sections
	 *
	 * @return array
	 */
	static function get_sections(){

		$sorted_sections = apply_filters( 'ardent_frontpage_sections_order', array(
			'features', 'about', 'services', 'videolightbox', 'gallery', 'counter', 'team',  'news', 'contact'
		) );

		$sections_config = array(
			'hero' => array(
				'label' => __( 'Section: Hero', 'ardent' ),
				'title' => __( 'Home', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'about' => array(
				'label' => __( 'Section: About', 'ardent' ),
				'title' => __( 'About Us', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'contact' => array(
				'label' =>  __( 'Section: Contact', 'ardent' ),
				'title' => __( 'Get in touch', 'ardent' ),
				'default' => false,
				'inverse' => false,

			),
			'counter' => array(
				'label' => __( 'Section: Counter', 'ardent' ),
				'title' => __( 'Our Numbers', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'features' => array(
				'label' => __( 'Section: Features', 'ardent' ),
				'title' => __( 'Features', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'gallery' => array(
				'label' => __( 'Section: Gallery', 'ardent' ),
				'title' => __( 'Gallery', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'news' => array(
				'label' => __( 'Section: News', 'ardent' ),
				'title' => __( 'Latest News', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'services' => array(
				'label' => __( 'Section: Services', 'ardent' ),
				'title' => __( 'Our Services', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'team' => array(
				'label' => __( 'Section: Team', 'ardent' ),
				'title' => __( 'Our Team', 'ardent' ),
				'default' => false,
				'inverse' => false,
			),
			'videolightbox' => array(
				'label' => __( 'Section: Video Lightbox', 'ardent' ),
				'title' => '',
				'default' => false,
				'inverse' => false,
			),
		);

		$new = array(
			'hero' => $sections_config['hero']
		);

		foreach ( $sorted_sections as $id ) {
			if ( isset( $sections_config[ $id ] ) ) {
				$new[ $id ] = $sections_config[ $id ];
			}
		}

		// Filter to add more custom sections here
		return apply_filters( 'ardent_get_sections', $new );

	}
}