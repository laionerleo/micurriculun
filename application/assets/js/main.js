(function($) {
    "use strict";
    jQuery(document).ready(function($) {

        /*-------------------------------   
        BOOTSTARP SCROLLLSPY
        ---------------------------------*/
        $('body').scrollspy({
            target: '.navbar-collapse',
            offset: 95
        })
        /*-------------------------------
        SCROLL NAVIGATION
        ---------------------------------*/
        $('.scroll-down').on('click', function(e) {
            $("html, body").animate({
                scrollTop: 650
            }, 500);
            return false;
        });
        /*-------------------------------
        STICKY NAVIGATION
        ---------------------------------*/
        $(".header-area").sticky({
            topSpacing: 0
        });
        /*-------------------------------
        SCROLL TO TOP
        ---------------------------------*/
        $.scrollUp({
            scrollText: "<i class='fa fa-rocket'></i>",
            animation: 'fade'
        });
        /*-------------------------------
        Blog Carousel
        ---------------------------------*/
        $('.slider-area').owlCarousel({
            singleItem: true,
            pagination: false,
            autoPlay: true,
            transitionStyle: "fade"
        });
        /*-------------------------------
        VIDEO PLAYER HOME
        ---------------------------------*/
        $(".video-player").YTPlayer({
            videoURL: "https://www.youtube.com/watch?v=O5LmKx0CH2E",
            containment: '#video-container',
            mute: false,
            loop: true,
            startAt: 0,
            showControls: false
        });
        /*-------------------------------
        SMOOTH SCROLLING
        ---------------------------------*/
        $('li.smooth-menu a').on('click', function(e) {
            var $anchor = $(this);
            var headerH = '48';
            $('html,body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - headerH + "px"
            }, 1200, 'easeInOutExpo');
            event.preventDefault();
        });
        /*-------------------------------
    Skill Js
    ---------------------------------*/
        if (typeof($.fn.knob) != 'undefined') {
            $('.knob').each(function() {
                var $this = $(this),
                    knobVal = $this.attr('data-rel');
                $this.knob({
                    'draw': function() {
                        $(this.i).val(this.cv + '%')
                    }
                });
                $this.appear(function() {
                    $({
                        value: 0
                    })
                        .animate({
                            value: knobVal
                        }, {
                            duration: 2000,
                            easing: 'swing',
                            step: function() {
                                $this.val(Math.ceil(this.value)).trigger('change');
                            }
                        });
                }, {
                    accX: 0,
                    accY: -150
                });
            });
        }
        /*-------------------------------
        Blog Carousel
        ---------------------------------*/
        $('.carousel-blog').owlCarousel({
            singleItem: true,
            pagination: true,
            autoPlay: true,
            transitionStyle: "fade"
        });
        $('.home-banner').owlCarousel({
            singleItem: true,
            pagination: false,
            autoPlay: true,
            transitionStyle: "fade",
        });
        /*-------------------------------
        Riview Carousel
        ---------------------------------*/
        $('.review-wrap').owlCarousel({
            singleItem: true,
            pagination: true,
            autoPlay: false,
        });
        /*-------------------------------
        Typed Js
        ---------------------------------*/
        $(".element").typed({
            strings: ["Programador web", "programador android"],
            typeSpeed: -1,
            loop: true,
        });
        /*-------------------------------
        Brand Carousel
        ---------------------------------*/
        $('.brand-wrap').owlCarousel({
            items: 5,
            center: true,
            loop: true,
            pagination: false,
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]
        });
        /*-------------------------------
        Portfolio Isotope
        ---------------------------------*/
        $('.portfolio-menu li').on('click', function(e) {
            $(".portfolio-menu li").removeClass("active");
            $(this).addClass("active");
            var selector = $(this).attr('data-filter');
            $(".grid").isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });
            return false;
        });
        /*-------------------------------
        Masonary Portfolio
        ---------------------------------*/
        $('.grid').isotope({
            itemSelector: '.grid-item',
            resizesContainer: false,
            layoutMode: 'masonry',
        });

        /*-------------------------------
        Parallax Effect
        ---------------------------------*/
        $('.parallax-bg').parallax("50%", .1);
        $('.home-parallax').parallax("50%", .4);

        /*-------------------------------
        Counter Js
        ---------------------------------*/
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });

    jQuery(window).on('load', function() {
        $('#rx-resume-preloader-container').fadeOut('slow');
    });

}(jQuery));

//Google Map
var myCenter = new google.maps.LatLng(44.1946963, -102.4899473);
function initialize() {
    var mapProp = {
        center: myCenter,
        zoom: 5,
        scrollwheel: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("google-map"), mapProp);

    var marker = new google.maps.Marker({
        position: myCenter,
    });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

