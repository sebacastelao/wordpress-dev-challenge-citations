<?php

if ( ! defined('ABSPATH') ) {
    die('Direct access not permitted.');
}

// Create wp_editor for complete the Citation

if (!function_exists('create_wpeditor')) {
    function create_wpeditor( $post ){
        $editor_id = 'custom_editor_box';
        $uploaded_csv = get_post_meta( $post->ID, 'custom_editor_box', true);
        wp_editor( $uploaded_csv, $editor_id );
    }
}

// Save Citation as Post meta_data

if (!function_exists('save_wp_editor_fields')) {
    function save_wp_editor_fields(){
        global $post;
        update_post_meta($post->ID, 'custom_editor_box', $_POST['custom_editor_box']);
        update_option( 'custom_editor_box', $_POST['custom_editor_box'] );
    }
}

/**
 * /**
 * The [citation] shortcode.
 *
 * Accepts a post-id and will display Citation. Example [citation post-id="141"]
 * 
 * If use only [citation] will use the current post meta-data. Example [citation]
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @param string $content Shortcode content. Default null.
 * @param string $tag     Shortcode tag (name). Default empty.
 * @return string Shortcode output.
 */

if (!function_exists('citation_shortcode')) {
    function citation_shortcode( $atts = [], $content = null, $tag = '' ) {
        global $post; 
        // normalize attribute keys, lowercase
        $atts = array_change_key_case( (array) $atts, CASE_LOWER );
 
        // override default attributes with user attributes
        $citation_atts = shortcode_atts(
            array(
                'post-id' => $post->ID,
            ), $atts, $tag
        );
    
        // start box
        $citation = '<div class="citation-box">';
    
        // title
        $postCHECK   = get_post( $citation_atts['post-id'] );
        $citation_meta = get_post_meta( $postCHECK->ID, 'custom_editor_box', true);

        
        
        
        $citation .= $citation_meta;
    
        // enclosing tags
        if ( ! is_null( $content ) ) {
            $citation .= apply_filters( 'the_content', $content );
        }
    
        // end box
        $citation .= '</div>';
    
        // return output
        return $citation;
    }
}
 

 
