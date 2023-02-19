<?php 
function disable_image_sizes( $sizes ) {
    // Remove all sizes except for the original (full) size
    unset( $sizes['thumbnail'] );
    unset( $sizes['medium'] );
    unset( $sizes['medium_large'] );
    unset( $sizes['large'] );
    unset( $sizes['1536x1536'] );
    unset( $sizes['2048x2048'] );
    return $sizes;
}

// Hook the function into the image size registration filter
add_filter( 'intermediate_image_sizes_advanced', 'disable_image_sizes' );

function disable_gutenberg() {
    // Disable Gutenberg editor
    add_filter( 'use_block_editor_for_post', '__return_false', 10 );

    // Restore classic editor
    add_filter( 'replace_editor', 'classic_editor', 10 );
}

function classic_editor() {
    return 'wp_default_editor';
}

// Hook the function into the admin_init action
add_action( 'admin_init', 'disable_gutenberg' );

function MekongCSS() {
    // Enqueue CSS file
    wp_enqueue_style( 'MekongCSS', get_stylesheet_directory_uri() . '/css/mekong.css' );
}

// Hook the function into the wp_enqueue_scripts action
add_action( 'wp_enqueue_scripts', 'MekongCSS' );
