<?php
/**
 * Enqueue stuff in frontend
 * For enqueueing scripts needed in the admin UI or login, see inc/admin.php
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access not allowed' );}

add_action( 'wp_enqueue_scripts', 'minerva_enqueue_assets' );
/**
 * Enqueue scripts and styles for the jupiter-child theme.
 */
function minerva_enqueue_assets() {

	// Use Google's hosted jQuery 1.x in the hopes the client already has it.
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js', '1.12.2', true );

	// Fix Jupiter's incorrect Vimeo CDN domain, which doesn't support SSL
	wp_deregister_script( 'api-vimeo' );
	wp_register_script( 'api-vimeo', '//f.vimeocdn.com/js/froogaloop2.min.js', array(), false, false );

	// Register minified scripts and styles
	wp_register_script( 'minerva-plugins', get_stylesheet_directory_uri() . '/js/plugins.min.js', array( 'jquery' ), false, true );
	wp_register_script( 'minerva-main', get_stylesheet_directory_uri() . '/js/main.min.js', array( 'jquery', 'minerva-plugins' ), false, true );
	wp_register_style( 'minerva-core', get_stylesheet_directory_uri() . '/css/core.min.css', array(), '1.0', 'all' );

	// During development, avoid minified versions and run livereoad
	if ( defined( 'ENVIRONMENT' ) && 'dev' === ENVIRONMENT ) {
		wp_deregister_script( 'minerva-plugins' );
		wp_deregister_script( 'minerva-main' );
		wp_deregister_style( 'minerva-core' );
		wp_register_script( 'minerva-plugins', get_stylesheet_directory_uri() . '/js/plugins.js', array( 'jquery' ), false, true );
		wp_register_script( 'minerva-main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery', 'minerva-plugins' ), false, true );
		wp_register_style( 'minerva-core', get_stylesheet_directory_uri() . '/css/core.css', array(), '1.0', 'all' );
		// could also be "screen"
		if ( defined( 'LIVERELOAD_PORT' ) ) {
			wp_enqueue_script( 'livereload', '//' . $_SERVER['SERVER_NAME'] . ':' . LIVERELOAD_PORT . '/livereload.js', array( 'main' ), false, true );
		}
	}

	if ( ! is_admin() ) {
		// Grab the global registered styles & scripts to verify the files exist & have content before enqueueing
		global $wp_scripts;
		global $wp_styles;

		// Verify the minerva-main script exists and has content before enqueueing
		// May not for some template deploys.
		$script_path = str_replace( get_stylesheet_directory_uri(), get_stylesheet_directory(), $wp_scripts->registered['minerva-main']->src );
		if ( is_file( $script_path ) && filesize( $script_path ) > 0 ) {
			wp_enqueue_script( 'minerva-main' );
		}

		// Verify the minerva-core style exists and has content before enqueueing
		// May not for some template deploys.
		$style_path = str_replace( get_stylesheet_directory_uri(), get_stylesheet_directory(), $wp_styles->registered['minerva-core']->src );
		if ( is_file( $style_path ) && filesize( $style_path ) > 0 ) {
			wp_enqueue_style( 'minerva-core' );
		}

		// get the AJAX endpoint URL & liveReload
		wp_localize_script(
			'minerva-main', 'theme_obj', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}//end if
}
