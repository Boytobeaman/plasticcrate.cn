<?php
function bootstrap_beauty_enqueue_child_styles() {
    $parent_style = 'bootstrap-blog-style';
   
    wp_enqueue_style( 'bootstrap-beauty', get_stylesheet_directory_uri() . '/style.css', array( 'bootstrap', $parent_style ), wp_get_theme()->get( 'Version' ) );


}
add_action( 'wp_enqueue_scripts', 'bootstrap_beauty_enqueue_child_styles' );