<?php

get_header();

if ( have_posts() ) : ?>

    <h2>Search result for: <?php the_search_query(); ?></h2>

<?php 

    while ( have_posts() ) : the_post();

    get_template_part('template/content', get_post_format());

    endwhile;

    echo paginate_links();

    else :
        _e( 'Sorry, no posts were found.', 'textdomain' );

    endif;


get_footer();

?>