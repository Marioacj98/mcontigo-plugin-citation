<?php

include plugin_dir_path ( __FILE__ ) . 'includes/hooks/shortcode-post-citation.php';

//Add custom field of Citation to posts
function add_custom_box_citation () {
    $screens = [ 'post', 'citation_cpt' ];
    foreach ( $screens as $screen ) {
        add_meta_box (
            'diwp-wysiwyg-editor',
            'Citation',
            'citation_custom_html_code_editor',
            'post'
      );
    }
}
add_action( 'add_meta_boxes', 'add_custom_box_citation' );

//Get values of Citation field
function citation_custom_html_code_editor ( $post ){
    $diwp_custom_editor = get_post_meta( $post->ID, '_diwp_custom_editor', true ); 
    wp_editor( $diwp_custom_editor,  'diwp_custom_editor', array() );
}

//Saving values of Citation field
function diwp_save_custom_wp_editor_content ( $post_id ){
    if( isset ( $_POST['diwp_custom_editor'] ) ) {
        update_post_meta ( $post_id, '_diwp_custom_editor', $_POST['diwp_custom_editor'] );
    }
 }
 
add_action( 'save_post', 'diwp_save_custom_wp_editor_content' );