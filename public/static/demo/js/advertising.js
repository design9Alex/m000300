$(function() {

  const $window = $(window),
        prevArrow = '<button type="button" class="slick-prev"><img src="/static/demo/images/svg/icon-chevron-left.svg" class="svg" /></button>',
        nextArrow = '<button type="button" class="slick-next"><img src="/static/demo/images/svg/icon-chevron-right.svg" class="svg" /></button>';

  /*== shop =========================== */

  /* -- banner --------------------*/

  const $shopBanner = $('.shop-section[data-section="banner"]');

  $shopBanner.each(function() {
    const $banner = $(this),
          $bannerSlider = $banner.find('.banner-slider');
    // banner slider
    $bannerSlider.children('.slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      prevArrow: prevArrow,
      nextArrow: nextArrow,
      dots: true,
      autoplay: true,
      autoplaySpeed: 5000,
      pauseOnHover: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false
          }
        }
      ]
    });
    // editor text color
    $('.shop-banner-editor').each(function() {
      const $contentHead = $(this).find('.content-head'),
            $contentBtn = $(this).find('.content-button');
      let txtColor, btnColor;
      $contentHead.find('.title').each(function() {
        if ( $(this).find('span') ) {
          txtColor = $(this).find('span').eq(0).css('color');
        }
      });
      $contentBtn.find('.btn').each(function() {
        if ( $(this).find('span') ) {
          btnColor = $(this).find('span').eq(0).css('color');
        }
      });
      $contentHead.css('color', txtColor);
      $contentBtn.css('color', btnColor);
    });
  });

  /* -- functions -----------------*/

  function sliderDots($collection, pdLength) {
    createDots();
    $window.on('resize', createDots);
    function createDots() {
      let ww = window.innerWidth;
      let num;
      if ( ww >= 1200 ) {
        num = 5;
      } else {
        num = 4;
      }
      if ( pdLength > num && !$collection.find('.collection-nav').find('.dots').length ) {
        $collection.find('.collection-nav').addClass('has-dots').prepend('<div class="dots shop-slider-style"></div>');
      } else if ( pdLength <= num && $collection.find('.collection-nav').find('.dots').length ) {
        $collection.find('.collection-nav').removeClass('has-dots').find('.dots').remove();
      }
    }
  }

    // AOS init
    const ua = window.navigator.userAgent,
        edge = ua.indexOf('Edge/'),
        msie = ua.indexOf('MSIE ');
    if (!msie && !edge) {
        aosInit();
    } else {
        setTimeout(function() {
            aosInit();
        }, 100);
    }
    function aosInit() {
        AOS.init({
            duration: 1000,
            once: true,
        });
    }

    // inputSpinner
    $('.inputSpinner').inputSpinner({
        groupClass: 'qtt-spinner',
    });

    svg();
    imgFill();
    responsiveTable();

});
