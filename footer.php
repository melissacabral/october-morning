</div>
	<!-- end .wrapper -->

	<footer class="footer contentinfo">
		<div class="footer-widgets">
			<?php dynamic_sidebar( 'Footer Area' ); ?>
		</div>



		<small>
			<a href="#top">top</a>
			&copy; 2017 by <?php bloginfo( 'name' ); ?>. All Rights Reserved.
		</small>
	</footer>
	
<?php wp_footer(); //HOOK. Required for the admin bar and plugins to work ?>
</body>
</html>