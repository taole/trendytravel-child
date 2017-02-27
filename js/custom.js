jQuery(document).ready(function($){
	$('.dt-menu-toggle').click(function(){
		$('#header').toggleClass("menu-open");
	})

	var scrollBtn = $('.scroll-down'),
	    findTour = $('.find-a-tour');
	 $(scrollBtn).bind('click',function(event) {
	 	/* Act on the event */
	 	event.preventDefault();
	 	$('html, body').animate({
            scrollTop: findTour.offset().top
        }, 500);
	});

	$('.tablist a').click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        console.log(tab);
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn(1000);
    });

    $('.slick-travel .container').slick({
		dots: false,
                infinite: false,
                speed: 110,
                slidesToShow: 4,
                slidesToScroll: 4,
                arrow:false,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 1299,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            infinite: false,
                            dots: false,
                            centerMode:false
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                            infinite: false,
                            dots: false,
                            centerMode: false
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            centerMode: false,
                            infinite: false,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 639,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: false,
                            infinite: false,
                            dots: false
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
	});
});
