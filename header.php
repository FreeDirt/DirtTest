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

		<header class="site-header">

			<div class="header-desc-w-smedia flex-container">
				<div class="header-desc-container flex-1">
					<p>description Here</p>
				</div>
				<div class="header-smedia-container flex-1">
					<p>Social Add Here</p>
				</div>
			</div>
			<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' ); ?>
			 
			
			<?php if (get_theme_mod('custom_logo') != '') { ?>
				<a href="<?php echo esc_url(home_url( '/'));  ?>"><?php echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="flood control asia logo" width="301" height="80"> '?></a>   
			<?php } else { ?>
				<h1><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1>
						  <p><?php bloginfo('description'); ?></p>
			<?php } ?>
			

			
		</header>