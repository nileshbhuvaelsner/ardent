<?php

/**
 * ARDENT functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ARDENT
 */

if (!function_exists('ardent_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ardent_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ARDENT, use a find and replace
		 * to change 'ardent' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('ardent', get_template_directory() . '/languages');

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/**
		 * Excerpt for page
		 */
		add_post_type_support('page', 'excerpt');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');
		// add_image_size('ardent-blog-small', 300, 150, true);
		// add_image_size('ardent-small', 480, 300, true);
		// add_image_size('ardent-medium', 640, 400, true);

		/*
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus(
			array(
				'desktop_menu' 	=> esc_html__('Desktop Menu', 'ardent'),
				'mobile_menu' 	=> esc_html__('Mobile Menu', 'ardent'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * WooCommerce support.
		 */
		add_theme_support('woocommerce');

		/**
		 * Add theme Support custom logo
		 *
		 * @since WP 4.5
		 * @sin 1.2.1
		 */

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 36,
				'width'       => 160,
				'flex-height' => true,
				'flex-width'  => true,
				// 'header-text' => array( 'site-title',  'site-description' ), //
			)
		);

		$recommend_plugins =  array(
			'wpforms-lite'             => array(
				'name'            => esc_html__('Contact Form by WPForms', 'ardent'),
				'active_filename' => 'wpforms-lite/wpforms.php',
			),
			'famethemes-demo-importer' => array(
				'name'            => esc_html__('Famethemes Demo Importer', 'ardent'),
				'active_filename' => 'famethemes-demo-importer/famethemes-demo-importer.php',
			),
		);


		// Check if WooCommerce activated.
		if (function_exists('WC')) {

			if (!defined('PMCS_URL')) {
				$recommend_plugins['currency-switcher-for-woocommerce'] = array(
					'name'            => esc_html__('Currency Switcher for WooCommerce', 'ardent'),
					'active_filename' => 'currency-switcher-for-woocommerce/pmcs.php',
				);
			}

			if (!defined('PBE_URL')) {
				$recommend_plugins['bulk-edit-for-woocommerce'] = array(
					'name'            => esc_html__('Bulk Edit for WooCommerce', 'ardent'),
					'active_filename' => 'bulk-edit-for-woocommerce/bulk-edit.php',
				);
			}
		}

		// Recommend plugins.
		add_theme_support(
			'recommend-plugins',
			$recommend_plugins
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for WooCommerce.
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');

		/**
		 * Add support for Gutenberg.
		 *
		 * @link https://wordpress.org/gutenberg/handbook/reference/theme-support/
		 */
		add_theme_support('editor-styles');
		add_theme_support('align-wide');
		
		add_theme_support( 'wp-block-styles' );

		/*
		 * This theme styles the visual editor to resemble the theme style.
		 */
		add_editor_style(array('editor-style.css', ardent_fonts_url()));

		if (get_theme_mod('ardent_gallery_disable')) {
			/**
			 * Dequeue Google Fonts loaded by Elementor.
			 * @since  2.3.1
			 */
			add_filter('elementor/frontend/print_google_fonts', '__return_false');
		}
	}
endif;
add_action('after_setup_theme', 'ardent_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ardent_content_width()
{
	/**
	 * Support dynamic content width
	 *
	 * @since 2.1.1
	 */
	$width = absint(get_theme_mod('single_layout_content_width'));
	if ($width <= 0) {
		$width = 800;
	}
	$GLOBALS['content_width'] = apply_filters('ardent_content_width', $width);
}
add_action('after_setup_theme', 'ardent_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ardent_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'ardent'),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	if (class_exists('WooCommerce')) {
		register_sidebar(
			array(
				'name'          => esc_html__('WooCommerce Sidebar', 'ardent'),
				'id'            => 'sidebar-shop',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
	for ($i = 1; $i <= 4; $i++) {
		register_sidebar(
			array(
				'name'          => sprintf(__('Footer %s', 'ardent'), $i),
				'id'            => 'footer-' . $i,
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action('widgets_init', 'ardent_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function ardent_scripts()
{

	$theme   = wp_get_theme('ardent');
	$version = $theme->get('Version');
	$version = time();
	$min_ext  = defined('WP_DEBUG') && WP_DEBUG ? '' : '.min';

	if (!get_theme_mod('ardent_disable_g_font')) {
		$google_font_url = ardent_fonts_url();
		if ($google_font_url) {
			wp_enqueue_style('ardent-fonts', ardent_fonts_url(), array(), $version);
		}
	}

	//wp_enqueue_style('ardent-animate', get_template_directory_uri() . '/assets/css/animate.min.css', array(), $version);
	//wp_enqueue_style('ardent-fa', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.7.0');
	//wp_enqueue_style('ardent-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, $version);
	wp_enqueue_style('ardent-style', get_template_directory_uri() . '/assets/css/style.css');

	$custom_css = ardent_custom_inline_style();
	wp_add_inline_style('ardent-style', $custom_css);

	$deps = array('jquery');

	// Animation from settings.
	$ardent_js_settings = array(
		'ardent_disable_animation'     => get_theme_mod('ardent_animation_disable'),
		'ardent_disable_sticky_header' => get_theme_mod('ardent_sticky_header_disable'),
		'ardent_vertical_align_menu'   => get_theme_mod('ardent_vertical_align_menu'),
		'hero_animation'                 => get_theme_mod('ardent_hero_option_animation', 'flipInX'),
		'hero_speed'                     => intval(get_theme_mod('ardent_hero_option_speed', 5000)),
		'hero_fade'                      => intval(get_theme_mod('ardent_hero_slider_fade', 750)),
		'submenu_width'                  => intval(get_theme_mod('ardent_submenu_width', 0)),
		'hero_duration'                  => intval(get_theme_mod('ardent_hero_slider_duration', 5000)),
		'hero_disable_preload'           => get_theme_mod('ardent_hero_disable_preload', false) ? true : false,
		'disabled_google_font'           => get_theme_mod('ardent_disable_g_font', false) ? true : false,
		'is_home'                        => '',
		'gallery_enable'                 => '',
		'is_rtl'                         => is_rtl(),
	);

	// Load gallery scripts.
	$galley_disable = get_theme_mod('ardent_gallery_disable') == 1 ? true : false;
	$is_shop        = false;
	if (function_exists('is_woocommerce')) {
		if (is_woocommerce()) {
			$is_shop = true;
		}
	}

	// Don't load scripts for woocommerce because it don't need.
	if (!$is_shop) {
		if (!$galley_disable || is_customize_preview()) {
			$ardent_js_settings['gallery_enable'] = 1;
			$display                                = get_theme_mod('ardent_gallery_display', 'grid');
			if (!is_customize_preview()) {
				switch ($display) {
					case 'masonry':
						$deps[] = 'ardent-gallery-masonry';
						wp_register_script('ardent-gallery-masonry', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), $version, true);
						break;
					case 'justified':
						$deps[] = 'ardent-gallery-justified';
						wp_register_script('ardent-gallery-justified', get_template_directory_uri() . '/assets/js/jquery.justifiedGallery.min.js', array(), $version, true);
						break;
					case 'slider':
					case 'carousel':
						$deps[] = 'ardent-gallery-carousel';
						wp_register_script('ardent-gallery-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), $version, true);
						break;
					default:
						break;
				}
			} else {
				$deps[] = 'ardent-gallery-masonry';
				$deps[] = 'ardent-gallery-justified';
				$deps[] = 'ardent-gallery-carousel';

				wp_register_script('ardent-gallery-masonry', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array(), $version, true);
				wp_register_script('ardent-gallery-justified', get_template_directory_uri() . '/assets/js/jquery.justifiedGallery.min.js', array(), $version, true);
				wp_register_script('ardent-gallery-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), $version, true);
			}
		}
		wp_enqueue_style('ardent-gallery-lightgallery', get_template_directory_uri() . '/assets/css/lightgallery.css');
	}

	wp_enqueue_script('ardent-theme', get_template_directory_uri() . '/assets/js/theme-all' . $min_ext . '.js', $deps, $version, true);
	wp_enqueue_script('ardent-theme', get_template_directory_uri() . '/script.js', $deps, $version, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (is_front_page() && is_page_template('template-frontpage.php')) {
		if (get_theme_mod('ardent_header_scroll_logo')) {
			$ardent_js_settings['is_home'] = 1;
		}
	}
	
	$ardent_js_settings['parallax_speed'] = 0.5;
	$ardent_js_settings =  apply_filters( 'ardent_js_settings', $ardent_js_settings );
	wp_localize_script('ardent-theme', 'ardent_js_settings', $ardent_js_settings);
}
add_action('wp_enqueue_scripts', 'ardent_scripts');


if (!function_exists('ardent_block_all_js_google_fonts')) {
	/**
	 * Disable all google added by js.
	 * 
	 * @since 2.3.1
	 *
	 * @return void
	 */
	function ardent_block_all_js_google_fonts()
	{

		if (!get_theme_mod('ardent_disable_g_font')) {
			return;
		}
?>
		<script>
			var head = document.getElementsByTagName('head')[0];
			// Save the original method
			var insertBefore = head.insertBefore;
			// Replace it!
			head.insertBefore = function(newElement, referenceElement) {
				if (newElement.href && newElement.href.indexOf('https://fonts.googleapis.com/css?family=') === 0) {
					return;
				}
				if (newElement.href && newElement.href.indexOf('https://fonts.gstatic.com/') === 0) {
					return;
				}
				insertBefore.call(head, newElement, referenceElement);
			};
		</script>
<?php
	}
}
add_action('wp_head', 'ardent_block_all_js_google_fonts', 2);




if (!function_exists('ardent_fonts_url')) :
	/**
	 * Register default Google fonts
	 */
	function ardent_fonts_url()
	{
		$fonts_url = '';

		/*
		* Translators: If there are characters in your language that are not
		* supported by Open Sans, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$open_sans = _x('on', 'Open Sans font: on or off', 'ardent');

		/*
		* Translators: If there are characters in your language that are not
		* supported by Raleway, translate this to 'off'. Do not translate
		* into your own language.
		*/
		$raleway = _x('on', 'Raleway font: on or off', 'ardent');

		if ('off' !== $raleway || 'off' !== $open_sans) {
			$font_families = array();

			if ('off' !== $raleway) {
				$font_families[] = 'Raleway:400,500,600,700,300,100,800,900';
			}

			if ('off' !== $open_sans) {
				$font_families[] = 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic';
			}

			$query_args = array(
				'family' => urlencode(implode('|', $font_families)),
				'subset' => urlencode('latin,latin-ext'),
				'display' => 'swap'
			);

			$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
		}

		return esc_url_raw($fonts_url);
	}
endif;



/**
 * Glabel ARDENT loop properties
 *
 * @since 2.1.0
 */
global $ardent_loop_props;
$ardent_loop_props = array();

/**
 * Set ardent loop property.
 *
 * @since 2.1.0
 *
 * @param string $prop
 * @param string $value
 */
function ardent_loop_set_prop($prop, $value)
{
	global $ardent_loop_props;
	$ardent_loop_props[$prop] = $value;
}


/**
 * Get ardent loop property
 *
 * @since 2.1.0
 *
 * @param $prop
 * @param bool $default
 *
 * @return bool|mixed
 */
function ardent_loop_get_prop($prop, $default = false)
{
	global $ardent_loop_props;
	if (isset($ardent_loop_props[$prop])) {
		return apply_filters('ardent_loop_get_prop', $ardent_loop_props[$prop], $prop);
	}

	return apply_filters('ardent_loop_get_prop', $default, $prop);
}

/**
 * Remove ardent loop property
 *
 * @since 2.1.0
 *
 * @param $prop
 */
function ardent_loop_remove_prop($prop)
{
	global $ardent_loop_props;
	if (isset($ardent_loop_props[$prop])) {
		unset($ardent_loop_props[$prop]);
	}
}

/**
 * Trim the excerpt with custom length
 *
 * @since 2.1.0
 *
 * @see wp_trim_excerpt
 * @param $text
 * @param null $excerpt_length
 * @return string
 */
function ardent_trim_excerpt($text, $excerpt_length = null)
{
	$text = strip_shortcodes($text);
	/** This filter is documented in wp-includes/post-template.php */
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);

	if (!$excerpt_length) {
		/**
		 * Filters the number of words in an excerpt.
		 *
		 * @since 2.7.0
		 *
		 * @param int $number The number of words. Default 55.
		 */
		$excerpt_length = apply_filters('excerpt_length', 55);
	}

	/**
	 * Filters the string in the "more" link displayed after a trimmed excerpt.
	 *
	 * @since 2.9.0
	 *
	 * @param string $more_string The string shown within the more link.
	 */
	$excerpt_more = apply_filters('excerpt_more', ' ' . '&hellip;');

	return wp_trim_words($text, $excerpt_length, $excerpt_more);
}

/**
 * Display the excerpt
 *
 * @param string $type
 * @param bool   $length
 */
function ardent_the_excerpt($type = false, $length = false)
{

	$type   = ardent_loop_get_prop('excerpt_type', 'excerpt');
	$length = ardent_loop_get_prop('excerpt_length', false);

	switch ($type) {
		case 'excerpt':
			the_excerpt();
			break;
		case 'more_tag':
			the_content('', true);
			break;
		case 'content':
			the_content('', false);
			break;
		default:
			$text = '';
			global $post;
			if ($post) {
				if ($post->post_excerpt) {
					$text = $post->post_excerpt;
				} else {
					$text = $post->post_content;
				}
			}
			$excerpt = ardent_trim_excerpt($text, $length);
			if ($excerpt) {
				// WPCS: XSS OK.
				echo apply_filters('the_excerpt', $excerpt);
			} else {
				the_excerpt();
			}
	}
}

/**
 * Config class
 *
 * @since 2.1.1
 */
require get_template_directory() . '/inc/class-config.php';

/**
 * Load Sanitize
 */
require get_template_directory() . '/inc/sanitize.php';

/**
 * Custom Metabox  for this theme.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Dots Navigation class
 *
 * @since 2.1.0
 */
require get_template_directory() . '/inc/class-sections-navigation.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add theme info page
 */
require get_template_directory() . '/inc/admin/dashboard.php';

/**
 * Editor Style
 *
 * @since 2.2.1
 */
require get_template_directory() . '/inc/admin/class-editor.php';
