<?php

/*
Plugin Name: LNB Varnish Purger
Plugin URI: http://www.leadsnearby.com
Description: Clears the Varnish Cache when the Rocket Cache is Cleared
Version: 1.0.1
Author: Brian West
Author URI: http://www.leadsnearby.com
License: GPLv3
 */

class lnbCachePurging {

    public function __construct() {
        require_once plugin_dir_path(__FILE__) . '/inc/varnish-http-purge.php';
        require_once plugin_dir_path(__FILE__) . '/updater/github-updater.php';
        new GitHubPluginUpdater(__FILE__, 'LeadsNearby', 'lnb-varnish-purger');

        add_action('after_rocket_clean_domain', array($this, 'purge_varnish_cache'));
        add_action('before_run_rocket_sitemap_preload', array($this, 'purge_varnish_cache'));
        add_action('wp_rocket_first_install', array($this, 'purge_varnish_cache'));
    }

    public function purge_varnish_cache() {
        if (current_user_can('administrator')) {
            $url = site_url() . "/.*";
            $response = wp_remote_request($url,
                array(
                    'method' => 'PURGE',
                    'blocking' => false,
                )
            );
        }
    }
}

new lnbCachePurging();