<?php

/**
 * algert-starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package algert-starter
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('algert_starter_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function algert_starter_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on algert-starter, use a find and replace
		 * to change 'algert-starter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('algert-starter', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Primary menu', 'algert-starter'),
				'footer-menu' => esc_html__('Footer menu', 'algert-starter'),
				'login-menu' => esc_html__('Login menu', 'algert-starter'),
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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'algert_starter_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
	}
endif;
add_action('after_setup_theme', 'algert_starter_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function algert_starter_content_width()
{
	$GLOBALS['content_width'] = apply_filters('algert_starter_content_width', 640);
}
add_action('after_setup_theme', 'algert_starter_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function algert_starter_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'algert-starter'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'algert-starter'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__('Footer widget', 'algert-starter'),
			'id'            => 'footer-widget',
			'description'   => esc_html__('Add footer widgets here.', 'algert-starter'),
			'before_widget' => '<div class="col-6 col-lg-3 col-md-3"><div class="mb-3 single-footer-item lg-mb-0">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
add_action('widgets_init', 'algert_starter_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function algert_starter_scripts()
{
	// Styles
	wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css');
	wp_enqueue_style('algert-starter-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0');
	wp_enqueue_style('algert-starter-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
	wp_enqueue_style('algert-starter-style', get_stylesheet_uri(), array(), _S_VERSION);

	// Scripts
	wp_enqueue_script('algert-starter-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', ['jquery'], '1.0.0');
	wp_enqueue_script('algert-starter-custom', get_template_directory_uri() . '/assets/js/custom.js', ['jquery'], '1.0.0');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'algert_starter_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Create Logo Setting and Upload Control
 */
function theme_custom_settings($wp_customize)
{
	$wp_customize->add_setting('theme_light_logo');
	$wp_customize->add_setting('theme_dark_logo');
	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		'theme_light_logo',
		array(
			'label' => 'Upload Light Logo',
			'section' => 'title_tagline',
			'settings' => 'theme_light_logo',
		)
	));

	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		'theme_dark_logo',
		array(
			'label' => 'Upload Dark Logo',
			'section' => 'title_tagline',
			'settings' => 'theme_dark_logo',
		)
	));
}
add_action('customize_register', 'theme_custom_settings');

/*
 * Register Our Customizer Stuff Here
 */
function algert_register_theme_customizer($wp_customize)
{
	// Create custom panel.
	$wp_customize->add_panel('text_blocks', array(
		'priority'       => 500,
		'theme_supports' => '',
		'title'          => __('Footer Settings', 'genesischild'),
	));

	// Add section
	$wp_customize->add_section('custom_footer_text', array(
		'title'    => __('Change Footer Text', 'algert-starter'),
		'panel'    => 'text_blocks',
		'priority' => 10
	));

	// Add setting
	$wp_customize->add_setting('footer_text_block', array(
		'sanitize_callback' => 'sanitize_text'
	));

	// Add control
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'custom_footer_text',
			array(
				'label'    => __('Footer Text', 'algert-starter'),
				'section'  => 'custom_footer_text',
				'settings' => 'footer_text_block',
				'type'     => 'textarea'
			)
		)
	);

	// Sanitize text
	function sanitize_text($text)
	{
		return sanitize_text_field($text);
	}
}
add_action('customize_register', 'algert_register_theme_customizer');
