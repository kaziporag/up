(function($) {

    "use strict";

    //Hide Loading Box (Preloader)
    function handlePreloader() {
        if ($('.preloader').length) {
            $('.preloader').delay(200).fadeOut(500);
        }
    }

    //Update Header Style and Scroll to Top
    function headerStyle() {
        if ($('.usland-header').length) {
            var windowpos = $(window).scrollTop();
            var siteHeader = $('.usland-header');
            var scrollLink = $('.scroll-top');
            if (windowpos >= 200) {
                siteHeader.addClass('fixed-header');
                scrollLink.fadeIn(300);
            } else {
                siteHeader.removeClass('fixed-header');
                scrollLink.fadeOut(300);
            }
        }
    }

    headerStyle();

    //Submenu Dropdown Toggle
    if ($('.usland-header li.menu-item-has-children ul').length) {
        $('.usland-header li.menu-item-has-children').append('<div class="dropdown-btn"><i class="fa fa-angle-down"></i></div>');

        //Dropdown Button
        $('.usland-header li.menu-item-has-children .dropdown-btn').on('click', function() {
            $(this).prev('ul').slideToggle(500);
        });
    }

    //Make Content Sticky
    if ($('.sticky-box').length) {
        var a = new StickySidebar('.sidebar-page-container .sidebar-side .sidebar .inner', {
            topSpacing: 80,
            bottomSpacing: 0,
            containerSelector: '.sticky-container',
            innerWrapperSelector: '.sticky-box'
        });
    }

    // Offcanvas Nav Js
    var $offCanvasNav = $('.mobile-menu-items'),
    $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu');

    /*Add Toggle Button With Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.parent().prepend('<span class="mobile-menu-expand"></span>');

    /*Close Off Canvas Sub Menu*/
    $offCanvasNavSubMenu.slideUp();

    /*Category Sub Menu Toggle*/
    $offCanvasNav.on('click', 'li a, li .mobile-menu-expand, li .menu-title', function(e) {
        var $this = $(this);
        if($this.parent().attr('class')){
            if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('mobile-menu-expand'))) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('current-menu-item');
                    $this.siblings('ul').slideUp();
                } else {
                    $this.parent('li').addClass('current-menu-item');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.closest('li').siblings('li').removeClass('current-menu-item');
                    $this.siblings('ul').slideDown();
                }
            }
        }
    });

    $( ".sub-menu" ).parent( "li" ).addClass( "menu-item-has-children" );

    //Custom Seclect Box
    if ($('.custom-select-box').length) {
        $('.custom-select-box').selectmenu().selectmenu('menuWidget').addClass('overflow');
    }

    //Gallery Filters
    if ($('.filter-list').length) {
        $('.filter-list').mixItUp({});
    }

    //Fact Counter + Text Count
    if ($('.count-box').length) {
        $('.count-box').appear(function() {

            var $t = $(this),
                n = $t.find(".count-text").attr("data-stop"),
                r = parseInt($t.find(".count-text").attr("data-speed"), 10);

            if (!$t.hasClass("counted")) {
                $t.addClass("counted");
                $({
                    countNum: $t.find(".count-text").text()
                }).animate({
                    countNum: n
                }, {
                    duration: r,
                    easing: "linear",
                    step: function() {
                        $t.find(".count-text").text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $t.find(".count-text").text(this.countNum);
                    }
                });
            }

        }, { accY: 0 });
    }

    // Elementor frontend support
    if ($('.count-box')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/usland-counter.default', function($scope, $) {
                if ($('.count-box').length) {
                    $('.count-box').appear(function() {

                        var $t = $(this),
                            n = $t.find(".count-text").attr("data-stop"),
                            r = parseInt($t.find(".count-text").attr("data-speed"), 10);

                        if (!$t.hasClass("counted")) {
                            $t.addClass("counted");
                            $({
                                countNum: $t.find(".count-text").text()
                            }).animate({
                                countNum: n
                            }, {
                                duration: r,
                                easing: "linear",
                                step: function() {
                                    $t.find(".count-text").text(Math.floor(this.countNum));
                                },
                                complete: function() {
                                    $t.find(".count-text").text(this.countNum);
                                }
                            });
                        }

                    }, { accY: 0 });
                }
            });
        });
    }

    // Single Item Carousel
    if ($('.single-item-carousel').length) {
        $('.single-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            accessibility: false,
            arrows: true,
        });
    }

    // Testimonial Carousel
    if ($('.testimonial-carousel').length) {
        $('.testimonial-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 2,
            slidesToScroll: 1,
            accessibility: false,
            arrows: false,
            responsive: [{
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    }

    // Elementor frontend support
    if ($('.testimonial-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/testimonial.default', function($scope, $) {
                $scope.find(".testimonial-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 1500,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Two Item Carousel
    if ($('.two-item-carousel').length) {
        $('.two-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 2,
            slidesToScroll: 1,
            accessibility: false,
            arrows: false,
            responsive: [{
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    }

    //Three Item Carousel
    if ($('.three-item-carousel').length) {
        $('.three-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 3,
            slidesToScroll: 1,
            accessibility: false,
            arrows: false,
            responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
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
    }

    // Four Item Carousel
    if ($('.four-item-carousel').length) {
        $('.four-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 4,
            slidesToScroll: 1,
            accessibility: false,
            arrows: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
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
    }

    // Elementor frontend support
    if ($('.two-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/team.default', function($scope, $) {
                $scope.find(".two-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Elementor frontend support
    if ($('.three-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/team.default', function($scope, $) {
                $scope.find(".three-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Elementor frontend support
    if ($('.four-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/team.default', function($scope, $) {
                $scope.find(".four-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Two Property Carousel
    if ($('.property-two-item-carousel').length) {
        $('.property-two-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 2,
            slidesToScroll: 1,
            accessibility: false,
            responsive: [{
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    }

    //Three Property Carousel
    if ($('.property-three-item-carousel').length) {
        $('.property-three-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 3,
            slidesToScroll: 1,
            accessibility: false,
            responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
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
    }

    // Four Property Carousel
    if ($('.property-four-item-carousel').length) {
        $('.property-four-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 4,
            slidesToScroll: 1,
            accessibility: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
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
    }

    // Elementor frontend support
    if ($('.property-two-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/property.default', function($scope, $) {
                $scope.find(".property-two-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Elementor frontend support
    if ($('.property-three-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/property.default', function($scope, $) {
                $scope.find(".property-three-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Elementor frontend support
    if ($('.property-four-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/property.default', function($scope, $) {
                $scope.find(".property-four-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Two Blog Carousel
    if ($('.blog-two-item-carousel').length) {
        $('.blog-two-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 2,
            slidesToScroll: 1,
            accessibility: false,
            responsive: [{
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    }

    //Three Blog Carousel
    if ($('.blog-three-item-carousel').length) {
        $('.blog-three-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 3,
            slidesToScroll: 1,
            accessibility: false,
            responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
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
    }

    // Four Blog Carousel
    if ($('.blog-four-item-carousel').length) {
        $('.blog-four-item-carousel').slick({
            autoplay: true,
            infinite: true,
            speed: 1500,
            slidesToShow: 4,
            slidesToScroll: 1,
            accessibility: false,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
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
    }

    // Elementor frontend support
    if ($('.blog-two-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/blog.default', function($scope, $) {
                $scope.find(".blog-two-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Elementor frontend support
    if ($('.blog-three-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/blog.default', function($scope, $) {
                $scope.find(".blog-three-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                });
            });
        });
    }

    // Elementor frontend support
    if ($('.blog-four-item-carousel')) {
        $(window).on('elementor/frontend/init', function() {
            elementorFrontend.hooks.addAction('frontend/element_ready/blog.default', function($scope, $) {
                $scope.find(".blog-four-item-carousel").not('.slick-initialized').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                });
            });
        });
    }

    //LightBox / Fancybox
    if ($('.lightbox-image').length) {
        $('.lightbox-image').fancybox({
            openEffect: 'fade',
            closeEffect: 'fade',
            helpers: {
                media: {}
            }
        });
    }

    // Scroll to a Specific Div
    if ($('.scroll-target').length) {
        $(".scroll-target").on('click', function() {
            var target = $(this).attr('data-target');
            // animate
            $('html, body').animate({
                scrollTop: $(target).offset().top
            }, 1500);

        });
    }

    // Elements Animation
    if ($('.wow').length) {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }

    /* ==========================================================================
       When document is Scrollig, do
       ========================================================================== */

    $(window).on('scroll', function() {
        headerStyle();
    });

    /* ==========================================================================
       When document is loading, do
       ========================================================================== */

    $(window).on('load', function() {
        handlePreloader();
    });
})(window.jQuery);