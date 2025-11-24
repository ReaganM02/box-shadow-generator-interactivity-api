<?php
/**
 * Plugin Name:       Box Shadow Generator
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       box-shadow-generator
 *
 * @package Boxshadowgenerator
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'BOX_SHADOW_GENERATOR_PATH', get_template_directory() );
define( 'BOX_SHADOW_GENERATOR_DIR', get_stylesheet_directory_uri() );



add_action( 'init', function () {
	register_block_type( __DIR__ . '/build/header' );
	register_block_type( __DIR__ . '/build/box-shadow-generator' );
	register_block_type( __DIR__ . '/build/counter' );
} );
add_action( 'wp_enqueue_scripts', function () {

	wp_enqueue_style(
		'box-shadow-generator',
		BOX_SHADOW_GENERATOR_DIR . '/assets/css/box-shadow-generator.css'
	);

	wp_enqueue_style(
		'nano',
		BOX_SHADOW_GENERATOR_DIR . '/assets/css/nano.css'
	);

} );

function boxShadowGeneratorComponent( string $file, $data = [] )
{
	$file = BOX_SHADOW_GENERATOR_PATH . '/components/' . $file . '.php';
	if ( file_exists( $file ) ) {
		require $file;
	}
	else {
		echo 'File not found';
	}
}
