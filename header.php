<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Chris_House
 * @since Chris House 1.0
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header inner">
	<h1 class="site-title"><a href="<?php echo esc_url( site_url( '/' ) ); ?>">chris<span class="accent">.</span>house</a></h1>
	<p class="tagline"><?php bloginfo( 'description' ); ?></p>
	<nav class="site-navigation">
		<a href="https://github.com/chrishouse" target="_blank" title="My GitHub"><i class="fa-brands fa-github"></i></a>
		<a href="<?php echo esc_url( site_url( '/contact' ) ); ?>" title="Contact me"><i class="fa-solid fa-envelope"></i></a>
	</nav>
</header>

<div class="divider"></div>

<div id="page">

	<div id="content" class="inner">
