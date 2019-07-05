<?php 

/**
*Custom Gutenberg functions
*/

function baitep_gutenberg_default_colors() 

{
	// custom color pallete
	add_theme_support('editor-color-palette',
		array(
			array(
				'name' => 'White',
				'slug' => 'white',
				'color' => '#ffffff'
			),
			array(
				'name' => 'Black',
				'slug' => 'black',
				'color' => '#000000'
			),
			array(
				'name' => 'FCA color',
				'slug' => 'blue',
				'color' => '#00408e'
			),
			array(
				'name' => 'KTV color',
				'slug' => 'orange',
				'color' => '#F17623'
			),
			array(
				'name' => 'KTV color',
				'slug' => 'gray',
				'color' => '#475664'
			),
			array(
				'name' => 'A4W color',
				'slug' => 'orange',
				'color' => '#F27324'
			),
			array(
				'name' => 'Pink',
				'slug' => 'pink',
				'color' => '#FF4444'
			),
		)
	);

	// custom font size
	add_theme_support('editor-font-sizes',
		array(
			array(
				'name' => 'Normal',
				'slug' => 'normal',
				'size' => 16,
			),
			array(
				'name' => 'Large',
				'slug' => 'large',
				'size' => 24,
			),
		)
	);
}

add_action('init', 'baitep_gutenberg_default_colors');

function baitep_gutenberg_blocks() {
	wp_register_script('custom-cta-js', get_template_directory_uri() . '/build/index.js', array('wp-blocks'));

	register_block_type('baitep/custom-cta', array(
		'editor_script' => 'custom-cta-js'
	) );
}

add_action('init', 'baitep_gutenberg_blocks');