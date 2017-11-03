<?php get_header(); //includes header.php ?>

<main class="content" id="content">

	<?php 
	//THE LOOP. this is the same on every template
	if( have_posts() ): 
	?>
	<h1 class="content-title">Work</h1>

	<ul class="portfolio-category-filter">
		<?php 
		//show a list of all portfolio-categories that have pieces
		wp_list_categories( array(
			'taxonomy' 	=> 'portfolio_category',
			'title_li' 	=> '', //no 'categories' title
		) ); ?>
	</ul>
	<?php
		while( have_posts() ): the_post(); ?>
	<section <?php post_class(); ?>>
		<div class="hero-image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'large' ); ?>
			</a>
			<h2 class="piece-title"><?php the_title(); ?></h2>
		</div>

		<div class="excerpt"><?php the_excerpt(); ?></div>
	</section>


<?php 
	endwhile;
?>
	<section class="pagination">
		<?php 
		//show next/previous on devices, numbered pagination on desktops
		if( wp_is_mobile() ):
			//Previous & Next button
			previous_posts_link( "&larr; Newer Work" );
			next_posts_link( "Earlier Work &rarr;" );
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


<?php get_footer(); //include footer.php ?>