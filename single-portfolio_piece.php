<?php get_header(); //includes header.php ?>

<main class="content">
	<?php 
	//THE LOOP. this is the same on every template
	if( have_posts() ): 
		while( have_posts() ): the_post(); ?>
	
	<section <?php post_class(); ?>>
		<div class="hero-image">
			<?php the_post_thumbnail( 'large' ); ?>
			<h2 class="piece-title"><?php the_title(); ?></h2>
			
			<?php oct_field_list('Year', 'year'); ?>

			<?php oct_field_list('Client', 'client'); ?>

			<?php oct_field_list('Role', 'your-role'); ?>

		</div>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

		<?php 
		//only show the solution if the custom field has a value
		$solution = get_field('solution'); 
		if($solution): ?>
		<div class="solution">
			<h2>Solution:</h2>
			<?php 
			//ACF
			the_field('solution'); ?>
		</div>
		<?php endif; //there is a solution ?>


		<?php 
		//show all the skills used on this portfolio piece
		the_terms( 
			$post->ID, 
			'skill', 
			'<div class="skills"><h3>Skills</h3>',
			'<br>',
			'</div>' 
			); ?>

	</section><!-- end of case study -->

	

<?php 
	endwhile;
?>
	<section class="pagination">
		<?php previous_post_link( '%link', '&larr; %title' );  //one older post ?>
		<?php next_post_link( '%link', '%title &rarr;' );  //one newer post ?>
	</section>


<?php
else:
	echo 'Sorry, no posts found';	
endif; 
?>
</main>
<!-- end #content -->


<?php get_footer(); //include footer.php ?>