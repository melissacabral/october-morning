<?php get_header(); //includes header.php ?>

<main class="content">

	<?php 
	//THE LOOP. this is the same on every template
	if( have_posts() ): 
		while( have_posts() ): the_post(); ?>
	<article <?php post_class(); ?>>
		<h2 class="entry-title"> 			
			<?php the_title(); ?> 			
		</h2>

		<?php the_post_thumbnail( 'large' ) ?>

		<div class="entry-content">
			<?php the_content(); //full post body ?>
		</div>
	
	</article>
	<!-- end .post -->


	<section class="featured-work">
		<h2>Featured Work</h2>
		<p>TODO: display a portfolio piece here</p>
	</section>

	<section class="portfolio-categories">
		<div>Category</div>
		<div>Category</div>
		<div>Category</div>
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