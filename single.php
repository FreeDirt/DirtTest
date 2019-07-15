<?php

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();

    get_template_part('template/content', 'single');
    
    endwhile;
else :
    _e( 'Sorry, no posts were found.', 'textdomain' );

endif;


get_footer();

?>