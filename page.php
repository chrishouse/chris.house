<?php get_header(); ?>

<main class="main-block">
	<section class="single-post-content">
		<?php
		while ( have_posts() ) {
			the_post();
			?>
			
			<?php
			the_content();
		}

		?>
	</section>
</main>

<?php
get_footer();
