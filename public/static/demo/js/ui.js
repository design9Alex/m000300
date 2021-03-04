$(function () {

  const $window = $(window),
        $header = $('#header'),
        $wp = $('.wp');

  /*=============================================
    pages
   =============================================*/

  /*== pages ========================== */

  $wp.each(function () {

    /* -- common -------------------*/

    $('.editor').find('iframe').each(function () {
      if ( !$(this).parent().hasClass('iframe-wrapper') ) {
        $(this).wrap('<div class="iframe-wrapper"></div>');
      }
    });

  });

  /*== others ========================= */

  /* -- header spacer -------------*/

  if ( !$('.home-section[data-section="banner"]').length ) {
    if ( !$('#main').find('.header-spacer').length ) {
      $('#main').prepend('<div class="header-spacer"></div>');
    }
    headerSpacer();
    $window.on('resize', headerSpacer);
    $window.on('scroll', function() {
      if ( !$header.hasClass('sticky') ) {
        $('.header-spacer').css('height', $header.find('.header-main').height());
      } else {
        $('.header-spacer').css('height', $header.find('.header-topbar').height());
      }
    });
    function headerSpacer() {
      let headerHeight = $header.find('.header-main').height();
      $('#main').find('.header-spacer').css('height', headerHeight);
    }
    spacerHeight($('#main').find('.header-spacer'));
  }

  /* -- sidebar -------------------*/

  $('.sidebar').each(function() {
    $('.wp').addClass('has-sticky');

    $(this).find('.sidebar-category').each(function() {
      const $this = $(this);

      let prevWidth = window.innerWidth;

      currentCategory();
      removeActiveOnMobile();
      
      $window.on('resize', function() {
        if ( window.innerWidth != prevWidth ) {
          currentCategory();
          removeActiveOnMobile();
        }
        prevWidth = window.innerWidth;
      });

      // desktop
      $this.find('.category-title-txt').click(function() {
        if ( window.innerWidth >= 1200 ) {
          $(this).parent('.category-title').each(function() {
            categoryOpen(this);
          });
        }
      });

      // mobile
      $this.find('.category-title').click(function() {
        if ( window.innerWidth < 1200 ) {
          categoryOpen(this);
          $this.siblings('.sidebar-category').removeClass('active').find('.category-menu').hide();
          if ( !$('.primary-inner').hasClass('sticky') ) {
            const scrollVal = $('.products-section[data-section="banner"]').height() + $header.find('.header-topbar').height() + 1;
            $('html, body').animate({ scrollTop: scrollVal }, 500);
          }
          if ( $this.children('.category-menu').children('ul').children('.current').length ) {
            const currentTop = $this.children('.category-menu').children('ul').children('.current').position().top;
            $this.children('.category-menu').animate({ scrollTop: currentTop }, 300);
          } else {
            $this.children('.category-menu').animate({ scrollTop: 0 }, 300);
          }
          if ( $('.sidebar').hasClass('basic-sidebar') ) {
            const offsetLeft = $this.offset().left,
                  marginLeft = window.innerWidth/2 - $this.find('.category-title').outerWidth()/2,
                  scrollVal = offsetLeft - marginLeft - $('.sidebar-inner-scroll').offset().left;
            $('.sidebar-inner').animate({ scrollLeft: scrollVal }, 300);
          }
        }
      });

      function categoryOpen(elm) {
        if ( $(elm).parent().hasClass('sidebar-category') ) {
          $(elm).siblings('.category-menu').slideToggle();
          $(elm).parent().toggleClass('active');
          $('.sidebar-inner').toggleClass('scroll-fixed');
        }
      }

      function removeActiveOnMobile()  {
        if ( window.innerWidth < 1200 ) {
          $this.removeClass('active');
        }
      }
      function currentCategory() {
        const $current = $this.find('.category-menu li.current');
        if ( $current ) {
          if ( window.innerWidth >= 1200 ) {
            $current.each(function() {
              $(this).closest('.category-menu').parent().addClass('active');
              if ( !$(this).find('.current').length ) {
                $(this).addClass('current-level');
              }
            });
          }
        }
      }

    });

    $(document).on('click', function(e) {
      if ( window.innerWidth < 1200 && !$(e.target).is('.sidebar') && !$(e.target).is('.sidebar *') ) {
        $('.sidebar').find('.sidebar-category').removeClass('active');
        $('.sidebar').find('.sidebar-inner').removeClass('scroll-fixed');
        $('.sidebar').find('.category-menu').slideUp();
      }
    });

  }); // sidebar

  // primary
  $('[data-section="primary"]').each(function() {
    const $primary = $(this),
          $primaryInner = $primary.find('.primary-inner');
    let offsetTop;
    let windowscrolltop = 0;
    if ( $('[data-section="banner"]').length && $primaryInner.length ) {
      offsetTop = $primaryInner.offset().top - $header.find('.header-main').height();
    } else {
      offsetTop = $header.find('.header-main').height() - $header.find('.header-topbar').height();
    }
    if ( $primary.find('.primary-sidebar').length ) {
      if ( window.innerWidth < 1200 ) {
        $primaryInner.addClass('scroll-up');
      }
      primaryOnScroll();
      $window.on('scroll', primaryOnScroll);
    }
    function primaryOnScroll() {
      if (Math.abs(windowscrolltop - $window.scrollTop()) <= 5 ) {
        return;
      }
      if ( window.innerWidth < 1200 ) {
        if ( $window.scrollTop() >= offsetTop ) {
          $primaryInner.addClass('sticky');
          if ( $window.scrollTop() > windowscrolltop ) {
            $header.css('visibility', 'hidden');
            $primaryInner.removeClass('scroll-up');
          } else {
            $header.css('visibility', 'visible');
            $primaryInner.addClass('scroll-up');
          }
        } else if ( $window.scrollTop() < offsetTop - 5 ) {
          $primaryInner.removeClass('sticky').addClass('scroll-up');
          $header.css('visibility', 'visible');
        }
      }
      windowscrolltop = $window.scrollTop();
    }
  });

  // sets
  $('.products-sets').each(function() {
    const $sets = $(this),
          $setsHead = $sets.find('.products-sets-head'),
          $setsTabs = $sets.find('.products-sets-tabs');
    tabsOnChange('tab01');
    $setsHead.find('.btn').click(function(e) {
      const tabID = $(this).attr('href').split('#')[1];
      e.preventDefault();
      $(this).parent('li').addClass('active').siblings('li').removeClass('active');
      tabsOnChange(tabID);
    });
    function tabsOnChange(tabID) {
      $setsTabs.find('.tab-content[data-tab="' + tabID + '"]').fadeIn().siblings('.tab-content').hide();
    }
  });

  pdSetsSticky();
  $window.on('scroll', pdSetsSticky);

  function pdSetsSticky() {
    if ( window.innerWidth < 1200 ) {
      const $sets = $('.products-sets');
      $sets.each(function() {
        const currentOffset = this.getBoundingClientRect().top, stickyOffset = 0;
        if ( currentOffset <= stickyOffset ) {
          $sets.addClass('is-sticky');
        } else if ( $window.scrollTop() < currentOffset + 55 ) {
          $sets.removeClass('is-sticky');
        }
      });
    }
  }

  // fixed tool
  $(function() {
    let windowscrolltop = 0;
    showScrollTop();
    showFixedTools();
    $window.on('scroll', function() {
      showScrollTop();
      showFixedTools();
    });
    function showScrollTop() {
      if ( $window.scrollTop() > 300 ) {
        $('.scroll-top').addClass('active');
      } else {
        $('.scroll-top').removeClass('active');
      }
    }
    function showFixedTools() {
      if (Math.abs(windowscrolltop - $window.scrollTop()) <= 5 ) {
        return;
      }
      if ( $window.scrollTop() > windowscrolltop ) {
        $('.fixed-tools-mobile').addClass('inactive');
        /*if ( $('.product-fixed').length ) {
          $('.product-fixed').addClass('bottom-fix');
          $('.fixed-tools-mobile').removeClass('scrolltop-fix');
        }*/
      } else {
        $('.fixed-tools-mobile').removeClass('inactive');
        /*if ( $('.product-fixed').length ) {
          $('.product-fixed').removeClass('bottom-fix');
          $('.fixed-tools-mobile').addClass('scrolltop-fix');
        }*/
      }
      windowscrolltop = $window.scrollTop();
    }
  });

  /*=============================================
    plugins init
   =============================================*/

  // custom scrollbar
  if ( !$('html').hasClass('macintosh') && window.innerWidth >= 992 ) {
    $('.scrollbar').niceScroll();
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

  // lightcase
  $('[data-rel^="lightcase"]').lightcase();

  // selectpicker
  $('.selectpicker').selectpicker({
    size: 5,
  });
  $('.selectpicker').on('loaded.bs.select', function () {
    if ( $(this).val() != '' && $(this).val() != undefined ) {
      $(this).parent().addClass('is-selected');
    }
  });
  $('.selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    if (isSelected) $(this).parent().addClass('is-selected');
  });
  selectResize();
  $window.on('resize', selectResize);
  function selectResize()  {
    if ( window.innerWidth < 992 ) {
      $('.selectpicker').selectpicker('destroy');
    }
  }
  customSelect();

  // datepicker
  $('.datepicker').each(function() {
    const $this = $(this);
    $this.datepicker({
      endDate: new Date(),
      format: 'yyyy/mm/dd',
      container: $this.parent(),
    });
    $this.datepicker().on('show', function() {
      $this.siblings('.datepicker-toggle').addClass('datepicker-open');
    });
    $this.datepicker().on('hide', function() {
      setTimeout(function() {
        $this.siblings('.datepicker-toggle').removeClass('datepicker-open');
      }, 300);
    });
    $this.siblings('.datepicker-toggle').click(function() {
      if ( !$(this).hasClass('datepicker-open') ) {
        $this.datepicker('show');
      } else {
        $this.datepicker('hide');
      }
    });
  });

  // inputSpinner
  $('.inputSpinner').inputSpinner({
    groupClass: 'qtt-spinner',
  });

  // lazy loading
  $('img.lazy').lazyload({
      effect: 'fadeIn',
  });

  // loading stuff
  setTimeout(function() {
    $('.loading').removeClass('loading');
  }, 100);

  svg();
  imgFill();
  responsiveTable();

  // resize
  $window.on('resize', function() {
    svg();
    imgFill();
    responsiveTable();
  });

});

// a:active on mobile
document.addEventListener("touchstart", function() {},false);