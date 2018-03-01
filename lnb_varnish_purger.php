<?php

/*
Plugin Name: LNB Varnish Purger
Plugin URI: http://www.leadsnearby.com
Description: Clears the Varnish Cache when the Rocket Cache is Cleared
Version: 1.0.0
Author: Brian West
Author URI: http://www.leadsnearby.com
License: GPLv3
*/

add_action( 'after_rocket_clean_domain', 'purge_varnish_cache');

function purge_varnish_cache() {
	if (current_user_can('administrator')) {
		$url = site_url() . "/.*";
		$response = wp_remote_request( $url,
    		array(
        		'method'     => 'PURGE',
				'blocking' => false
    		)
		);
	}
}