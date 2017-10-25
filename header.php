<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo( 'name' ); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" 
			href="<?php echo get_stylesheet_uri(); ?>">
			<link href="https://fonts.googleapis.com/css?family=Montserrat%7CSource+Sans+Pro" rel="stylesheet">

	<?php wp_head(); //HOOK. required for the admin bar and plugins to work ?>
</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="wrapper">
			<h1 class="site-title"><a href="<?php echo home_url(); ?>">
				<?php bloginfo( 'name' ); ?></a></h1>
			<h2><?php bloginfo( 'description' ); ?></h2>
			<nav>
				<ul class="nav">
					<?php wp_list_pages( array(
						'title_li' => '',
					) ); ?>
				</ul>
			</nav>

			<?php 
			//show the search if not on the front page
			if( ! is_front_page() ):
				get_search_form(); //searchform.php or default search form 
			endif;
			?>
		</div>
	</header>
	<div class="wrapper">