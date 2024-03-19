<?php

/**
 * Return the URL for the Site Options page.
 */
function crate_get_options_page_url() {
	return get_admin_url( 'admin.php?page=site-options' );
}


//-----------------------------------------------------------------------------
// "Display Options" tab
//-----------------------------------------------------------------------------

/**
 * Add a query var that signals an intentional request for the error page.
 *
 * This lets us distinguish between requests for the error page made by end
 * users (by attempting to visit the error page's URL), which should be
 * defeated, and requests for the error page made by the template_redirect hook
 * below, which should be allowed to go through.
 */
function crate_error_page_query_vars( $vars ) {
	$vars[] = 'is_custom_404';
	return $vars;
}
add_filter( 'query_vars', 'crate_error_page_query_vars' );

/**
 * Make the custom error page (if any) accessible in the 404.php template.
 *
 * If a custom error page has been set on the Site Options page, then for
 * requests that result in 404 errors, replace the global $wp_query with a
 * query for the error page, in order to make its content accessible in the
 * 404.php template.
 * Then set $wp_query->is_404 so that the 404.php template still gets used --
 * otherwise we'd end up using page.php or singular.php. Setting $is_404 also
 * ensures that the is_404() conditional tag behaves as expected.
 */
function crate_error_page_template_redirect() {

	// If the current query actually found something, then it's none of our
	// business. Bail.
	if ( ! is_404() ) {
		return;
	}

	// Has an error page been specified?
	if ( $error_page_id = crate_get_error_page_id() ) {

		// Replace the global $wp_query.
		global $wp_query;
		$wp_query = new WP_Query( array(
			'page_id' => $error_page_id,
			'is_custom_404' => true,
		) );

		// Our new $wp_query has (presumably) found a page, so it'll have is_404
		// set to false -- but we want WP to use the 404 template, not the single
		// page template.
		// WP_Query::set_404() will set is_404 to true, while also resetting all
		// the other query flags, including `is_singular` and `is_page`. If we just
		// set $wp_query->is_404 to true by hand, then these flags would still be
		// true as well, and I can't in good conscience unleash such an abomination
		// into the world.
		$wp_query->set_404();

		// Now, calls to have_posts() and the_post(), etc. from within the 404.php
		// template will be made to a single-page query for the custom error page,
		// so 404.php can be written using the Loop, just like any other page
		// template.
	}
}
add_action( 'template_redirect', 'crate_error_page_template_redirect' );

/**
 * Add a condition to all queries' WHERE clauses that will exclude the custom
 * error page -- except intentional requests for the error page, as indicated
 * by the is_custom_404 query var.
 */
function crate_error_page_posts_where( $where, $query ) {

	// Don't mess with admin queries -- users need to be able to find and edit
	// the error page in wp-admin!
	if ( is_admin() ) {
		return $where;
	}

	// Don't mess with custom error requests.
	if ( $query->get( 'is_custom_404' ) ) {
		return $where;
	}

	// Don't mess with ACF field queries either, or we could end up in an
	// infinite loop.
	if ( in_array( 'acf-field', (array) $query->get( 'post_type' ) ) ) {
		return $where;
	}
	if ( in_array( 'acf-field-group', (array) $query->get( 'post_type' ) ) ) {
		return $where;
	}

	global $wpdb;

	// If an error page has been set, explicitly exclude that page ID.
	if ( $error_page_id = crate_get_error_page_id() ) {
		$where .= $wpdb->prepare( " AND ({$wpdb->posts}.ID != %d)", $error_page_id );
	}

	return $where;
}
add_action( 'posts_where', 'crate_error_page_posts_where', 10, 2 );

/**
 * Display a message when viewing the custom error page in wp-admin, indicating
 * that it has been set as the error page.
 */
function crate_error_page_admin_notices() {

	// If an error page has been set...
	if ( $error_page_id = crate_get_error_page_id() ) {

		// Get info about the current admin screen.
		$screen = get_current_screen();

		// Is the user editing a page?
		if ( 'page' === $screen->id ) {

			// Is the page being edited the custom error page?
			if ( isset( $_GET['post'] ) && $error_page_id == $_GET['post'] ) {

				// Output a message.
				?>
				<div class="notice notice-info">
					<p><?php esc_html_e( 'This page is set to be used as the error page for this site. It will not be directly accessible; instead, its content will be displayed when a user tries to access a page or file that doesn\'t exist.', 'crate' ); ?></p>
					<p><?php printf(
						esc_html__( 'Visit the %s to change this setting.', 'crate' ),
						'<a href="' . esc_url( crate_get_options_page_url() ) . '">' . esc_html__( 'Site Options page', 'crate' ) . '</a>'
					); ?></p>
				</div>
				<?php
			}
		}
	}
}
add_action( 'admin_notices', 'crate_error_page_admin_notices' );

/**
 * Get the ID for the custom error page, if any.
 */
function crate_get_error_page_id() {
	return get_field( 'page_for_404', 'option' );
}

/**
 * Return the copyright text as specified on the Site Options page.
 */
function crate_get_copyright_text() {
	$copyright_text = get_field( 'copyright_text', 'option' );
	// Replace [year] with the year.
	$copyright_text = str_replace( '[year]', date( 'Y' ), $copyright_text );
	return $copyright_text;
}

/**
 * Output the copyright text as specified on the Site Options page.
 */
function crate_copyright_text() {
	// Escape output (allowing basic markp) & prettify dashes, apostrophes, etc.
	echo wp_kses_post( wptexturize( crate_get_copyright_text() ) );
}
