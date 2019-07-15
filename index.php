<?php get_header(); ?>

	<!-- Site Content -->
	<div class="site-content clearfix">
		<!-- main-column  -->
		<div class="main-column">
			<?php 

				if ( have_posts() ) :

			    while ( have_posts() ) : the_post();

			        get_template_part('template/content', get_post_format());

			    endwhile;

			    	echo paginate_links();

			    else :

			        _e( 'Sorry, no posts were found.', 'textdomain' );

			    endif;
			 ?>
			
		</div>
		<!-- /main-column  -->

		<?php get_sidebar(); ?>

		
	</div>
	<!-- Site Content -->
	
	


<?php get_footer(); ?>