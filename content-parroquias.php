

<section id="s_parroquias">

	<h4 class="h1">Nuestras Parroquias en España</h4>
	
	<?php 
		$args = array(
	        'post_type' => 'parroquias',
	        'orderby' => 'rand',
	        'nopaging' 	=> true,
	    );
	     
	    $my_query = new WP_Query( $args );
	?>	
	
	<div class="carouselParroquias">
	
	<?php while( $my_query->have_posts() ): $my_query->the_post(); ?>
		
		<?php 

	$direccion = get_field('direccion');
	
	?>	

		<div class="fichaParroquia">
			<a href="<?php the_permalink(); ?>">
							
				<div class="imgParroquia slider1">
					<?php the_post_thumbnail( 'blog' ); ?>
				</div>

				<div class="imgParroquia slider2">
					<?php the_post_thumbnail( 'slide1' ); ?>
				</div>

				
				<div class="datosParroquia ">
					<h5><?php the_title( ); ?></h5>
					
					<?php if($direccion): ?>
						<h6 class="direccion">
							<?php echo $direccion; ?>
						</h6>
					<?php endif; ?>
				</div>
			</a>
		</div>

		<?php endwhile; ?>
		<?php wp_reset_query();?>

	</div>

</section>