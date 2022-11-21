<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Chris_House
 * @since Chris House 1.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/content', 'filter' ); ?>

<main class="main-block">

	<h1 class="main-title">My Work</h1>

	<div class="portfolio-grid"></div>

</main>

<?php
get_footer();
