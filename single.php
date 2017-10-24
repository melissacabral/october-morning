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
		<div class="postmeta">
			<span class="author">by: <?php the_author(); ?> </span>
			<span class="date"> <?php the_date(); ?> </span>
			<span class="num-comments"> <?php comments_number(); ?> </span>
			<span class="categories"> 
				<?php the_category(); ?>
			</span>
			<span class="tags"><?php the_tags(); ?></span>
		</div>
		<!-- end .postmeta -->
	</article>
	<!-- end .post -->

	<?php comments_template(); //show comment list and comment form ?>

<?php 
	endwhile;
else:
	echo 'Sorry, no posts found';	
endif; 
?>
</main>
<!-- end #content -->


<?php get_sidebar(); //include sidebar.php ?>

<?php get_footer(); //include footer.php ?>