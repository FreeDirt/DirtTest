<?php

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
    <article class="post page">
        <!-- column-container -->
        <div class="column-container clearfix">
            <div class="title-column">
                <h2><?php the_title(); ?></h2>
            </div>

            <div class="text-column">
                <?php the_content(); ?>
            </div>
        </div>
        <!-- /column-container -->
    </article>
    <?php endwhile;
else :
    _e( 'Sorry, no posts were found.', 'textdomain' );

endif;


get_footer();

?>