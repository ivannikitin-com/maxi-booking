jQuery(function($) {
	//**** TEMPLATE
	//menu trigger
	$("#menu-trigger").click(function() {
		if ($(this).hasClass("active")) $(this).removeClass("active");
		else $(this).addClass("active");
	});

	//add avtive for blog
	$('#navbar nav > ul > li > ul > li.active').parent().parent().addClass('active');

	//cancel href for dropdown links
	$("#menu .dropdown.menu-item-18 > a").click(function(){ return false; });

	//dropdown for mobile
	$("#menu .dropdown").prepend('<span class="arrow"></span>');
	$("#menu .dropdown > a, #menu .dropdown > span").click(function() {
		if ($(this).parent().hasClass("active"))
			$(this).parent().removeClass("active");
		else {
			$(this).closest("ul").find("li.active").removeClass("active");
			$(this).parent().addClass("active");
		}
	});


	//***** BLOG PAGE
	//blog carousel
	$(".popular-widget.owl-carousel")
		.addClass("nav")
		.owlCarousel({
			margin: 10,
			responsiveClass: true,
			loop: true,
			nav: true,
			dots: true,
			responsive: {
				0: { items: 1 },
				576: { items: 2 },
				768: { items: 3 },
				992: { items: 4, loop: false }
			}
		});

	//***** MAIN PAGE
	//main carousel
	var mainowl = $('.main-carousel.owl-carousel');
	mainowl.owlCarousel({
		margin: 10,
		center: true,
		loop: true,
		nav: false,
		dots: true,
		responsive: { 0: { items: 1 }, }
	});
	mainowl.on('changed.owl.carousel', function (event) {
		$('.page-main-slider .nav-car-ul > li').removeClass('active');
		$('.page-main-slider .nav-car-ul > li:nth-child(' + (event.page.index + 1) + ')').addClass('active');
	})
	
	//clients carousel
	$(".clients-carousel.owl-carousel").owlCarousel({
		margin: 30,
		responsiveClass: true,
		loop: true,
		nav: false,
		dots: false,
		autoplay: true,
		autoplayTimeout: 3000,
		responsive: {
			0: { items: 2 },
			576: { items: 3 },
			768: { items: 5 },
			992: { items: 6 }
		}
	});

	//reviews carousel (main page)
	$(".products.page-main .reviews-carousel .owl-carousel")
		.addClass("nav")
		.owlCarousel({
			margin: 0,
			responsiveClass: true,
			loop: true,
			nav: true,
			dots: false,
			autoplay: false,
			autoplayTimeout: 3000,
			autoHeight: false,
			responsive: { 0: { items: 1 } }
		});

	//reviews carousel (opt. bookings)
	$(".page.optimized-bookings .reviews-carousel .owl-carousel")
		.addClass("nav")
		.owlCarousel({
			margin: 0,
			responsiveClass: true,
			loop: true,
			nav: true,
			dots: false,
			autoplay: false,
			autoplayTimeout: 3000,
			autoHeight: true,
			responsive: { 0: { items: 1 } }
		});

	//***** PRODUCTS > SAJT DLYA OTELYA
	//clients carousel
	$(".template-links-slider.owl-carousel")
		.addClass("nav")
		.owlCarousel({
			margin: 0,
			responsiveClass: true,
			loop: true,
			nav: true,
			dots: true,
			responsive: { 0: { items: 1 } }
		});
	//clients carousel
	$(".site-tryfree.owl-carousel")
		.addClass("nav")
		.owlCarousel({
			margin: 0,
			responsiveClass: true,
			loop: true,
			nav: true,
			dots: false,
			autoplay: true,
			autoplayTimeout: 2000,
			responsive: { 0: { items: 1 } }
		});

	//***** PRODUCTS > MODUL PAGE
	//modul-top carousel
	$(".top-modul-carousel .owl-carousel")
		.addClass("fadeOut")
		.owlCarousel({
			animateOut: "fadeOut",
			margin: 0,
			responsiveClass: true,
			loop: true,
			nav: false,
			dots: true,
			autoplay: false,
			autoplayTimeout: 3000,
			responsive: { 0: { items: 1 } }
		});

	//modul-bottom carousel
	$(".bottom-modul-carousel .owl-carousel")
		.addClass("fadeOut")
		.owlCarousel({
			animateOut: "fadeOut",
			margin: 0,
			responsiveClass: true,
			loop: true,
			nav: false,
			dots: true,
			autoplay: false,
			autoplayTimeout: 3000,
			responsive: { 0: { items: 1 } }
		});

	//modul-form
	$("#cnt-btn4").click(function() {
		var cl = $(this).attr("class");
		if (cl === "active-btn") {
			$("#cnt-btn4").removeClass("active-btn");
			$("#input-cnt-btn4").removeClass("active-btn");
		} else {
			$("#cnt-btn3").addClass("active-btn");
			$("#cnt-btn4").addClass("active-btn");
			$("#input-cnt-btn4").addClass("active-btn");
			$("#input-cnt-btn3").addClass("active-btn");
		}
	});
	$("#cnt-btn3").click(function() {
		var cl = $(this).attr("class");
		if (cl === "active-btn") {
			$("#cnt-btn3").removeClass("active-btn");
			$("#cnt-btn4").removeClass("active-btn");
			$("#input-cnt-btn3").removeClass("active-btn");
			$("#input-cnt-btn4").removeClass("active-btn");
		} else {
			$("#cnt-btn3").addClass("active-btn");
			$("#input-cnt-btn3").addClass("active-btn");
		}
	});
	$("#cnt-btn1").click(function() {
		var cl = $(this).attr("class");
		if (cl === "active-btn") {
			$("#cnt-btn1").removeClass("active-btn");
			$("#input-cnt-btn1").removeClass("active-btn");
		} else {
			$("#cnt-btn1").addClass("active-btn");
			$("#input-cnt-btn1").addClass("active-btn");
		}
	});
	$("#cnt-btn2").click(function() {
		var cl = $(this).attr("class");
		if (cl === "active-btn") {
			$("#cnt-btn2").removeClass("active-btn");
			$("#input-cnt-btn2").removeClass("active-btn");
		} else {
			$("#cnt-btn2").addClass("active-btn");
			$("#input-cnt-btn2").addClass("active-btn");
		}
	});
});
