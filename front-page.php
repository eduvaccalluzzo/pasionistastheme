<?php get_header(); ?>

<!-- Seccion Slider -->



<?php  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( ), 'full'); ?>

<section class="hero" style="background-image: url(<?php if(has_post_thumbnail() ) { echo $thumb[0]; } else{header_image();}?> );">
	
	<?php 

	$claim = get_field('claim');
	$direccion = get_field('direccion');
	
	?>

	<div class="wrapper"> 
		<div class="claim"> 

			<h2> <?php the_title(  ); ?> </h2>
			
				<?php if($claim): ?>
					<h4 class="subclaim">
						<?php echo $claim; ?>
					</h4>
				<?php endif; ?>
		</div>


		<?php // Menu Secundario ?>
		
		<nav class="secondNav">
			<?php wp_nav_menu( 
				array( 
					'theme_location' => 'second-menu',
					'container' => false
				) 
			); ?>
		</nav>

	</div>

</section>



<!-- Article -->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php 
	
	$titulo = get_field('titulo_h1');
	$subtitulo = get_field('subtitulo_h3');
	$logozona = get_field('logo_zona');

 	?>

	<article class="main">
		<div class="wrapper">

			<?php if($logozona): ?>
				<div class="logo-article">
					<img src="<?php echo $logozona['url']; ?>" alt="<?php echo $logozona['alt']; ?>"></img>
				</div>
			<?php endif; ?>
			

			<?php if($titulo): ?>
				<h1> <?php echo $titulo; ?> </h1>
			<?php endif; ?>

			<?php if($subtitulo): ?>
				<h3> <?php echo $subtitulo; ?> </h3>
			<?php endif; ?>


			<?php the_content(); ?>
		</div>
	</article>


<?php endwhile; else: ?>
<!-- no posts found -->
<?php _e( 'No se han encontrado entradas', 'byadr' ); ?>


<?php endif; ?>




<!-- Seccion Parroquias -->

<?php get_template_part( 'content' , 'parroquias' ); ?> 




<!-- Seccion Noticias -->

<?php 

	$arg = array (
		'post_per_page' => 3,
		'post_type' => 'post',
		'order' => 'ASC',
	);


	$querythumb = new WP_Query( $arg );

?>

<?php  if ($querythumb->have_posts() ) : ?>

<section id="s_noticias" class="noticias clearfix">	

		<h4 class="h1">Noticias Pasionistas España</h4>

	

		<div class="clearfix noticias-container">


				<?php while ($querythumb->have_posts() ) : $querythumb->the_post(); ?>


		
				
				
				<div class="column col-5 imgzone">

						<div class="img-area2 visible-web">
							<?php the_post_thumbnail( 'blog' ); ?> 
						</div>
						<div class="img-area2 visible-phone">
							<?php the_post_thumbnail( 'full' ); ?> 
						</div>

						<a href="<?php the_permalink(); ?>">	
							<div class="text-center">
								<h5><?php the_title(); ?></h5>
								<p><?php echo excerpt(15); ?></p>
							</div>
						</a>
				</div>
		

		<?php endwhile; ?>
	</div>
</section>

	<?php endif; ?>
	<?php wp_reset_query(); ?>




















<?php get_footer(); ?>




