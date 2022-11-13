<?php
/**
 * Chris House functions and definitions
 *
 * @package WordPress
 * @subpackage Chris_House
 * @since Chris House 1.0
 */

/**
 * Enqueue scripts and styles.
 *
 * @since Chris House 1.0
 */
function chris_house_enqueue_scripts() {
	wp_enqueue_style( 'ch-style-main', get_theme_file_uri( '/build/style-index.css' ), 1.0, 'all' );
	wp_enqueue_style( 'ch-style-extras', get_theme_file_uri( '/build/index.css' ), 1.0, 'all' );
}

add_action( 'wp_enqueue_scripts', 'chris_house_enqueue_scripts' );
