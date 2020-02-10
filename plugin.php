<?php
/**
 * Plugin Name: Beauty Box
 * Description: Add a customizable box around your content.
 * Author: dufresnesteven
 */

function gutenberg_beauty_box_register() {

	// Register our block script with WordPress
	wp_register_script(
		'gutenberg-beauty-box',
		plugins_url('build/index.js', __FILE__),
		array('wp-blocks', 'wp-element', 'wp-editor')
	);

	// Register our block's base CSS
	wp_register_style(
		'gutenberg-beauty-box-style',
		plugins_url( 'style.css', __FILE__ )
	);

	// Register our block's editor-specific CSS
	wp_register_style(
		'gutenberg-beauty-box-edit-style',
		plugins_url('style.css', __FILE__),
		array( 'wp-edit-blocks' )
	);

	// Enqueue the script in the editor
	register_block_type('beauty-box/main-box', array(
		'editor_script' => 'gutenberg-beauty-box',
		'editor_style' => 'gutenberg-beauty-box-edit-style',
		'style' => 'gutenberg-beauty-box-style'
	));
}

add_action('init', 'gutenberg_beauty_box_register');
