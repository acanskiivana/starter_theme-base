<?php 

// Register acf blocks
function starter_theme_register_acf_blocks() {
    register_block_type( get_template_directory() . '/blocks/hero-slider' );
}
add_action('init', 'starter_theme_register_acf_blocks');


function my_acf_json_load_point( $paths ) {
    // Remove the original path (optional).
    unset($paths[0]);

    // Append the new path and return it.
    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;    
}
add_filter( 'acf/settings/load_json', 'my_acf_json_load_point' );

?>