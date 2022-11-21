<?php
/**
 * Chris House functions and definitions
 *
 * @package WordPress
 * @subpackage Chris_House
 * @since Chris House 1.0
 */

require get_theme_file_path( '/inc/portfolio-route.php' );

/**
 * Enqueue scripts and styles.
 *
 * @since Chris House 1.0
 */
function chris_house_enqueue_scripts() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;400;700&display=swap', array(), 1.0, 'all' );
	wp_enqueue_style( 'ch-style-main', get_theme_file_uri( '/build/style-index.css' ), array(), 1.0, 'all' );
	wp_enqueue_style( 'ch-style-extras', get_theme_file_uri( '/build/index.css' ), array(), 1.0, 'all' );
	wp_enqueue_script( 'fontawesome', '//kit.fontawesome.com/597754227c.js', array(), 1.0, false );

	// I only want the script to run on the maine posts page.
	if ( is_home() ) {
		wp_enqueue_script( 'ch-js', get_theme_file_uri( '/build/index.js' ), array(), 1.0, true );
	}

	wp_localize_script( 'ch-js', 'chData', array( 'root_url' => get_site_url() ) );
}

add_action( 'wp_enqueue_scripts', 'chris_house_enqueue_scripts' );

/**
 * Register feature support.
 *
 * @since Chris House 1.0
 */
function chris_house_features() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'chris_house_features' );

/**
 * Register nav menus
 *
 * @since Chris House 1.0
 */
function chris_house_register_nav_menus() {
	register_nav_menus(
		array(
			'main' => esc_html__( 'Main Menu', 'chrishouse' ),
		)
	);
}

add_action( 'init', 'chris_house_register_nav_menus' );
