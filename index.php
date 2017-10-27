<?php get_header(); //includes header.php ?>

<main class="content" id="content">

	<?php 
	//THE LOOP. this is the same on every template
	if( have_posts() ): 
		while( have_posts() ): the_post(); ?>
	<article <?php post_class(); ?>>
		<h2 class="entry-title"> 
			<a href="<?php the_permalink(); ?>"> 
				<?php the_title(); ?> 
			</a>
		</h2>

		<?php the_post_thumbnail( 'medium' ); //display featured image if it exists ?>

		<div class="entry-content">
			<?php the_excerpt(); //first 55 words, no HTML, no images ?>
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
?>
	<section class="pagination">
		<?php 
		//show next/previous on devices, numbered pagination on desktops
		if( wp_is_mobile() ):
			//Previous & Next button
			previous_posts_link( "&larr; Fresher Posts" );
			next_posts_link( "Earlier Posts &rarr;" );
		else:
			//numbered pagination for desktops
			the_posts_pagination( array(
				'next_text' => 'Next &rarr;',
				'prev_text' => '&larr; Previous',
				'mid_size' => 2,
			) );
		endif;
		?>		
	</section>

<?php
else:
	echo 'Sorry, no posts found';	
endif; 
?>
</main>
<!-- end #content -->


<?php get_sidebar(); //include sidebar.php ?>

<?php get_footer(); //include footer.php ?>