<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" 
			href="<?php echo get_stylesheet_uri(); ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat%7CSource+Sans+Pro" rel="stylesheet">

	<?php wp_head(); //HOOK. required for the admin bar and plugins to work ?>
</head>
<body <?php body_class(); ?>>

	<header class="header" 
			style="background-image:url(<?php header_image() ?>);">
		<div class="wrapper">

		<?php if( has_custom_logo() ): ?>
			<div class="logo">
				<?php the_custom_logo(); ?>
			</div>
		<?php endif; ?>

			<h1 class="site-title"><a href="<?php echo home_url(); ?>">
				<?php bloginfo( 'name' ); ?></a></h1>
			<h2><?php bloginfo( 'description' ); ?></h2>
			
			<!-- https://codepen.io/melissacabral/pen/ZXgxov -->
			<input type="checkbox" id="drawer-toggle" name="drawer-toggle"/>
			<label for="drawer-toggle" id="drawer-toggle-label"></label>
			

			<?php //display one of the nav menus we registered in functions.php
			wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'container' => 'nav', //wrap with <nav> tag
				'menu_class' => 'nav', // ul class="nav"
				'container_id' => 'menu' //nav id="menu"
			) ); ?>


			<?php //social menu
			wp_nav_menu( array(
				'theme_location' => 'social_menu',
				'fallback_cb' => false,
				'container_class' => 'social-navigation',
				'link_before' => '<span class="screen-reader-text">',
				'link_after' => '</span>',
			) ); ?>


		</div>
	</header>
	<div class="wrapper">