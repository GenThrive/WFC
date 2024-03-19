<?php

/**
 * This should only be run on the command line
 */
if ( ! defined( 'WP_CLI' ) || ! WP_CLI ) return;

$old_postmeta = array(
	'_cornerstone_settings',
	'_cornerstone_data',
	'_cornerstone_excerpt',
	'_cornerstone_version'
);

$my_posts = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 999
));

while ( $my_posts->have_posts() ) :

	global $post, $wpdb;

	$my_posts->the_post();

	$content = $post->post_content;

	/**
	 * Perform our regex transforms
	 */

	//H5s
	$pattern = '/(\[cs_text class="p\-featured"\]<p>)(.*)(<\/p>\[\/cs_text\])/U';
	$replace = '<h5 class="p-featured">$2</h5>';
	$content = preg_replace( $pattern, $replace, $content );

	//Retain paragraph classes
	$pattern = '/\[cs_text class="(.*)"\]<p>/U';
	$replace = '<p class="$1">';
	$content = preg_replace( $pattern, $replace, $content );

	// Try to find a first x_image. If so, get the URL and try to make it the featured image
	$pattern = '/\[x_image (.*) src="\/wp-content\/uploads\/(.*) /U';
	$matches = preg_match( $pattern, $content, $matches );
	if ( ! empty( $matches[2] ) ) {
		$filename = $matches[2];
		$image_info = $wpdb->get_row( $wpdb->prepare( "SELECT pm.post_id, p.post_type FROM wpdb_postmeta pm JOIN wpdb_posts p ON p.ID = pm.post_id WHERE pm.meta_value = %s", $filename ) );
		if ( 'attachment' == $image_info->post_type ) {
			set_post_thumbnail( $post->ID, $image_info->post_id );
		}
	}

	// Muck with x_image shortcodes
	$pattern ='/\[x_image .*\]/U';
	$result = preg_match_all( $pattern, $content, $matches );
	if ( count( $matches ) ) {

		foreach( $matches[0] as $match ) {

			$old_image_string = $match;

			// Deconstruct the image string
			$img_attributes = preg_match_all( '/ \S+="\S*"/U', $old_image_string, $attribute_matches );

			$image_details = array();
			$replacement_string = '';

			if ( count($attribute_matches ) ) {
				// Build an array of attribute->value pairs
				foreach( $attribute_matches[0] as $match ) {
					list( $k, $v ) = explode( '=', $match );
					$image_details[ trim( $k ) ] = trim( $v, " \"" );
				}

				if ( isset( $image_details['src'] ) ) {
					$replacement_string = sprintf('<img src="%s" alt="%s" style="%s">', $image_details['src'], $image_details['alt'], $image_details['style'] );
					if ( $image_details['link'] !== 'false' && isset($image_details['href'] ) ) {
						$replacement_string = sprintf( '<a href="%s">%s</a>', $image_details['href'], $replacement_string );
					}

				}

				$content = str_replace( $old_image_string, $replacement_string, $content );
			}
		}
	}

	//Replace all the CS shortcodes
	$pattern = '/\[\/?cs_.*\]/U';
	$replace = '';
	$content = preg_replace( $pattern, $replace, $content );

	//Replace all the x_blah shortcodes
	$pattern = '/\[\/?x_.*\]/U';
	$replace = '';
	$content = preg_replace( $pattern, $replace, $content );

	//Replace leading nbsp
	$pattern = '/^$nbsp;/';
	$replace = '';
	$content = preg_replace( $pattern, $replace, $content );

	/**
	 * Adjust post types
	 */
	$new_post_type = 'post';

	if ( has_category( array( 'footprints', 'concepts-definitions' ), get_the_id() ) ) {
		$new_post_type = 'footprint';
	}
	else if ( has_category( array( 'interviews', 'news', 'news-articles-interviews', 'press' ), get_the_id() ) ) {
		$new_post_type = 'news_brief';
	}
	else if ( has_category( array( 'education' ), get_the_id() ) ) {
		$new_post_type = 'education_resource';
	}

	wp_update_post( array(
		'ID'           => get_the_id(),
		'post_content' => $content,
		'post_type'    =>	$new_post_type
	));

	// Clear out dead postmeta
	foreach( $old_postmeta as $meta_key ) {
		delete_post_meta( get_the_id(), $meta_key );
	}

	echo "Post " . get_the_id() . " has been updated and now is of type " . $new_post_type . PHP_EOL;

endwhile;
