<?php
/**
 * Created by GCF - NOV 2021
 */

function override_sdm_post_type_capability( $capability ){
	$capability = 'edit_pages';//Allow administrator and editor roles.
	return $capability;
}
add_filter( 'sdm_post_type_capability', 'override_sdm_post_type_capability' );
