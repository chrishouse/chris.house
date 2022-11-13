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

get_header();?>

<div>
	<?php
	while ( have_posts() ) {
		the_post();
		?>
		<div>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<div>
				<p>Posted by <?php the_author_posts_link(); ?> on <?php the_time( 'F j, Y' ); ?> in <?php echo get_the_category_list( ', ' ); ?></p>
			</div>

			<div>
				<?php the_excerpt(); ?>
				<p><a href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
			</div>
		</div>
		<?php
	}
	?>
</div>

<?php
get_footer();
