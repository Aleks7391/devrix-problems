<?php
get_header();

$args = array(
	'post_type'      => 'student',
	'posts_per_page' => -1,
	'meta_key' => '_ag_status_meta',
	'meta_query' => array(
		'key' => '_ag_status_meta',
		'value' => '1',
		'compare' => '=',
	)
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' );
		
		if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header>

	<?php while ( $query->have_posts() ) : $query->the_post(); 
	?>
	<header class="entry-header">
	<?php if ( is_singular() ) : 
		the_title( '<h1 class="entry-title default-max-width">', '</h1>' ); 
	else :
		the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); 
	endif;
	twenty_twenty_one_post_thumbnail(); ?>
	</header>

	<div class="entry-content">
	<?php
	the_excerpt();
	?>
	</div>
	<?php
	endwhile; 
else : 
get_template_part( 'template-parts/content/content-none' );
endif; 
wp_reset_postdata();
?>


<?php get_footer(); ?>


