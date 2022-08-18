<?php

if ( ! defined('ABSPATH') ) {
    die('Direct access not permitted.');
}

// Add aditional wp_editor to post

add_action( 'edit_form_after_editor', 'create_wpeditor' );
add_action( 'save_post', 'save_wp_editor_fields' );
// add_shortcode('mc-citacion', 'subscribe_link');

/**
 * Central location to create all shortcodes.
 */

if (!function_exists('citation_shortcodes_init')) {
    function citation_shortcodes_init() {
        add_shortcode( 'citation', 'citation_shortcode' );
    }
}

add_action( 'init', 'citation_shortcodes_init' );
