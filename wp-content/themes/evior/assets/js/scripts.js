(function($) {
    "use strict";

		jQuery(document).ready(function ($) {
			
			function rtl_slick(){
				if ($('body').hasClass("rtl")) {
				   return true;
				} else {
				   return false;
			}}
			

		/* ----------------------------------------------------------- */
		/*  Slider
		/* ----------------------------------------------------------- */
		
		$('.related-slidelistt').slick({
			
			infinite: true,
			fade: false,
			dots: false,
			arrows: false,
			autoplay: false,
			slidesToShow: 4,
			slidesToScroll: 4,
			rtl: rtl_slick(),

			prevArrow: '<div class="slide-arrow-left"><i class="fas fa-long-arrow-alt-left"></i></div>',
			nextArrow: '<div class="slide-arrow-right"><i class="fas fa-long-arrow-alt-right"></i></div>',
			
			responsive: [
				{
				  breakpoint: 1500,
				  settings: {
					slidesToShow: 4,
					slidesToScroll: 4,
				  }
				},
				
				{
				  breakpoint: 1024,
				  settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				  }
				},
				
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				  }
				}

		]
						

			 });

		});

	
		/* ----------------------------------------------------------- */
		/*  Back to top
		/* ----------------------------------------------------------- */

		$(window).scroll(function () {
			if ($(this).scrollTop() > 300) {
				 $('.backto').fadeIn();
			} else {
				 $('.backto').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('.backto').on('click', function () {
			 $('.backto').tooltip('hide');
			 $('body,html').animate({
				  scrollTop: 0
			 }, 800);
			 return false;
		});
		
		$('.backto').tooltip('hide');
	
	
		jQuery('.mainmenu ul.theme-main-menu').slicknav({
            allowParentLinks: true,
			prependTo: '.evior-responsive-menu',
			closedSymbol: "&#8594",
			openedSymbol: "&#8595",
        });
		
		
		jQuery(window).load(function() {
			jQuery("#preloader").fadeOut();
		});
	
	
		/* ----------------------------------------------------------- */
		  /*  Video popup
		/* ----------------------------------------------------------- */

		  if ($('.video-play-btn').length > 0) {
		   $('.video-play-btn').magnificPopup({
			   type: 'iframe',
			   mainClass: 'mfp-with-zoom',
			   zoom: {
				   enabled: true, // By default it's false, so don't forget to enable it

				   duration: 300, // duration of the effect, in milliseconds
				   easing: 'ease-in-out', // CSS transition easing function

				   opener: function (openerElement) {
					   return openerElement.is('img') ? openerElement : openerElement.find('img');
				   }
			   }
		   });
		}


		if ($('.evior_video_post_Button').length > 0) {
		   $('.evior_video_post_Button').magnificPopup({
			   type: 'iframe',
			   mainClass: 'mfp-with-zoom',
			   zoom: {
				   enabled: true, // By default it's false, so don't forget to enable it

				   duration: 300, // duration of the effect, in milliseconds
				   easing: 'ease-in-out', // CSS transition easing function

				   opener: function (openerElement) {
					   return openerElement.is('img') ? openerElement : openerElement.find('img');
				   }
			   }
		   });
		}
	
	
	    /* ----------------------------------------------------------- */
		  /*  Search popup
		/* ----------------------------------------------------------- */
	
		$('.header_search_wrap .search_main > i').click(function () {
			$(".header_search_wrap .search_main > i").hide();
			$(".header_search_wrap .search_main span").show();
			$('.search_form_main').addClass('active-search');
			$('.search_form_main .search-field').focus();
		});
		$('.header_search_wrap .search_main span').click(function () {
			$(".header_search_wrap .search_main > i").show();
			$(".header_search_wrap .search_main span",).hide();
			$('.search_form_main').removeClass('active-search');
			$('.search_form_main .search-field').focus();
		});
		


		$(window).on('scroll', scrollFunction);
	    function scrollFunction() {
	        var target = $('#post-inner-holder');
	        
	        if ( target.length > 0 ) {
	            var contentHeight = target.outerHeight();
	            var documentScrollTop = $(document).scrollTop();
	            var targetScrollTop = target.offset().top;
	            var scrolled = documentScrollTop - targetScrollTop;
	            
	            if (0 <= scrolled) {
	                var scrolledPercentage = (scrolled / contentHeight) * 100;
	                if (scrolledPercentage >= 0 && scrolledPercentage <= 100) {
	                    scrolledPercentage = scrolledPercentage >= 90 ? 100 : scrolledPercentage;
	                    $("#eviorBar").css({
	                        width: scrolledPercentage + "%"
	                    });
	                }
	            } else {
	                $("#eviorBar").css({
	                    width: "0%"
	                });
	            }
	        }
	    }



	    /* ----------------------------------------------------------- */
			/*  Sticky Header
		/* ----------------------------------------------------------- */

	$(window).on("scroll", function () {
		
	
	if ( $( '#theme-header-three' ).hasClass( "stick-top" ) ) {
		
		if ($(window).scrollTop() > 200) {
            $(".theme-header-wrap-main").addClass("sticky animated slideInDown");
        } else {
            $(".theme-header-wrap-main").removeClass("sticky animated slideInDown");
        }	
	}
	
	
    });


		
	
	
})(jQuery);