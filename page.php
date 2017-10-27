<?php get_header(); //includes header.php ?>

<main class="content">

	<?php 
	//THE LOOP. this is the same on every template
	if( have_posts() ): 
		while( have_posts() ): the_post(); 

			// include content-page.php
			get_template_part('content', 'page');

		endwhile;
	else:
		echo 'Sorry, no posts found';	
	endif; 
?>
</main>
<!-- end #content -->


<?php get_footer(); //include footer.php ?>