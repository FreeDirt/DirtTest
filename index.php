<?php

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    <?php endwhile;
else :
    _e( 'Sorry, no posts were found.', 'textdomain' );

endif;


get_footer();

?>