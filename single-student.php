<?php
get_header();

while ( have_posts() ) :
	the_post();

	the_title( '<h1 class="entry-title">', '</h1>' );
	the_content();

	
	$categories_list = get_the_category_list( ', ' );
	if ( $categories_list ) {
		printf( esc_html__( 'Enrolled classes: %s' ), $categories_list );
	} else {
		printf( esc_html__( 'Enrolled classes: None' ) );
	}

	$twentytwentyone_next =  twenty_twenty_one_get_icon_svg( 'ui', 'arrow_right' );
	$twentytwentyone_prev =  twenty_twenty_one_get_icon_svg( 'ui', 'arrow_left' );

	$twentytwentyone_next_label     = esc_html__( 'Next post' );
	$twentytwentyone_previous_label = esc_html__( 'Previous post' );


	the_post_navigation(
		array(
			'next_text' => '<p class="meta-nav">' . $twentytwentyone_next_label . $twentytwentyone_next . '</p><p class="post-title">%title</p>',
			'prev_text' => '<p class="meta-nav">' . $twentytwentyone_prev . $twentytwentyone_previous_label . '</p><p class="post-title">%title</p>',
		)
	);
endwhile;

get_footer();
