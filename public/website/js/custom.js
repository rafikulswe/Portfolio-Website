/*-----------------------------------------------------------------------
Theme Name       : Mr.Neil - Personal Portfolio Tamplate
Author           : Rakholiyatech
Version          : 1.0.0
Created          : February 2018
File Description : Main JS file of the template
--------------------------------------------------------------------------*
*/

! function($) {
    "use strict";

    var NeilApp = function() {};

    /*---------------------------
            STICKEY MENU
    -----------------------------*/
    NeilApp.prototype.initSticky = function() {
        $(window).on("scroll",function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 50) {
                $(".sticky").addClass("stickyadd");
            } else {
                $(".sticky").removeClass("stickyadd");
            }
        });
    },

    /*---------------------------
            OWLCAROUSEL
    -----------------------------*/
    NeilApp.prototype.initOwlCarousel = function() {
        $("#owl-demo").owlCarousel({
            items: 1,
            itemsDesktop: [1000, 1],
            itemsDesktopSmall: [768, 1],
            itemsTablet: [568, 1],
            lazyLoad: true,
            autoPlay: true,
            pagination: true,
            stopOnHover: true,
            navigation: false
        });
    },

    /*---------------------------
            MAGNIFICPOPUP
    -----------------------------*/
    NeilApp.prototype.initMPImages = function() {
        $('.mfp-image').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-fade',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
            }
        });
    },

    /*---------------------------
            PORTFOLIO FILTER
    -----------------------------*/
    NeilApp.prototype.initPortfolioFilter = function() {
        var $container = $('.projects-wrapper');
        var $filter = $('#filter');
        // Initialize isotope 
        $container.isotope({
            filter: '*',
            layoutMode: 'masonry',
            animationOptions: {
                duration: 750,
                easing: 'linear'
            }
        });
        // Filter items when filter link is clicked
        $filter.find('a').on("click", function() {
            var selector = $(this).attr('data-filter');
            $filter.find('a').removeClass('active');
            $(this).addClass('active');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    animationDuration: 750,
                    easing: 'linear',
                    queue: false,
                }
            });
            return false;
        });
    },

    /*---------------------------
            SMOOTH SCROLL
    -----------------------------*/
    NeilApp.prototype.initSmoothScrollMenu = function() {
        $('.navbar-nav a').on('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 0
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });
    },

    /*---------------------------
            SCROLLSPY
    -----------------------------*/
    NeilApp.prototype.initScrollspy = function() {
        $("#navbarCollapse").scrollspy({
            offset: 50
        });
    },

    /*---------------------------
            PRELOADER
    -----------------------------*/
    NeilApp.prototype.initPreloader = function() {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
        $('body').delay(350).css({
            'overflow': 'visible'
        });
    },

    NeilApp.prototype.init = function() {
        this.initSticky();
        this.initOwlCarousel();
        this.initMPImages();
        this.initPortfolioFilter();
        this.initSmoothScrollMenu();
        this.initScrollspy();
        this.initPreloader();
    },
    //init
    $.NeilApp = new NeilApp, $.NeilApp.Constructor = NeilApp
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.NeilApp.init();
}(window.jQuery);