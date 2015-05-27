<?php

/* Encolamos estilos y scrips
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_set_styles_js() {
		
		// Hoja estilo principal
	    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	    // Google Fonts
	    wp_register_style('avenir', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,700');
	    wp_enqueue_style('avenir');

	    
	    wp_register_style('lora', 'http://fonts.googleapis.com/css?family=Lora');
	    wp_enqueue_style('lora');
	    
	    
	    // Insertamos jQuery
	    wp_enqueue_script('jquery');
	    
	    
	    // Insertamos script Easing
		wp_register_script( 'easings',  get_bloginfo('template_directory') . '/js/libs/jquery.easing.1.3.js', false, null, true);
		wp_enqueue_script('easings');


		// Vinclulamos script de Slick
			wp_register_script( 'slick-script',  get_bloginfo('template_directory') . '/js/min/slick.min.js', false, null, true);
			wp_enqueue_script('slick-script');

    	
    	// Insertamos script Principal
		wp_register_script( 'main-script',  get_bloginfo('template_directory') . '/js/main.js', false, null, true);
		wp_enqueue_script('main-script');


	}

	add_action( 'wp_enqueue_scripts', 'byadr_set_styles_js' );




/* Setup inicial
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_theme_setup(){
		// Compatibilidad HTML5 
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		
		// Post Thumbnails
		add_theme_support( 'post-thumbnails' ); 

		add_image_size( 'blog', 300, 260, true );

		add_image_size( 'slide1', 540, 450, true );

		add_image_size( 'slide-pais', 800, 360, true );

		// Custom Header
		$defaults = array(
			'default-image'          => get_template_directory_uri() . '/images/bghome.jpg',
			'random-default'         => false,
			'width'                  => 1400,
			'height'                 => 600,
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => false,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);

		add_theme_support( 'custom-header', $defaults );

		// Content Width
		if ( ! isset( $content_width ) ) {
			$content_width = 960;
		}


		// Excerpt
		add_post_type_support( 'page', 'excerpt' );

	}

	add_action( 'after_setup_theme', 'byadr_theme_setup' );




/* Imágenes Internas
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function filter_ptags_on_images($content) {
	  return preg_replace('/<p[^>]*>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\/p>/', '<figure>$1</figure>', $content);
	}
	add_filter('the_content', 'filter_ptags_on_images');




/* Menus
–––––––––––––––––––––––––––––––––––––––––––––––––– */

	function byadr_register_menus() {

	    register_nav_menus(
		    array(
		      'main-menu'	=>	__( 'Menu Principal', 'byadr' ),
		      'footer-menu'	=>	__( 'Footer Menu', 'byadr' ),
		      'social-menu'	=>	__( 'Social Menu', 'byadr' ),
		      'second-menu'	=>	__( 'Secondary Menu', 'byadr' ),
		      'paises-menu'	=>	__( 'Paises Menu', 'byadr' ),
		      'mobile-menu'	=>	__( 'Mobile Menu', 'byadr' )
		    )
		);

	}

	add_action( 'init', 'byadr_register_menus' );



/* limitar cantidad de palabras en el excerpt
–––––––––––––––––––––––––––––––––––––––––––––––––– */

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}







