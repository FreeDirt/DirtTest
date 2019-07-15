<?php

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();

    get_template_part('template/content', 'page');
    
    endwhile;
else :
    _e( 'Sorry, no posts were found.', 'textdomain' );

endif; ?>


<h1>Blog Posts About Us</h1>
<?php 

	$ourCurrentPage = get_query_var('paged');

	$aboutPosts = new WP_Query(array(
		'category_name' => 'about',
		'posts_per_page' => 3,
		'paged' => $ourCurrentPage
	));

	if ( $aboutPosts->have_posts() ) :
    while ( $aboutPosts->have_posts() ) : $aboutPosts->the_post(); ?>

	<a href=" <?php the_permalink(); ?> "><li><?php the_title(); ?></li></a>

	<?php endwhile;
	// next_posts_link();
	// next_posts_link('next_page', $aboutPosts->max_num_pages);
	echo paginate_links(array(
		'total' => $aboutPosts->max_num_pages
	));
	else :
	    _e( 'Sorry, no posts were found.', 'textdomain' );

	endif;

	?>


<?php get_footer(); ?>