<?php get_header(); ?>

<!-- Seccion Slider -->
	

	<?php 

		$t = get_term_by('slug', $term, 'paises');

	?>


	
	<?php 

	 $cabecera_pais = get_field('imagen_cabecera', $t);

	?>
	<!-- Article -->


<section class="hero" style="background-image: url(<?php if( $cabecera_pais ) { echo $cabecera_pais['url']; } else{header_image();}?> );">
	


	<?php 

	$claim_pais = get_field('claim_paises', $t);
	$titulo_pais = get_field('titulo_paises', $t);

	?>

	<div class="wrapper"> 
		<div class="claim"> 


				<?php if($titulo_pais): ?>
					<h2>
						<?php echo $titulo_pais; ?>
					</h2>
				<?php endif; ?>
			
			
				<?php if($claim_pais): ?>
					<h4 class="subclaim">
						<?php echo $claim_pais; ?>
					</h4>
				<?php endif; ?>
		</div>
	</div>

</section>


<!-- Article -->
	
	<?php 
	
	$contenido_pais = get_field('contenido_texto', $t);
	$logozona_pais = get_field('logo_imagen', $t);

 	?>

	<article class="main">
		<div class="wrapper">

			<?php if($logozona_pais): ?>
				<div class="logo-article">
					<img src="<?php echo $logozona_pais['url']; ?>" alt="<?php echo $logozona_pais['alt']; ?>"></img>
				</div>
			<?php endif; ?>
			

			<?php if($contenido_pais): ?>
				<?php echo $contenido_pais; ?>
			<?php endif; ?>

		</div>
	</article>

	



	




<!-- Seccion Parroquias -->

<?php get_template_part( 'content' , 'parroquias' ); ?> 




<!-- Seccion Noticias -->



<?php get_template_part( 'content' , 'noticias' ); ?> 




















<?php get_footer(); ?>




