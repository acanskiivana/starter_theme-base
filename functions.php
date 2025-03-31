<?php
/**
 * starter_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package starter_theme
 */

if ( ! defined( 'starter_theme_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'starter_theme_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function starter_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on starter_theme, use a find and replace
		* to change 'starter_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'starter_theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'starter_theme' ),
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
			'starter_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'starter_theme_setup' );


// Register custom post type Services
function rp_custom_post_type() {
	register_post_type( 'rp_services', 
		array(
			'labels' => array(
				'name' =>__('Services', 'textdomain'),
				'singular_name' => __('Services', 'textdomain'),
			),
			'public' => true, 
			'has_archive' => true,
			'show_in_rest' => true, 
			'supports' => array('title', 'editor', 'thumbnail', 'excerpt'), 
			'rewrite' => array( 'slug' => 'dijelatnosti'),
		)
	);
}

add_action('init', 'rp_custom_post_type');


add_theme_support('post-thumbnails');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starter_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'starter_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'starter_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starter_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'starter_theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'starter_theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'starter_theme_widgets_init' );


function enqueue_jquery_for_acf_blocks() {
    wp_enqueue_script('jquery'); // Ensure jQuery is loaded
}
add_action('enqueue_block_assets', 'enqueue_jquery_for_acf_blocks');


function my_custom_image_sizes() {
	add_image_size( 'extra-large', 1440, 900, true ); // For large screens
	add_image_size( 'large', 1024, 640, true );       // For desktops
	add_image_size( 'medium', 768, 480, true );       // For tablets
	add_image_size( 'small', 480, 300, true );        // For mobile devices
}
add_action( 'after_setup_theme', 'my_custom_image_sizes' );


/**
 * Enqueue scripts and styles.
 */
function starter_theme_scripts() {


	wp_enqueue_style( 'starter_theme-main-style', get_stylesheet_uri(), array(), starter_theme_VERSION );

	wp_enqueue_style( 'starter_theme-style', get_template_directory_uri() . '/css/style.css', array(), starter_theme_VERSION );

	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', array(), starter_theme_VERSION );

	wp_enqueue_script( 'starter_theme-navigation', get_template_directory_uri() . '/js/navigation.js',array('jquery'), starter_theme_VERSION, true );

	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), starter_theme_VERSION, true );


	if (has_block('acf/hero-slider')) {

        wp_enqueue_script(
            'acf-hero-slider-block',
            get_template_directory_uri() . '/blocks/hero-slider/hero-slider.js',
            array('jquery'),
            null,
            true
        );
    }

	if (has_block('acf/infinite-slider')) {

        wp_enqueue_script(
            'acf-infinite-slider-block',
            get_template_directory_uri() . '/blocks/infinite-slider/infinite-slider.js',
            array('jquery'), 
            null,
            true
        );
    }

	if (has_block('acf/single-slider')) {

        wp_enqueue_script(
            'acf-single-slider-block',
            get_template_directory_uri() . '/blocks/single-slider/single-slider.js',
            array('jquery'), 
            null,
            true
        );
    }

	
	if (has_block('acf/counter')) {

        wp_enqueue_script(
            'acf-counter-block',
            get_template_directory_uri() . '/blocks/counter/counter.js',
            array('jquery'), 
            null,
            true
        );
    }

	
	if (has_block('acf/testimonials')) {

        wp_enqueue_script(
            'acf-testimonials-block',
            get_template_directory_uri() . '/blocks/testimonials/testimonials.js',
            array('jquery'), 
            null,
            true
        );
    }


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'starter_theme_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Acf / Advance Custom Theme.
 */
require get_template_directory() . '/inc/acf-blocks.php';