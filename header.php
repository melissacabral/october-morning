<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); //HOOK. required for the admin bar and plugins to work ?>
</head>
<body <?php body_class(); ?>>

	<header class="header" id="top"
			style="background-image:url(<?php header_image() ?>);">
		<div class="wrapper">


			<h1 class="site-title"><a href="<?php echo home_url(); ?>">
				<?php bloginfo( 'name' ); ?></a></h1>

				<?php 
			//show the search if not on the front page
			if( ! is_front_page() ):
				get_search_form(); //searchform.php or default search form 
			endif;
			?>
		
			
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
			
		</div><!-- end .wrapper -->
	</header>

	<div class="wrapper">
		<?php 
			//display the current cart if we're on a woocommerce page
			if(is_woocommerce()): 
				oct_header_cart();
			 endif; 
			 ?>
