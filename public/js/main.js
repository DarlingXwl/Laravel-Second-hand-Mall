

(function($) {
    "use strict";

  $(window).on('scroll',function() {    
   var scroll = $(window).scrollTop();
   if (scroll < 245) {
    $(".header-middle").removeClass("scroll-header");
   }else{
    $(".header-middle").addClass("scroll-header");
   }
  });
    $('#mobile-menu-active').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu-area .mobile-menu",
    });	
	
	

	$(".icon-search,.icon-nav ").on("click", function(){
		$(this).parent().find('.toogle-content').slideToggle('medium');
	})
	
	
	$('.popup-link').magnificPopup({
	  type: 'image',
	  gallery:{
			enabled:true
		}
	});	
	
	$('.product-carousel').owlCarousel({
		loop:false,
		nav:true,
		navText:['<i class="fa fa-long-arrow-left"></i>','<i class="fa fa-long-arrow-right"></i>'],
		responsive:{
			0:{
				items:1
			},
			767:{
				items:2
			},
			1000:{
				items:3
			},
			1200:{
				items:4
			}
		}
	})

$('#mainSlider').nivoSlider({

	directionNav: true,
	animSpeed: 2000,
	slices: 18,
	pauseTime: 3000,
	pauseOnHover: false,
	controlNav: true,
	manualAdvance: true,
	prevText: '<i class="fa fa-long-arrow-left nivo-prev-icon"></i>',
	nextText: '<i class="fa fa-long-arrow-right nivo-next-icon"></i>'
});	

	 
    jQuery('nav#dropdown').meanmenu();


    $('[data-toggle="tooltip"]').tooltip();

})(jQuery);

