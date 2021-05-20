$(function(){
    //'use strict';
    var wW = $(window).width(),
        outW = $(window).outerWidth();

	/* ==========================================================================
		initialize
	==========================================================================*/

    // plugin
    imgFill();
    svg();

    //aos
    AOS.init({
        duration: 1200,
        once: true,
    });

    //因架構變化，resize trigger reload
    var trigger_size = [768, 992];
    $(window).resize(function () {
        trigger_size.forEach(function (ele) {
            if (wW > ele) {
                $(window).width() <= ele ? location.reload() : "";
            } else {
                $(window).width() > ele ? location.reload() : "";
            }
        });
    });

    //mCustomScrollbar
    // if (!/Android/i.test(window.navigator.userAgent)) {
    //     if($(window).outerWidth()>575){
    //         $('.pdData').mCustomScrollbar({
    //             axis: "y"
    //         });
    //     }
    // }

    // if($(window).outerWidth()>768){
    //     $('.pdData').mCustomScrollbar({
    //         axis: "y",
    //         theme: "light",
    //     });
    // }

    /* ==========================================================================
		header
    ==========================================================================*/
    //選單

    if(outW > 992){
        var timeoutId;
        $('nav .menu li').each(function(){
            $(this).find('.link').mouseenter(function(){
                $this = $(this);
                $this.parent('li').siblings('li').children('.submenu').stop().slideUp();
                $this.parent('li').siblings('li').children('.link').removeClass('active');
                if(!timeoutId) {
                    timeoutId = window.setTimeout(function() {
                        timeoutId = null;
                        $this.addClass('active').siblings('.submenu').stop().slideDown();
                    }, 200);
                }
            });
        });
        $('.menu').mouseleave(function(){
            $('nav .menu li .submenu').stop().slideUp();
            $('nav .menu li .link').removeClass('active');
            window.clearTimeout(timeoutId);
            timeoutId = null;
        });
    }else{
        $('.menu-toggle').click(function(){
            $('html').toggleClass('body-fixed');
            $(this).toggleClass('active');
            $('.graymask').toggleClass('active');
            $('nav .menu').toggleClass('active');
            $('nav .menu .has-sm .submenu').slideUp();
            $('nav .menu .has-sm a.link').removeClass('active');
        });
        $('nav .menu .has-sm a.link').click(function(e){
            e.preventDefault();
            $(this).parent('.has-sm').siblings('.has-sm').children('.submenu').slideUp();
            $(this).parent('.has-sm').siblings('.has-sm').children('a.link').removeClass('active');
            $(this).toggleClass('active');
            $(this).siblings('.submenu').slideToggle();
        });

    }

    $(".page-inner .guideline").addClass('active');
    linedraw();
    menuScroll();
    goTop();
    $(window).scroll(function(){
        linedraw();
        menuScroll();
        goTop();
    });

    function menuScroll(){
        let wscroll = $(window).scrollTop();
        if ( wscroll > 0){
            $('#header').addClass('scroll');
            $('.home-banner').addClass('scroll');
            $('.page-banner').addClass('scroll');
            $('.home-banner .banner .slider .item .text-box').fadeOut(1000);
        }
        else if ( wscroll === 0 ) {
            $('#header').removeClass('scroll');
            $('.home-banner').removeClass('scroll');
            $('.page-banner').removeClass('scroll');
            $('.home-banner .banner .slider .item .text-box').fadeIn(1000);
        }
    }

    $('.goTop').click(function(){
        $('html,body').animate({scrollTop: 0},800);
    });

    function goTop(){
        if ($(window).scrollTop() > 100){
            $('.goTop').addClass('active');
        }
        else{
           $('.goTop').removeClass('active');
        }
    }


    //內頁選單停駐樣式
    $(".wp").each(function(){
        var $wp = $(this),
            pageId = $wp.attr('id');
            pageTag = $wp.data('tag');
        $("#header .headerbox nav").find('.menu li[data-id="' + pageId + '"]').children('.link').addClass('current');
        $("#header  .headerbox nav .menu li.has-sm .submenu .content .sublist").find('li[data-tag="' + pageTag + '"]').children('a').addClass('active');
    });


    /* ==========================================================================
		pages
    ==========================================================================*/

    //bootstrap-select
    $('.selectpicker').selectpicker({
        liveSearchPlaceholder: 'Placeholder text',
        size: 5,
    });
    $('.selectpicker').on('changed.bs.select', function (e) {
        $(this).prevAll('.dropdown-toggle').toggleClass('bs-placeholder', this.value === '');
    }).trigger('changed.bs.select');

    $('.page-bt-linkbox .zoom a').hover(function(){
        $(this).parents('.page-bt-linkbox').children('.bg-img').toggleClass('hover');
    });


    //product remarks 無資料就藏起來
    $(".pd-section .content").each(function(){
        var $databox= $(this).children('.imgbox').children('.pdremarks').children(".inData").html();
        var $imgremarks = $(this).children('.imgbox').children('.pdremarks');
        var $dataremarks = $(this).children('.pdData');
        var scrollbaropt;
        if($databox==null||$databox==""||$databox=="&nbsp;"){
            // console.log("無資料");
            $imgremarks.addClass('hidden');
            scrollbaropt = {
                axis: "y",
                // theme: "light",
                theme: "minimal-dark",
            }
        }else{
            // console.log("有資料")
            $dataremarks.append($imgremarks.clone());
            scrollbaropt = 'destroy';
            $dataremarks.addClass('noscrollbar');
        }
        $dataremarks.mCustomScrollbar(scrollbaropt);
    });


    /* ==========================================================================
		function
    ==========================================================================*/
    function linedraw(){
        var pageTop = $(window).scrollTop();
        var WH = window.innerHeight;
        var pageBottom = pageTop + WH / 1;
        var tags = $(".upstraight .line");
        for (var i = 0; i < tags.length; i++){
            var tag = $(tags[i]);
            if ($(tag).offset().top < pageBottom){
                $(tag).addClass("active")
            }
        }
    }

    function svg() {
        jQuery('img.svg').each(function () {
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
                if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                }

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });
    }

    // imgFill
    function imgFill() {
        $('.jqimgFill').imgLiquid();
        $('.jqimgFill').each(function () {
        const $this = $(this),
                $picture = $this.find('picture'),
                $source = $picture.children('source'),
                src = $this.find('img').attr('src'),
                srcset = $source.attr('srcset');
        let node, minmax, breakpoint;
        let windowWidth = window.innerWidth;
        if ($picture.length) {
            node = $source.attr('media').replace(/\(|\)| /g, '');
            minmax = node.split(':')[0];
            breakpoint = node.split(':')[1];
            if (minmax === 'min-width') {
            if (windowWidth >= parseFloat(breakpoint)) {
                $this.css('background-image', 'url("' + srcset + '")');
            } else {
                $this.css('background-image', 'url("' + src + '")');
            }
            } else if (minmax === 'max-width') {
            if (windowWidth <= parseFloat(breakpoint)) {
                $this.css('background-image', 'url("' + srcset + '")');
            } else {
                $this.css('background-image', 'url("' + src + '")');
            }
            } else if (minmax === 'orientation') {
            let wRatio = Math.abs(window.innerWidth / window.innerHeight);
            if (breakpoint === 'portrait' && wRatio <= 1) {
                $this.css('background-image', 'url("' + srcset + '")');
            } else if (breakpoint === 'portrait' && wRatio > 1) {
                $this.css('background-image', 'url("' + src + '")');
            }
            if (breakpoint === 'landscape' && wRatio > 1) {
                $this.css('background-image', 'url("' + srcset + '")');
            } else if (breakpoint === 'landscape' && wRatio <= 1) {
                $this.css('background-image', 'url("' + src + '")');
            }
            }
        }
        });
    }
});

window.addEventListener('load', function() {
    setTimeout(function() {
        AOS.refresh();
    }, 100);
}, false);