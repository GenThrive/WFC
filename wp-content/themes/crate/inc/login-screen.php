<?php
/**
 * Login screen customizations
 *
 * @package Produce
 */

/**
 * Change logo URL.
 */
function crate_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'crate_logo_url' );


/**
 * Change logo title.
 */
function crate_logo_url_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'crate_logo_url_title' );


/**
 * Restyle the login screen logo.
 */
function crate_login_logo() {
	?>
	<style type="text/css">
		.login #login h1 a {
			background-image: url('/wp-content/themes/crate/images/logo.png');
			background-size: contain !important;
			width: 320px;
			height: 55px;
		}

		body.login {
			background: #F7F5EF;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'crate_login_logo' );
