<article <?php post_class(); ?>>
	<h2 class="entry-title"> 			
		<?php the_title(); ?> 			
	</h2>

	<?php the_post_thumbnail( 'large' ) ?>

	<div class="entry-content">
		<?php the_content(); //full post body ?>
		<?php wp_link_pages( array(
			'before' => '<div class="post-pagination">Keep Reading this Post:',
			'after' 		=> '</div>',
			'next_or_number' => 'number',
			) ); ?>
		</div>

</article>
<!-- end .post -->