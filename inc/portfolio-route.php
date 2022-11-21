<?php

add_action( 'rest_api_init', 'ch_register_query' );

function ch_register_query() {
	register_rest_route(
		'portfolio/v1',
		'posts',
		array(
			'methods'  => WP_REST_SERVER::READABLE,
			'callback' => 'ch_query_results',
		)
	);
}

function ch_query_results() {
	$ch_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'posts_per_page' => -1,
		)
	);

	$results = array();

	while ( $ch_query->have_posts() ) {
		$ch_query->the_post();
		array_push(
			$results,
			array(
				'title'       => get_the_title(),
				'id'          => get_the_ID(),
				'permalink'   => get_the_permalink(),
				'image'       => get_the_post_thumbnail_url(),
				'description' => get_the_content(),
				'role'        => get_field( 'role' )['value'],
				'association' => get_field( 'association' )['value'],
				'platform'    => get_field( 'platform' )['value'],
				'build_type'  => get_field( 'build_type' )['value'],
			)
		);
	}

	return $results;
}
