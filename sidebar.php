<aside class="sidebar">
	<?php if( ! dynamic_sidebar( 'Blog Sidebar' ) ): ?>
	<section id="categories" class="widget">
		<h3 class="widget-title"> Categories </h3>
		<ul>
			<?php wp_list_categories( array(
				'title_li' 		=> '',
				'show_count' 	=> 1,
				'orderby' 		=> 'count',
				'order'			=> 'DESC',
				'number'		=> 15,
				) ); ?>
		</ul>
	</section>
	<section id="archives" class="widget">
		<h3 class="widget-title"> Archives </h3>
		<ul>
			<?php wp_get_archives( array(
				'type' 				=> 'yearly',
				'show_post_count' 	=> 1,
				) ); ?>
		</ul>
	</section>
	<section id="tags" class="widget">
		<h3 class="widget-title"> Tags </h3>
		
		<?php 
		//make all the tags the same size
		wp_tag_cloud( array(
			'smallest' 	=> 1,
			'largest' 	=> 1,
			'unit' 		=> 'em',
			'format' 	=> 'list',
			'number' 	=> 20,
		) ); ?>

	</section>
	<section id="meta" class="widget">
		<h3 class="widget-title"> Meta </h3>
		<ul>
			<?php wp_register(); //show register or view admin or nothing ?>
			<li><?php wp_loginout(); ?></li>
		</ul>
	</section>
<?php endif; //there are no widgets ?>
</aside><!-- end #sidebar -->