<?php 

	$arg = array (
		'posts_per_page' => 3,
		'post_type' => 'post',
		'order' => 'DESC',
	);


	$querythumb = new WP_Query( $arg );

?>

<?php  if ($querythumb->have_posts() ) : ?>

<section id="s_noticias" class="noticias clearfix">	
 <div class="wrapper">

		<h4 class="h1">Noticias Pasionistas</h4>

	

		<div class="clearfix noticias-container">


				<?php while ($querythumb->have_posts() ) : $querythumb->the_post(); ?>


		
				
				
				<div class="column col-3 imgzone">
					<div class="noticia-colour">
							<div class="img-area2 visible-web">
								<?php the_post_thumbnail( 'blog' ); ?> 
							</div>
							
							<div class="img-area2 visible-phone">
								<?php the_post_thumbnail( 'slide1' ); ?> 
							</div>

							<a href="<?php the_permalink(); ?>">	
								<div class="text-center">

									<?php 
										$blog = get_blog_details();
							 		?>
										<div class="blog-color-<?php echo $blog->blog_id;?>">
											<div class="recuadro">
												<h5><?php the_title(); ?></h5>
												<p><?php echo excerpt(15); ?></p>
											</div>
										</div>
								</div>
							</a>
					</div>
				</div>
		

		<?php endwhile; ?>
	</div>
	</div>
</section>

	<?php endif; ?>
	<?php wp_reset_query(); ?>