<?php

/*
Template Name: Special Layout
*/

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
    <article class="post page">
        <h2><?php the_title(); ?></h2>
        <div class="info-box">
            <h4>Disclaimer Title</h4>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <?php the_content(); ?>
    </article>
    <?php endwhile;
else :
    _e( 'Sorry, no posts were found.', 'textdomain' );

endif;


get_footer();

?>