<?php 

function fcaWordpress_resources() {
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style('mystyle', get_template_directory_uri() . '/assets/css/mystyle.min.css');
	wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/myscript.js', array ( 'jquery' ), 1.1, true);

}

add_action('wp_enqueue_scripts', 'fcaWordpress_resources');


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

function custom_excerpt_length() {
	return 25;
}

add_filter('excerpt_length', 'custom_excerpt_length');

function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Theme setup
function baitepWordpress_setup() {

	// Navigation Menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu' ),
		'submenu' => __( 'Sub Menu' ),
		'footer' => __( 'Footer Menu' ),
	));

	// Add Featured image support
	add_theme_support('post-thumbnails');
	add_image_size('small-thumbnail', 180, 120, true);
	add_image_size('facebook-image', 840, 440, true);
	add_image_size('large-image', 920, 210, array('left', 'top'));
	add_image_size('banner-image', 1280, 790, true);

	// Add post format support
	add_theme_support('post-formats', array('aside', 'gallery', 'link'));
}

add_action('after_setup_theme', 'baitepWordpress_setup');

// Add Widget Locations
function baitepWidgetsInit() {

	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="my-special-class">',
		'after_title' => '</h4>'
	));

	register_sidebar( array(
		'name' => 'Footer Area 1',
		'id' => 'footer1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>'
	));

	register_sidebar( array(
		'name' => 'Footer Area 2',
		'id' => 'footer2',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>'
	));

	register_sidebar( array(
		'name' => 'Footer Area 3',
		'id' => 'footer3',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>'
	));

	register_sidebar( array(
		'name' => 'Footer Area 4',
		'id' => 'footer4',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>'
	));

}

add_action('widgets_init','baitepWidgetsInit');

// Customize Appearance Options
function baitepWordPress_customize_register( $wp_customize) {
	$wp_customize->add_setting('bwp_link_color', array(
		'default' => '00408e',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('bwp_btn_color', array(
		'default' => '00408e',
		'transport' => 'refresh',
	));

	$wp_customize->add_section('bwp_standard_colors', array(
		'title' => __('Standard Colors', 'BaitepWordPress'),
		'priority' => 30,
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bwp_link_color_control', array(
		'label' => __('Link Color', 'BaitepWordPress'),
		'section' => 'bwp_standard_colors',
		'settings' => 'bwp_link_color',
	)));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'btn_link_color_control', array(
		'label' => __('Button Color', 'BaitepWordPress'),
		'section' => 'bwp_standard_colors',
		'settings' => 'bwp_btn_color',
	)));
}

add_action('customize_register', 'baitepWordPress_customize_register');

// Output Customize CSS
function baitepWordPress_customize_css() { ?>
			<style type="text/css">
				a:link,
				a:visited {
					color: <?php echo get_theme_mod('bwp_link_color'); ?>;
				}

				.site-header nav ul li.current-menu-item a:link,
				.site-header nav ul li.current-menu-item a:visited,
				.site-header nav ul li.current-page-ancestor a:link,
				.site-header nav ul li.current-page-ancestor a:visited {
					background-color: <?php echo get_theme_mod('bwp_link_color'); ?>
				}

				.btn-color-pallete,
				.btn-color-pallete:link,
				.btn-color-pallete:visited {
					background-color: <?php echo get_theme_mod('bwp_btn_color'); ?>
				}
			</style>
<?php }

add_action('wp_head', 'baitepWordPress_customize_css');


// Add Footer CAllout Section to admin Appreance customize screen
function btp_footer_callout($wp_customize) {
	$wp_customize->add_section('bwp-footer-callout-section', array(
		'title' => 'Footer Callout'
	));

	$wp_customize->add_setting('bwp_footer-callout-display', array(
		'default' => 'No'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bwp_footer-callout-display', array(
		'label' => 'Display this section?',
		'section' => 'bwp-footer-callout-section',
		'settings' => 'bwp_footer-callout-display',
		'type' => 'select',
		'choices' => array('No' => 'No', 'Yes' => 'Yes'),
	)));

	$wp_customize->add_setting('bwp_footer-callout-headline', array(
		'default' => 'Example Headline Text!'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bwp_footer-callout-headline', array(
		'label' => 'Headline',
		'section' => 'bwp-footer-callout-section',
		'settings' => 'bwp_footer-callout-headline',
	)));

	$wp_customize->add_setting('bwp_footer-callout-text', array(
		'default' => 'This is a paragraph Text!'
	));

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bwp_footer-callout-text', array(
		'label' => 'Text',
		'section' => 'bwp-footer-callout-section',
		'settings' => 'bwp_footer-callout-text',
		'type' => 'textarea',
	)));

	$wp_customize->add_setting('bwp_footer-callout-link');

	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'bwp_footer-callout-link', array(
		'label' => 'link',
		'section' => 'bwp-footer-callout-section',
		'settings' => 'bwp_footer-callout-link',
		'type' => 'dropdown-pages',
	)));

	$wp_customize->add_setting('bwp_footer-callout-image');

	$wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'bwp_footer-callout-image', array(
		'label' => 'Image',
		'section' => 'bwp-footer-callout-section',
		'settings' => 'bwp_footer-callout-image',
		'width' => 750,
		'height' => 500,
	)));
}

add_action('customize_register', 'btp_footer_callout');


/**

* Custom Gutenberg Blocks

*/

require get_template_directory() . '/inc/gutenberg.php';