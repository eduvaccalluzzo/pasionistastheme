<?php wp_footer(); ?>
<footer>

	<div class="wrapper">
		<div class="column col-4__3">
			<?php // Menu footer ?>
	
			<nav class="footerNav">
				<?php wp_nav_menu( 
					array( 
						'theme_location' => 'footer-menu',
						'container' => false
					) 
				); ?>
			</nav>
		</div>

		<div class="column col-4">
			
				<div class="logo-article">
					<div>Pasionistas</div>
				</div>
				
		
		</div>
	</div>

</footer>






























</body>

</html>