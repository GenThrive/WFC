<?php
/**
 * Crate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Crate
 */

/**
 * New for 2017: Namespacing! No need to prefix all function names with crate_ anymore!
 */
namespace CShop\Crate;

define( 'CRATE_VERSION', '4.3.0' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'crate', get_template_directory() . '/languages' );

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

	// Example code for gallery image
	// add_image_size( 'gallery', 400, 400, true );
	// Example for retina version for ResponsifyWP and others
	// add_image_size( 'gallery@2x', 800, 800, true );
	add_image_size( 'post-grid', 350, 350, true );
	add_image_size( 'hero', 956, 370, true );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'crate' ),
			'utility' => esc_html__( 'Utility', 'crate' ),
			'footer'  => esc_html__( 'Footer', 'crate' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Editor color palette.
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/
	 */
	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => __( 'White', 'crate' ),
				'slug'  => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => __( 'Black', 'crate' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => __( 'Alt Black', 'crate' ),
				'slug'  => 'alt-black',
				'color' => '#2C2D2E',
			),
			array(
				'name'  => __( 'Dark Gray', 'crate' ),
				'slug'  => 'dark-gray',
				'color' => '#2f2f2f',
			),
			array(
				'name'  => __( 'Gray', 'crate' ),
				'slug'  => 'gray',
				'color' => '#49505c',
			),
			array(
				'name'  => __( 'Light', 'crate' ),
				'slug'  => 'light',
				'color' => '#eee',
			),
			array(
				'name'  => __( 'Lighter Blue', 'crate' ),
				'slug'  => 'lighter-blue',
				'color' => '#44c4f5',
			),
			array(
				'name'  => __( 'Light Blue', 'crate' ),
				'slug'  => 'light-blue',
				'color' => '#0d8ac5',
			),
			array(
				'name'  => __( 'Blue', 'crate' ),
				'slug'  => 'blue',
				'color' => '#003f69',
			),
			array(
				'name'  => __( 'Dark Blue', 'crate' ),
				'slug'  => 'dark-blue',
				'color' => '#07518c',
			),
			array(
				'name'  => __( 'Teal', 'crate' ),
				'slug'  => 'teal',
				'color' => '#24bcb6',
			),
			array(
				'name'  => __( 'Blue Green', 'crate' ),
				'slug'  => 'blue-green',
				'color' => '#779da1',
			),
		)
	);

	/**
	 * Force users to ONLY use palette colors
	 */
	add_theme_support( 'disable-custom-colors' );

	add_theme_support(
		'amp',
		array(
			'nav_menu_toggle'   => array(
				'nav_container_id'           => 'masthead',
				'nav_container_toggle_class' => 'toggled-on',
				'menu_button_id'             => 'site-navigation-toggle',
				'menu_button_toggle_class'   => 'toggled-on',
			),
		)
	);
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'crate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'crate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', __NAMESPACE__ . '\widgets_init' );

/**
 * Determine if a request is coming from a REST endpoint
 *
 * @return boolean True if a REST endpoint was requested, false otherwise
 */
function is_rest_url() {
	$is_rest = false;
	if ( function_exists( 'rest_url' ) && ! empty( $_SERVER['REQUEST_URI'] ) ) {
		$rest_url_base = get_rest_url( get_current_blog_id(), '/' );
		$rest_path = trim( wp_parse_url( $rest_url_base, PHP_URL_PATH ), '/' );
		$request_path = trim( $_SERVER['REQUEST_URI'], '/' );
		$is_rest = ( strpos( $request_path, $rest_path ) === 0 );
	}
	return $is_rest;
}

if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) :
	/**
	 * Add the widget ID as a class to the widget area.
	 *
	 * Makes it easier to identify exactly which widget area a widget is appearing in.
	 *
	 * @return array Widget sidebar params with HTML comments surrounding the widget code to help identify where this widget is coming from.
	 */
	function dynamic_sidebar( $sidebar_params ) {

		$sidebar_params['0']['class'] = empty( $sidebar_params['0']['class'] ) ? $sidebar_params['0']['id'] : $sidebar_params['0']['class'] . ' ' . $sidebar_params['0']['id'];

		$sidebar_params['0']['before_widget'] = '<!--Widget-Area:id:' . esc_attr( $sidebar_params['0']['id'] ) . ';name:' . esc_attr( $sidebar_params['0']['name'] ) . '-->' . $sidebar_params['0']['before_widget'];

		return $sidebar_params;
	}

	add_filter( 'dynamic_sidebar_params',  __NAMESPACE__ . '\dynamic_sidebar', 10 );
endif;

/**
 * Include other functions
 */
foreach ( glob( __DIR__ . '/inc/*.{php,inc}', GLOB_BRACE ) as $filename ) {
	include $filename;
}

/**
 * Include blocks
 */
foreach ( glob( __DIR__ . '/blocks/*.{php,inc}', GLOB_BRACE ) as $filename ) {
	include $filename;
}
