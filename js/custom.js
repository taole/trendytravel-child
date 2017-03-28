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

    // product page gallery
    $('.list-gallery').slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: true,
         fade: false,
         asNavFor: '.slider-nav-thumbnails',
        adaptiveHeight: true
    });

    $('.slider-nav-thumbnails').slick({
         slidesToShow: 4,
         slidesToScroll: 1,
         asNavFor: '.list-gallery',
         dots: false,
        arrows:true,
        vertical: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    vertical:false
                }
            }
        ]
    });

    /* e: product gallery*/

    /* Travel guide tabs*/
    $('.guide-tabs li:first').addClass('active');
    $('.title-list h2:first').addClass('current');
    $('.tab-contents .tab-pane:first').addClass('current');

    $('.guide-tabs a').click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("active");
        $(this).parent().siblings().removeClass("active");
        var tab = $(this).attr("href");
        $(".tab-contents .tab-pane").not(tab).css("display", "none");
        $(".title-list h2").not(tab).css("display", "none");
        $(tab).fadeIn(1000);
    });
    /*end: product tabs*/

    /* Product tabs*/
    $('.product-tabs a').click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("active");
        $(this).parent().siblings().removeClass("active");
        var tab = $(this).attr("href");
        console.log(tab);
        $(".tab-contents .tab-pane").not(tab).css("display", "none");
        $(tab).fadeIn(1000);
    });

    $('.product-tabs li.itinerary a').click(function(event) {
        var trips = $('.selected-tour .tab-contents .overview .secondary-sidebar .tripcode').html();
        $('.selected-tour .tab-contents .itinerary .secondary-sidebar .tripcode').html(trips);
    });
    /*end: product tabs*/

    $('.find-a-tour .uform_title').click(function(){
        $(this).parents('.find-a-tour').toggleClass('open-form');
    });

    /* Register submit */
    // $('.register .woocommerce-Button').click(function(e) {
    //     e.preventDefault();
    //     var formData = {
    //         'email'             : $('input[name=email]').val(),
    //         'password'              : $('input[name=password]').val(),
    //         'confirm_password'    : $('input[name=confirm_password]').val(),
    //         'billing_first_name'    : $('input[name=billing_first_name]').val(),
    //         'billing_last_name'    : $('input[name=billing_last_name]').val(),
    //         'billing_phone'    : $('input[name=billing_phone]').val(),
    //         'billing_country'    : $('input[name=billing_country]').val(),
    //         'billing_address_1'    : $('input[name=billing_address_1]').val(),
    //         'billing_postcode'    : $('input[name=billing_postcode]').val(),
    //         'billing_city'    : $('input[name=billing_city]').val()
    //     };

    //     $.ajax({
    //         type        : 'POST', 
    //         url         : '', 
    //         data        : formData,
    //         dataType    : 'json', 
    //         encode      : true
    //     }).done(function(data) {
    //         console.log(data);
    //         if ( ! data.success) {
    //             if (data.errors.email) { $("#reg_email").addClass('error_input'); }
    //         } else {
    //             $('.register').submit();
    //         }

    //     });
    // });

    /* login */
    $('.modal .woocommerce .col2-set .col-2 h2').click(function(){
        $(this).parents('.col2-set').removeClass('login-open');
        $(this).parents('.col2-set').addClass('register-open');
        console.log('123');

    });
    $('.modal .woocommerce .col2-set .col-1 h2').click(function(){
        $(this).parents('.col2-set').removeClass('register-open');
        $(this).parents('.col2-set').addClass('login-open');
        console.log('456');

    });
    /* e: login */

    $('.frm_style_formidable-style.with_frm_style form fieldset .frm_checkbox label').change(function(){
        $(this).toggleClass('checked');
    });

    $('.frm_style_formidable-style.with_frm_style form fieldset .frm_radio label').change(function(){
        $(this).parents('.form-field').find('label').removeClass('checked');
        $(this).addClass('checked');
    });

    $('.frm_style_formidable-style.with_frm_style form fieldset .frm_last_half .form-field.custom-scroll .frm_opt_container').mCustomScrollbar();

    $('.tour-enquiry .frm_style_formidable-style.with_frm_style fieldset legend.frm_hidden').click(function(){
        $(this).parents('fieldset').toggleClass('open-form');
    });

    // only number
    $('.phone_only_number').on('keydown', 'input', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});

    /*login*/
    var validate= false;
    $('.login .woocommerce-Input').each(function(){
        if($(this).val() != '' || $(this).attr('checked'))
            validate = true;
    });
    if(!validate){
        $('.login .submit').addClass('fullcontent');
    }

    $('.login .woocommerce-Input').keypress(function(){
        var validate= false;
        var user = $('.login #username').val();
        var pass = $('.login #password').val();
        if(user && pass) {
            validate = true;
        }
        if(validate){
            $('.modal .woocommerce form.login .form-row .woocommerce-Button.button').addClass('showbtn');
        }
    });

    $('.register .woocommerce-Input').keypress(function(){
        console.log('input enter');
        var validate= false;

        var email = $('.register #reg_email').val();
        var pass = $('.register #reg_password').val();
        var repass = $('.register #confirm_password').val();
        var firstname = $('.register #billing_first_name').val();
        var lastname = $('.register #billing_last_name').val();
        var phone = $('.register #billing_phone').val();
        var country = $('.register #billing_country').val();
        var address = $('.register #billing_address_1').val();
        var code = $('.register #billing_postcode').val();
        var town = $('.register #billing_city').val();

        if(email && pass && repass && firstname && lastname && phone && country && address && code && town) {
            validate = true;
        }

        if(validate){
            $('.modal .woocommerce form.register .form-row .woocommerce-Button.button').addClass('showbtn');
        }
    });

   $('.category-tours ul.products li .text h2.title').tooltipster();
});
