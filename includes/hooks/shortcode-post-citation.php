<?php

//Shortcode to display Citation field with [mc-citation post_id="id"]
function mc_citation_authors( $atts ) {
    $atts = shortcode_atts(
        array(
            'post_id' => '',
        ), $atts, 'mc-citation' );
    
    $diwp_custom_editor = get_post_meta($atts['post_id'], '_diwp_custom_editor', true);
 
    return $diwp_custom_editor ;
}
add_shortcode( 'mc-citation', 'mc_citation_authors' );