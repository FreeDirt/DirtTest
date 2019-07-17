<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<div class="container">

		<!-- hd-search -->
		<div class="hd-search">
			<?php get_search_form(); ?>
		</div>
		<!-- /hd-search -->

		<header class="site-header">
			<h1><a href=" <?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<h5><?php bloginfo('description');?> <?php if (is_page('portfolio')) { ?>
					- Thank you for Visiting my Website!!
			<?php } ?></h5>

			<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' ); ?>
			<a href="<?php echo esc_url(home_url( '/'));  ?>"><?php echo '<img src="' . esc_url( $custom_logo_url ) . '" alt=""> '?></a>';               
			<?php ?>

			

			<nav class="site-nav">
				<?php $args = array(
					'theme_location' => 'primary'
				);
				?>

				<?php wp_nav_menu( $args ); ?>
			</nav>
		</header>