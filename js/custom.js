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
});
