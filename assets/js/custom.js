jQuery( document ).ready(function($) {
    if (typeof $ != "undefined") $(function ($) {

        //menu trigger
        $('#menu-trigger').click(function(){
            if($(this).hasClass('active')) $(this).removeClass('active');
            else $(this).addClass('active');
        });
    
        //cancel href for dropdown links
        $("#menu .dropdown > a").click(function () {
            return false;
        });
    
        //dropdown for mobile
        $('#menu .dropdown > a, #menu .dropdown > span').click(function () {
            if ($(this).parent().hasClass('open')) $(this).parent().removeClass('open');
            else{
                $(this).closest('ul').find('li.open').removeClass('open');
                $(this).parent().addClass('open');
            }
        });
    
        //blog carousel
        $('.popular-widget.owl-carousel').addClass('nav').owlCarousel({
            margin: 10, responsiveClass: true, loop: true, nav: true, dots: true,
            responsive:{ 0:{ items:1 }, 576:{ items:2 }, 768: { items: 3 }, 992:{ items:4, loop: false } }
        });
    
        //clients carousel
        $('.clients-carousel.owl-carousel').owlCarousel({
            margin: 30, responsiveClass: true, loop: true, nav: false, dots: false, autoplay: true, autoplayTimeout: 3000,
            responsive: { 0: { items: 2 }, 576: { items: 3 }, 768: { items: 5 }, 992: { items: 6 } }
        });
    
        //clients carousel
        $('.reviews-carousel .owl-carousel').addClass('nav').owlCarousel({
            margin: 0, responsiveClass: true, loop: true, nav: true, dots: false, autoplay: false, autoplayTimeout: 3000,
            responsive: { 0: { items: 1 } }
        });
    
    
    
    });
})