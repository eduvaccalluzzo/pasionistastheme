<?php 
/*
 * Template Name: Pagina Zonas
*/ 
?>



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

	<article id="conoce-zonas" class="main">
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












<?php 

$var = get_blog_details(); 
	



if ($var->blog_id == 2):


?>



<!-- Seccion Parroquias -->

<?php get_template_part( 'content' , 'parroquias' ); ?> 






<?php else: ?>

<!-- Seccion Paises -->

<?php get_template_part( 'content' , 'paises' ); ?> 

<?php endif; ?>



<!-- Seccion Noticias -->

<?php get_template_part( 'content' , 'noticias' ); ?> 













<?php get_footer(); ?>




