	<footer class="site-footer">
		
		<?php if (get_theme_mod('bwp_footer-callout-display') == "Yes") { ?>
		<div class="footer-callout clearfix">
			<div class="footer-callout-image">
				<img src="<?php echo wp_get_attachment_url(get_theme_mod('bwp_footer-callout-image'));?>" alt="">
			</div>
			<div class="footer-callout-text">
				<h2><a href="<?php echo get_permalink(get_theme_mod('bwp_footer-callout-link'));?>"><?php echo get_theme_mod('bwp_footer-callout-headline'); ?></h2></a>
				<?php echo wpautop(get_theme_mod('bwp_footer-callout-text')); ?>
			</div>
		</div>
		<?php } ?>

		<!-- footer widgets -->
		<div class="footer-widgets">
			<?php if (is_active_sidebar('footer1')) : ?>
				<div class="footer-widget-area">
					<?php dynamic_sidebar('footer1'); ?>
				</div>
			<?php endif ?>

			<?php if (is_active_sidebar('footer2')) : ?>
				<div class="footer-widget-area">
					<?php dynamic_sidebar('footer2'); ?>
				</div>
			<?php endif ?>

			<?php if (is_active_sidebar('footer3')) : ?>
				<div class="footer-widget-area">
					<?php dynamic_sidebar('footer3'); ?>
				</div>
			<?php endif ?>

			<?php if (is_active_sidebar('footer4')) : ?>
				<div class="footer-widget-area">
					<?php dynamic_sidebar('footer4'); ?>
				</div>
			<?php endif ?>
		</div>
		<!-- /footer widgets -->

	<nav class="site-nav">
				<?php $args = array(
					'theme_location' => 'footer'
				);
				?>

				<?php wp_nav_menu( $args ); ?>
			</nav>

		<p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?></p>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>