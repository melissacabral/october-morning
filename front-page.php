<?php get_header('home'); //includes header-home.php ?>

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

	<?php //custom query to get 1 most recent portfolio piece
	$featured_work = new WP_Query( array(
		'post_type' 		=> 'portfolio_piece',
		'posts_per_page' 	=> 1,
	) ); 

	//custom "loop"
	if( $featured_work->have_posts() ):
	?>
	<section class="featured-work">
		<h2>Featured Work</h2>
		<?php while( $featured_work->have_posts() ): 
			$featured_work->the_post();
		?>
		<article <?php post_class(); ?>>
			<div class="hero-image">
			<h2 class="piece-title">
				<?php the_title(); ?>
			</h2>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'banner' ); ?>
			</a>
		</div>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div>
		</article>
		<?php endwhile; ?>

	</section>
	<?php endif; //end custom loop for featured work?>

	<section class="home-widgets">
		<?php //get all the portfolio_categories, 
		//and then get the most recent portfolio_piece in that category 
		$portfolio_cats = get_terms('portfolio_category');
		// echo '<pre>';
		// print_r($portfolio_cats);
		// echo '</pre>';

		foreach ($portfolio_cats as $cat) {
		?>
			<section class="one-category">
				<h2><?php echo $cat->name; ?></h2>

				<a href="<?php echo get_term_link( $cat );  ?>">

				<?php //custom query to get 1 piece of work in THIS term
				$one_piece = new WP_Query( array(
					'post_type' 		=> 'portfolio_piece',
					'posts_per_page' 	=> 1,
					'taxonomy'			=> 'portfolio_category',
					'term'				=> $cat->slug,
				) );

				if( $one_piece->have_posts() ):
					while( $one_piece->have_posts() ):
						$one_piece->the_post();

						the_post_thumbnail( 'medium' );

					endwhile;
				endif;
				?>
				</a>
			</section>
		<?php
		}
		?>
	</section>

</main>
<!-- end #content -->


<?php get_footer(); //include footer.php ?>