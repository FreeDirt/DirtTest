<?php 

function fcaWordpress_resources() {
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('mystyle', get_template_directory_uri() . '/assets/css/mystyle.min.css');
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/myscript.js', array ( 'jquery' ), 1.1, true);

}

add_action('wp_enqueue_scripts', 'fcaWordpress_resources');