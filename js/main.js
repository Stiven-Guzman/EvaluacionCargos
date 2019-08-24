//esta funcion es para dar estilos al select de busquedas
$(".chosen-select").chosen({disable_search_threshold: 10});

/*************************** Funcion de menu ***************************/
$(document).ready(function() {
	$('.menu li:has(ul)').click(function(e) {
		/* Act on the event */
		e.preventDefault();

		if ($(this).hasClass('activado')) {
			$(this).removeClass('activado');
			$(this).children('ul').slideUp();
		}
		else
		{
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
			$(this).addClass('activado');
			$(this).children('ul').slideDown();
		}
	});

	$('.btn-menu').click(function() {
		/* Act on the event */
		$('.contenedor-menu .menu').slideToggle();
	});

	$(window).resize(function() {
		/* Act on the event */
		if ($(document).width() > 450) {
			$('.contenedor-menu .menu').css({'display':'block'});
		}

		if ($(document).width() < 450) {
			$('.contenedor-menu .menu').css({'display':'none'});
			$('.menu li ul').slideUp();
			$('.menu li').removeClass('activado');
		}
	});

	$(".menu li ul li a").click(function() {
//	  window.location.href = $(this).attr("href");
	    var url = $(this).attr('href');
	    $('#iframe').attr('src', url);
//	    $('#iframe').reload();
	});		

});

