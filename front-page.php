<?php get_header(); 


                if ( have_posts() ) :

                while ( have_posts() ) : the_post(); ?>

                    <h2><?php the_title(); ?></h2>
                    

                <?php endwhile;

                else :

                    _e( 'Sorry, no posts were found.', 'textdomain' );

                endif;

                // Opinion Post
                $opinionPosts = new WP_Query('cat=5&posts_per_page=2'); //&orderby=title&ASC

                if ( $opinionPosts->have_posts() ) :

                while ( $opinionPosts->have_posts() ) : $opinionPosts->the_post(); ?>

                    <h2><?php the_title(); ?></h2>

                <?php endwhile;

                else :

                    _e( 'Sorry, no posts were found.', 'textdomain' );

                endif;

                wp_reset_postdata();
    


get_footer(); ?>