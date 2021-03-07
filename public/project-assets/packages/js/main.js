
// search script

$(document).ready(function(){

	$(".search-wrapper").click(function(){

		$(".open-search").fadeIn(600);

	});

	$(".search-wrapper01").click(function(){

		$(".open-search").fadeOut(600);

	});

	 // fixed menu bar after scrooling

	$(document).on('scroll',function(){


		if($(this).scrollTop() > 47){

			$('.main-header').addClass('sticky');

		}else{

			$('.main-header').removeClass('sticky');
		}
		


	});
});


$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
  $('body').delay(350).css({'overflow':'visible'});
})