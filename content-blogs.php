<section id="s_paises">
	<div class="wrapper">

	<h4 class="h1">Nuestra Comunidad Pasionista</h4>




		<?php // Menu Paises ?>
		
		<nav class="paisesNav clearfix">
			<?php wp_nav_menu( 
				array( 
					'theme_location' => 'paises-menu',
					'container' => false
				) 
			); ?>
		</nav>


	


		<?php 

		$args = array(
		    'network_id' => $wpdb->siteid,
		    'public'     => null,
		    'archived'   => null,
		    'mature'     => null,
		    'spam'       => null,
		    'deleted'    => null,
		    'limit'      => 100,
		    'offset'     => 0,
		);



		$blogs = wp_get_sites($args); 

		unset($blogs[0]);
			//var_dump($blogs);


			//echo $blogs[1]['blog_id'];

			

		?>




		<div class="carouselpaises">
			<?php foreach($blogs as $blog): ?>

			
			<?php switch_to_blog($blog['blog_id']); ?>
		
			<div class="contain-paises">
			<a href="<?php echo $blog['path'] ;?>">
				<div class="imgPaises"><img src="<?php header_image(); ?>"></div>

				
				<div class="text-center zonal">
					<div class="blog-color-<?php echo $blog['blog_id'];?>">
						<h3><?php echo get_bloginfo('name'); ?></h3>
						<p><?php echo get_bloginfo('description'); ?></p>
					</div>
				</div>
			</a>	
			</div>

			<?php restore_current_blog(); ?>
		
			<?php endforeach; ?>

		</div>
			
			

			



 
</section>       















