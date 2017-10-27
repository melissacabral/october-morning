<?php get_header('home'); //includes header-home.php ?>

<main class="content">

	<?php 
	//THE LOOP. this is the same on every template
	if( have_posts() ): 
		while( have_posts() ): the_post(); 

			// include content-page.php
			get_template_part('content', 'page');

	?>

	<section class="featured-work">
		<h2>Featured Work</h2>
		<p>TODO: display a portfolio piece here</p>
	</section>

	<section class="home-widgets">
		<?php dynamic_sidebar( 'Home Featured Area' ); ?>
	</section>

<?php 
	endwhile;
else:
	echo 'Sorry, no posts found';	
endif; 
?>
</main>
<!-- end #content -->


<?php get_footer(); //include footer.php ?>