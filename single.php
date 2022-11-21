<?php get_header(); ?>

<main class="main-block">
	<section class="single-post-content">
	<?php
	while ( have_posts() ) {
		the_post();
		?>

		<div class="post-left">
				<a href="<?php echo esc_url( get_field( 'url' ) ); ?> " target="_blank"><div class="post-thumbnail"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></div></a>
			</div>

			<div class="post-right">
				<div class="post-description">
					<h2 class="post-title"><?php the_title(); ?></h2>
			<?php the_content(); ?>
					<a class="button post-link" href="<?php echo esc_url( get_field( 'url' ) ); ?>" target="_blank">Visit the site</a>
				</div>
				<div class="post-info-cont">
					<h3 class="post-platform">Platform</h3>
					<div><?php echo esc_html( get_field( 'platform' )['label'] ); ?></div>

					<h3 class="post-role">My Role</h3>
					<div><?php echo esc_html( get_field( 'role' )['label'] ); ?></div>

					<h3 class="post-association">Association</h3>
					<div><?php echo esc_html( get_field( 'association' )['label'] ); ?></div>

					<h3 class="post-build-type">Build Type</h3>
					<div><?php echo esc_html( get_field( 'build_type' )['label'] ); ?></div>
				</div>
			</div>

			<div class="post-controls">
				<div class="prev-post"><?php previous_post_link( '%link', '< Previous' ); ?></div>
				<div class="next-post"><?php next_post_link( '%link', 'Next >' ); ?></div>
			</div>
			<?php
	}

	?>
	</section>
</main>

<?php
get_footer();
