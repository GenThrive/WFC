<?php
/**
 * Handing adding browsersync script to frontend and backend Gutenberg admin editor
 *
 * @package Crate
 */

namespace CShop\Crate;

if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access not allowed' ); }


/**
 * Main enqueue handler for front-end of the site
 */
function add_browsersync_script() {

	if ( !defined( 'SCRIPT_DEBUG' ) && ! SCRIPT_DEBUG )
		return;

	$is_block_editor = FALSE;
	if ( is_admin() ) {
		global $current_screen;
		$current_screen = get_current_screen();
		$is_block_editor = ( method_exists($current_screen, 'is_block_editor') && $current_screen->is_block_editor() );
	}

	if ( ( $is_block_editor || ! is_admin() ) && defined( 'BROWSERSYNC_PORT' ) ) {
?>
	<script id="__bs_script__">//<![CDATA[
			document.write("<script async src='https://HOST:<?php echo BROWSERSYNC_PORT; ?>/browser-sync/browser-sync-client.js?v=2.26.3'><\/script>".replace("HOST", location.hostname));
	//]]></script>
<?php
	}
}
add_action( 'browsersync_script', __NAMESPACE__ . '\add_browsersync_script' );

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\add_browsersync_script' );

function browsersync_script() {
	do_action( 'browsersync_script' );
}