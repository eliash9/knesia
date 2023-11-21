/* ---------------------------------------------
 javaScript Document
 --------------------------------------------- */
$(document).ready(function () {
    "use strict";

    /* ---------------------------------------------
     Navbar sticky
     --------------------------------------------- */
    var windows = $(window);
    var stick = $(".header-sticky");
    windows.on('scroll', function () {
        var scroll = windows.scrollTop();
        if (scroll < 245) {
            stick.removeClass("sticky");
        } else {
            stick.addClass("sticky");
        }
    });
    $('#news-feed-carousel').owlCarousel({
        items: 1,
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa pe-7s-angle-left'></i>", "<i class='fa pe-7s-angle-right'></i>"],

        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });

    $('#content-slide').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa pe-7s-angle-left'></i>", "<i class='fa pe-7s-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    });
    $('#content-slide-2').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa pe-7s-angle-left'></i>", "<i class='fa pe-7s-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('#content-slide-3').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa pe-7s-angle-left'></i>", "<i class='fa pe-7s-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('#content-slide-4').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        margin: 2,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
    $('#content-slide-5').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa pe-7s-angle-left'></i>", "<i class='fa pe-7s-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('#video-slide').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ["<i class='fa pe-7s-angle-left'></i>", "<i class='fa pe-7s-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('#widget-slider').owlCarousel({
        loop: true,
        dots: true,
        nav: false,
        items: 1
    });
    /* ---------------------------------------------
     Theia Sticky Sidebar
     --------------------------------------------- */
    $('.leftSidebar, .theiaContent, .rightSidebar')
            .theiaStickySidebar({

            });

    /* ---------------------------------------------
     Video Effect
     --------------------------------------------- */

    $(".post-thumb").mouseenter(function () {
        $(this).addClass("hover");
    })
            // handle the mouseleave functionality
            .mouseleave(function () {
                $(this).removeClass("hover");
            });

    $(".img-thumb").mouseenter(function () {
        $(this).addClass("hover");
    })
            // handle the mouseleave functionality
            .mouseleave(function () {
                $(this).removeClass("hover");
            });
    /* ---------------------------------------------
     Scroll to Top Button it is called for scrolling down to top at html
     --------------------------------------------- */
    //back to top
    $('body').append('<div id="toTop" class="btn btn-top"><span class="pe-7s-angle-up"></span></div>');
    $(window).scroll(function () {
        if ($(this).scrollTop() !== 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').on('click', function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });
    /* ---------------------------------------------
     Side Menu
     --------------------------------------------- */
    $('.side-menu').metisMenu();

    /* ---------------------------------------------
     Pre loader loader 
     --------------------------------------------- */

    $(".se-pre-con").fadeOut("slow");

    /* ---------------------------------------------
     WOW js animation
     --------------------------------------------- */
    new WOW().init();

    /* ---------------------------------------------
     newstricker
     --------------------------------------------- */
    $('.newsticker').newsTicker({
        row_height: 12,
        max_rows: 2,
        speed: 600,
        direction: 'up',
        duration: 4000,
        autostart: 1,
        pauseOnHover: 0,
        prevButton: $('#prev-button'),
        nextButton: $('#next-button'),
        stopButton: $('#stop-button'),
        startButton: $('#start-button')
    });
    /* ---------------------------------------------
     Tab
     --------------------------------------------- */
    $('.tab-inner ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
    $('.tab-inner ul.tabs li a').on('click', function (g) {
        var tab = $(this).closest('.tab-inner'),
                index = $(this).closest('li').index();

        tab.find('ul.tabs > li').removeClass('current');
        $(this).closest('li').addClass('current');

        tab.find('.tab_content').find('div.tab-item-inner').not('div.tab-item-inner:eq(' + index + ')').slideUp();
        tab.find('.tab_content').find('div.tab-item-inner:eq(' + index + ')').slideDown();

        g.preventDefault();
    });

    /* ---------------------------------------------
     Date picker  
     --------------------------------------------- */

    $("#from").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function (selectedDate) {
            $("#to").datepicker("option", "minDate", selectedDate);
        }
    });
    $("#to").datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        onClose: function (selectedDate) {
            $("#from").datepicker("option", "maxDate", selectedDate);
        }
    });

    /* ---------------------------------------------
     Youtube Video
     --------------------------------------------- */
    var api_key = 'AIzaSyAroKpLQWTON6y34m5VqGcLCPtOmfLBqh4'; // use your own api key

    // Start all players on the page with default options
    $('.RYPP').rypp('AIzaSyAroKpLQWTON6y34m5VqGcLCPtOmfLBqh4'); // use your own api key

    // Start two players by ID, with default settings
    $('#rypp-demo-4').rypp(api_key, {
        autoplay: false,
        autonext: false,
        loop: false,
        mute: true
    });

    /* ---------------------------------------------
     Youtube Video for home page four
     --------------------------------------------- */

    $(".arrow-right").bind("click", function (event) {
        event.preventDefault();
        $(".vid-list-container").stop().animate({
            scrollLeft: "+=336"
        }, 750);
    });
    $(".arrow-left").bind("click", function (event) {
        event.preventDefault();
        $(".vid-list-container").stop().animate({
            scrollLeft: "-=336"
        }, 750);
    });

    /* ---------------------------------------------
     youtube video for home page five
     --------------------------------------------- */

    $('#player-button').on('click', function (ev) {

        $("#yt")[0].src += "?autoplay=1";
        $("#player").hide();
        $("#post-info").hide();
        ev.preventDefault();
    });
    /* ---------------------------------------------
     PerfectScrollbar
     --------------------------------------------- */

    $('.archive-post').each(function () {
        const ps = new PerfectScrollbar($(this)[0]);
    });

    $('.mobile-menu').each(function () {
        const ps = new PerfectScrollbar($(this)[0]);
    });
    /* ---------------------------------------------
     Datepicker
     --------------------------------------------- */
    $('.hasDatepicker').datepicker({
        autoclose: true
    });
    /* ---------------------------------------------
     tricker animation for home page four
     --------------------------------------------- */
    function tick() {
        $('#ticker li:first').animate({'opacity': 0}, 400, function () {
            $(this).appendTo($('#ticker')).css('opacity', 1);
        });
    }
    setInterval(function () {
        tick()
    }, 3000);

    /* ---------------------------------------------
     Form 
     --------------------------------------------- */

    if (!String.prototype.trim) {
        (function () {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function () {
                return this.replace(rtrim, '');
            };
        })();
    }
    [].slice.call(document.querySelectorAll('input.input_field,textarea.input_field')).forEach(function (inputEl) {
        // in case the input is already filled..
        if (inputEl.value.trim() !== '') {
            classie.add(inputEl.parentNode, 'input--filled');
        }
        // events:
        inputEl.addEventListener('focus', onInputFocus);
        inputEl.addEventListener('blur', onInputBlur);
    });

    function onInputFocus(ev) {
        classie.add(ev.target.parentNode, 'input--filled');
    }

    function onInputBlur(ev) {
        if (ev.target.value.trim() === '') {
            classie.remove(ev.target.parentNode, 'input--filled');
        }
    }

    $(".header-bg-image").css("background", function () {
        var bg =
                "url(" + $(this).data("image-src") + ") #eee no-repeat center center";
        return bg;
    });


    $(".mobile-menu").css("backgroundImage", function () {
        var bg ="url(" + $(this).data("image-src") + ")";
        return bg;
    });


    

    stLight.options({publisher: "5dc9678d-5925-46e1-8f2c-e74ca68e941d", doNotHash: false, doNotCopy: false, hashAddressBar: false});

    

});

/* ---------------------------------------------
 This is for Mobile Menu
 --------------------------------------------- */

//Nav Icon at mobile 
$('.nav-icon').on('click', function () {
    $(this).toggleClass('open');
});

//mobile Menu showLeft at mobile
var menuLeft = document.getElementById('mobile-menu'),
        showLeft = document.getElementById('showLeft'),
        body = document.body;
var classie;
showLeft.onclick = function () {
    classie.toggle(this, 'active');
    classie.toggle(menuLeft, 'mobile-menu-open');
    disableOther('showLeft');
};

function disableOther(button) {
    if (button !== 'showLeft') {
        classie.toggle(showLeft, 'disabled');
    }
}

var base_url = $('#base_url').val();

hs.graphicsDir = base_url+'movi/graphics/';
hs.outlineType = 'rounded-white';
hs.outlineWhileAnimating = true;


"use strict";
$(function () {

    var base_url = $('#base_url').val();
    $("#archive").datepicker({
        autoOpen: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onSelect: function (dateText, inst) {
            window.location = base_url + 'archive/' + dateText, '_parent';
        }
    });

    $("#archive-date").datepicker({
        autoOpen: true,
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
    });
});

                            
