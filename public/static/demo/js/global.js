'use strict';

/*=============================================
  plugins global settings
 =============================================*/

// datepicker
$.extend($.fn.datepicker.defaults, {
  format: 'yyyy/mm/dd',
  language: 'zh-TW',
  todayHighlight: true,
  autoclose: true,
});

// nicescroll

const _niceScroll = $.fn.niceScroll;
$.fn.niceScroll = function (wrapper, opt) {
    if (typeof opt === "undefined") {
        opt = { cursorcolor: '#DFDFDF',};
    }
    opt.hwacceleration = false;
    _niceScroll.call(this, wrapper, opt);
};

$(function() {

  /*=============================================
    basic
   =============================================*/

  // img draggable false
  $('img').on('dragstart', function(e) {
    e.preventDefault();
  });

  // nicescroll preventDefault
  if ( !$('html').hasClass('macintosh') && window.innerWidth >= 992 ) {
    $('.scrollbar, .scrollbar *').on('mousewheel', function(event) {
      event.preventDefault();
    });
  }

  // fix mobile keyboard
  $('input[type="text"], input[type="email"], input[type="tel"], input[type="password"], textarea').each(function() {
    $(this).on('focus', function() {
      $('html').addClass('keyboard-fix');
    });
    $(this).on('blur', function() {
      $('html').removeClass('keyboard-fix');
    });
  });

});
