<?php 

function fcaWordpress_resources() {
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('mystyle', get_template_directory_uri() . '/assets/css/mystyle.min.css');
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/myscript.js', array ( 'jquery' ), 1.1, true);

}

add_action('wp_enqueue_scripts', 'fcaWordpress_resources');

// Navigation Menus

register_nav_menus( array(
	'primary' => __( 'Primary Menu' ),
	'submenu' => __( 'Sub Menu' ),
	'footer' => __( 'Footer Menu' ),
));

// Get top ancestor
function get_top_ancestor_id() {

	global $post;

	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
	}

	return $post->ID;
}

// Does page have children?
function has_children() {
	global $post;

	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);
}


/**

* Custom Gutenberg Blocks

*/

require get_template_directory() . '/inc/gutenberg.php';