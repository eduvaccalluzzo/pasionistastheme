



<section id="s_paises">
	<div class="wrapper">

	<h4 class="h1">Nuestros Paises en la zona</h4>




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

	

	$tax_terms = get_terms('paises');
	
//var_dump($tax_terms);
	?>

	<div class="carouselpaises">
	<?php foreach($tax_terms as $tax_term): ?>	

		<?php 
		$t = get_term_by('slug', $tax_term->slug, 'paises');
		$cabecera_pais = get_field('imagen_cabecera', $t); 
		$cab = $cabecera_pais['sizes'][ 'slide-pais' ];

		$claim_pais = get_field('claim_paises', $t);

		?>
		
		<div class="contain-paises">
		<a href="<?php echo $tax_term->taxonomy . '/' . $tax_term->slug; ?>">
			<div class="imgPaises"><img src="<?php echo $cab; ?>"></div>

			<div class="text-center zonal">


			<?php 
				$blog = get_blog_details();
			 ?>


				<div class="blog-color-<?php echo $blog->blog_id;?>">

					<h3><?php echo $tax_term->name; ?></h3>
					<p><?php echo $claim_pais; ?></p>
				</div>
			</div>

			
		</a>
		</div>


	<?php endforeach; ?>
	</div>


	
	



		
			<?php wp_reset_query();?>

	</div>

</section>