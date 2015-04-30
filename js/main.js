jQuery(function($){


var documento = $(document);
var ventana = $(window);
 


 /* Menu Secundario Anclas
 –––––––––––––––––––––––––––––––––––––––––––––––––– */
	
	$('li.ancla a').on('click',byadr_moverancla);

	function byadr_moverancla(event) {

		event.preventDefault();

		var destinoancla = $(this).attr('href');

		var posiciondestino = $(destinoancla).offset().top;

		$('html , body').stop().animate({scrollTop:posiciondestino}, 2400, 'easeInOutCubic');

	}




 /* Slick slider & Carousel
 –––––––––––––––––––––––––––––––––––––––––––––––––– */

	documento.ready(function(){
		$('.carouselParroquias').slick({
			centerMode: true,
			centerPadding: '80px',
			pauseOnHover: false,

			slidesToShow: 7,
			slidesToScroll: 1,

			autoplay: true,
			autoplaySpeed: 1500,

			arrows: false,
			draggable: false,

			
			responsive: [
		    {
			    breakpoint: 1450,
				settings: {
					slidesToShow: 5,
				}
		    },
		    {
			    breakpoint: 1200,
				settings: {
					slidesToShow: 3,
				}
		    },
		    {
			    breakpoint: 650,
				settings: {
					slidesToShow: 1,
				}
		    }/* ,
		    {
			   breakpoint: 400,
				settings: {
					centerMode: false,
				}
		    }*/
		    
		    ]
		});

	});







/* Menu Mobile
–––––––––––––––––––––––––––––––––––––––––––––––––– */


$('.mobileNav').on('click',byadr_mostrar_menu_responsive);

function byadr_mostrar_menu_responsive () {
  $('.mobileNav .menu-menu-principal-container').toggleClass('right_ok');

}

















});