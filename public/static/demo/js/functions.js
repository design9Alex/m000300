/*=============================================
  public functions
 =============================================*/



// spacer height
function spacerHeight(spacer) {
  $('#accept-cookie, #spotlight-close').click(function() {
    let thisHeight;
    let spacerHeight = spacer.height();
    if ( $(this).is($('#accept-cookie')) ) {
      thisHeight = $('.header-cookie').outerHeight();
    } else if ( $(this).is($('#spotlight-close')) ) {
      thisHeight = $('.header-spotlight').outerHeight();
    }
    spacer.css({
      'height': spacerHeight - thisHeight,
    });
  });
}

/*== svg ============================= */

// img to svg
function svg() {
  $('img.svg').each(function () {
    var $img = $(this),
      imgID = $img.attr('id'),
      imgClass = $img.attr('class'),
      imgURL = $img.attr('src') || $img.data('src');
    $.get(imgURL, function (data) {
      var $svg = $(data).find('svg');
      if (typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID);
      }
      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' replaced-svg');
      }
      $svg = $svg.removeAttr('xmlns:a');
      if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
        $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
      }
      $img.replaceWith($svg);
    }, 'xml');
  });
}

/*== resize ========================= */

// imgFill
function imgFill() {
  $('.imgFill').imgLiquid();
  $('.imgFill').each(function () {
    const $this = $(this),
          $picture = $this.find('picture'),
          $source = $picture.children('source'),
          src = $this.find('img').attr('src') || $this.find('img').data('src'),
          srcset = $source.attr('srcset') || $source.data('srcset');
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

// responsive table
function responsiveTable() {
  $('.responsive-table').each(function() {
    const $this = $(this), $thead = $this.find('thead').children('tr:first-child');
    let columns;
    if ( !$this.find('th[colspan]').length ) {
      columns = $thead.find('th').length;
    } else {
      let colspan = parseInt($this.find('th[colspan]').eq(0).attr('colspan')) - 1;
      columns = $thead.find('th').length + colspan;
    }
    if (window.innerWidth < 768) {
      if (!$this.find('.rowspan').length) {
        $this.find('td[rowspan]').each(function () {
          const rowspan = parseFloat($(this).attr('rowspan')) - 1,
                thisTxt = $(this).html(),
                $nextAll = $(this).parent('tr').nextAll().slice(0, rowspan);
          $nextAll.prepend('<td class="rowspan">' + thisTxt + '</td>');
        });
      }
      if (!$this.find('[data-title]').length) {
        $this.find('tr').each(function () {
          for (var i = 0; i < columns; i++) {
            let title;
            if ( !$thead.find('th[colspan]').length ) {
              title = $thead.children('th').eq(i).text();
            } else {
              if ( $thead.children('th').eq(i - 1).attr('colspan') ) {
                title = $thead.find('th[colspan]').eq(0).text();
              } else if ( i > $thead.find('th[colspan]').length ) {
                let colspan = parseInt($thead.children('th[colspan]').eq(0).attr('colspan')) - 1;
                title = $thead.children('th').eq(i - colspan).text();
              } else {
                title = $thead.children('th').eq(i).text();
              }
            }
            $(this).children('td').eq(i).attr('data-title', title);
          }
        });
        $this.find('td').each(function() {
          $(this).wrapInner('<div class="td-inner"></div>');
        });
      }
    } else {
      if ($this.find('.rowspan').length) {
        $this.find('.rowspan').remove();
      }
      if ($this.find('[data-title]').length) {
        $this.find('[data-title]').each(function () {
          $(this).removeAttr('data-title');
        });
        $this.find('.td-inner').each(function() {
          $(this).children().unwrap('.td-inner');
        });
      }
    }
  });
}

/*== popup ========================== */

function productPopup(classname) {
  const $this = $('.product-popup.for-' + classname);
  $('html').addClass('body-fixed');
  $this.css('display', 'flex').hide().fadeIn(300);
  popupResize();
  if ( !$('html').hasClass('macintosh') && window.innerWidth >= 992 ) {
    $this.find('.popup-content, .popup-content *').on('mousewheel', function(e){
      if ( !$('.popup-content').find('.selectpicker').length ) {
        e.preventDefault();
      }
    });
    $this.find('.popup-content').niceScroll();
    $this.find('.popup-content').getNiceScroll(0).doScrollTop(0, 100);
  } else {
    $this.find('.popup-content').animate({ scrollTop: 0 }, 300);
  }
  $this.find('.popup-fade').click(closePopup);
  $this.find('.popup-head .close').click(closePopup);
  $this.find('input').each(function() {
    $(this).on('focus blur', function() {
      if ( window.innerWidth >= 480 ) {
        $this.find('.popup-box').css('max-height', window.innerHeight * 0.85);
        $this.find('.popup-content').css('max-height', window.innerHeight * 0.85 - $('.product-popup .popup-head').outerHeight());
      } else {
        $this.find('.popup-box').css('max-height', window.innerHeight);
        $this.find('.popup-content').css('max-height', window.innerHeight - $('.product-popup  .popup-head').outerHeight());
      };
    });
  });
  $(window).on('resize', popupResize);
  function popupResize() {
    if ( window.innerWidth >= 480 ) {
      $this.find('.popup-box').css('max-height', window.innerHeight * 0.85);
      $this.find('.popup-content').css('max-height', window.innerHeight * 0.85 - $('.product-popup .popup-head').outerHeight());
    } else {
      $this.find('.popup-box').css('max-height', window.innerHeight);
      $this.find('.popup-content').css('max-height', window.innerHeight - $('.product-popup  .popup-head').outerHeight());
    }
  }
  function closePopup() {
    $('html').removeClass('body-fixed');
    $this.css('overflow-y', 'hidden').fadeOut(300);
  }
}

/*== buttons ========================= */

function subscribe() {
  swalStyled.fire({
    title: '已成功訂閱電子報',
    icon: 'success',
    customClass: {
      popup: 'popup-small',
    }
  });
}
function addToCart() {
  $('#header').find('[data-tool="cart"]').addClass('active');
  if ( !$('html').hasClass('macintosh') && window.innerWidth >= 992 ) {
    $('#header').find('[data-tool="cart"] .scrollbar').getNiceScroll(0).doScrollTop(0, 300);
  } else {
    $('#header').find('[data-tool="cart"] .scrollbar').animate({ scrollTop: 0 }, 300);
  }
  let cartTimeOut = setTimeout(function() {
    $('#header').find('[data-tool="cart"]').removeClass('active');
  }, 3000);
  $('#header').find('[data-tool="cart"], [data-tool="cart"] *').on('mouseenter touchstart dragstart', function() {
    clearTimeout(cartTimeOut);
  });
  $(document).on('click', function(e) {
    if ( !$(e.target).is($('[data-tool="cart"]')) && !$(e.target).is($('[data-tool="cart"] *')) && !$(e.target).is($('[name="addToCart"]')) && !$(e.target).is($('[name="addToCart"] *')) ) {
      $('#header').find('[data-tool="cart"]').removeClass('active');
    }
  });
  if ( $('.product-topbar').length ) {
    $('#header').css('visibility', 'visible');
    if ( $('.product-topbar').hasClass('active') ) {
      $('.product-topbar').removeClass('active');
    }
  }
  if ( $('.primary-sidebar').length ) {
    $('#header').css('visibility', 'visible');
    $('.primary-inner').addClass('scroll-up');
  }
}
function likeButton(elm) {
  if ( !$(elm).hasClass('active') ) {
    swalStyled.fire({
      title: '已加入至「我的最愛」',
      icon: 'success',
      html: '<p><a href="/member">查看我的最愛 <i class="icon-chevron-right"></i></a></p>',
      customClass: {
        popup: 'popup-small',
      }
    });
    $(elm).addClass('active');
  } else {
    swalStyled.fire({
      title: '已取消「我的最愛」',
      icon: 'success',
      html: '<p><a href="/member">查看我的最愛 <i class="icon-chevron-right"></i></a></p>',
      customClass: {
        popup: 'popup-small',
      }
    });
    $(elm).removeClass('active');
  }
}
function inStockNotice(elm) {
  if ( !$(elm).hasClass('active') ) {
    swalStyled.fire({
      title: '已加入至「貨到通知」',
      icon: 'success',
      html: '<p class="t-center">商品到貨後，我們會E-mail/簡訊立即通知您。</p><p><a href="/member">查看貨到通知 <i class="icon-chevron-right"></i></a></p>',
      customClass: {
        popup: 'popup-medium popup-notice',
      }
    });
    $(elm).addClass('active');
  } else {
    swalStyled.fire({
      title: '已取消「貨到通知」',
      icon: 'success',
      html: '<p><a href="/member">查看貨到通知 <i class="icon-chevron-right"></i></a></p>',
      customClass: {
        popup: 'popup-small',
      }
    });
    $(elm).removeClass('active');
  }
}
function newWindow(elm, event) {
  const url = $(elm).attr('href');
  event.preventDefault();
  window.open(url, 'newwindow', 'width=500,height=500,scrollbars=yes');return false;
}
function copyLink() {
  const url = window.location.href;
  const copyInput = document.createElement('input');
  document.body.appendChild(copyInput);
  copyInput.value = url;
  copyInput.select();
  document.execCommand('copy');
  document.body.removeChild(copyInput);
  swalStyled.fire({
    title: '已複製連結',
    icon: 'success',
    customClass: {
      popup: 'popup-small',
    }
  });
}
function pdRemove(arg) {
  swalRemoveWarn.fire({
    title: '您確定要移除此商品嗎？',
  }).then(function(result) {
    if ( result.value ) {
      if ( arg === 'cart' ) {
        $('.cart-overlay').addClass('active').trigger('overlayShown');
      } else {
        swalStyled.fire({
          title: '商品已移除',
          icon: 'success',
          customClass: {
            popup: 'popup-small',
          }
        });
      }
    }
  });
}
function promoRemove(arg) {
  swalRemoveWarn.fire({
    title: '您確定要移除此優惠折抵嗎？',
  }).then(function(result) {
    if ( result.value && arg === 'cart' ) {
      $('.cart-overlay').addClass('active').trigger('overlayShown');
    }
  });
}
function addToList(elm) {
  //const scrollVal = $('.products-section[data-section="primary"]').offset().top - $('.header-topbar').height();
  $(elm).toggleClass('selected');
  /*if ( window.innerWidth >= 768 ) {
    $('html, body').animate({ scrollTop: scrollVal }, 800);
  } else {
    $('.products-promo-head').css('visibility', 'visible');
    $(window).on('scroll', function() {
      $('.products-promo-head').removeAttr('style');
    });
  }*/
}
function bonusError() {
  swalStyled.fire({
    title: '點數不足無法兌換',
    icon: 'warning',
    html: '<p><a href="/member-plan">如何累積點數？</a></p>',
    customClass: {
      popup: 'popup-small',
    }
  });
}
function exchangeCoupon() {
  swalStyled.fire({
    title: '已成功兌換',
    icon: 'success',
    html: '<p><a href="/member-coupons">查看我的優惠券 <i class="icon-chevron-right"></i></a></p>',
    customClass: {
      popup: 'popup-small',
    }
  });
}
function eventDesc(descTitle, descContent) {
  if ( !$('.wp').find('.product-popup.for-event').length ) {
    $('.wp').append('<div class="product-popup popup for-event"><div class="popup-fade"></div><div class="popup-box"><div class="popup-head"><span class="title"></span><button type="button" class="close"><i class="icon-close"></i></button></div><div class="popup-content editor editor-style">' + descContent + '</div></div></div></div>');
  }
  $('.product-popup.for-event').find('.popup-head .title').html(descTitle);
  $('.product-popup.for-event').find('.popup-content').html(descContent);
  productPopup('event');
}
function couponInfo(elm) {
  const $this = $(elm),
        txtOnOpen = $this.children('.info-head-txt').data('txt-open'),
        txtOnCnClose = $this.children('.info-head-txt').text();
  $this.children('.info-head-txt').text(txtOnOpen).data('txt-open', txtOnCnClose);
  $this.parents('.coupon-ticket').toggleClass('active');
  $this.next('.info-content').slideToggle();
}
function couponPopup(elm) {
  const $this = $(elm),
        $thisCoupon = $this.parents('.coupon-ticket'),
        thisCoupon = $thisCoupon.clone(),
        popupTitle = $thisCoupon.find('.coupon-ticket-popup').data('title'),
        popupContent = $thisCoupon.find('.coupon-ticket-popup').html();
  if ( !$('.wp').find('.product-popup.for-couponInfo').length ) {
    $('.wp').append('<div class="product-popup popup fixed-head for-couponInfo"><div class="popup-fade"></div><div class="popup-box"><div class="popup-head"><span class="title"></span><button type="button" class="close"><i class="icon-close"></i></button></div><div class="popup-content"></div></div></div></div>');
  }
  thisCoupon.find('.coupon-ticket-popup').remove();
  thisCoupon.find('.display-content .txt-icon').remove();
  thisCoupon.find('.info-content').removeClass('for-bonus').html(popupContent);
  $('.product-popup.for-couponInfo').find('.popup-head .title').html(popupTitle);
  $('.product-popup.for-couponInfo').find('.popup-content').html(thisCoupon);
  productPopup('couponInfo');
}
function customSelect() {
  $('.for-tel .custom-select').each(function() {
    const $this = $(this), $thisToggle = $this.siblings('input');
    customSelectTel();
    if ( window.innerWidth < 992 ) {
      const thisVal = '+' + $this.val().split('+')[1];
      $thisToggle.val(thisVal);
    }
    $(window).on('resize', customSelectTel);
    function customSelectTel() {
      if ( window.innerWidth < 992 ) {
        $this.find('option').each(function() {
          const val = $(this).text(), subtext = $(this).data('subtext');
          if ( subtext != '' && subtext != undefined && $(this).attr('data-val') === undefined ) {
            $(this).attr('data-val', val);
            $(this).prepend(subtext + ' ');
          }
        });
        $this.on('change', function() {
          const thisVal = '+' + $this.val().split('+')[1];
          $thisToggle.val(thisVal);
        });
      }
    }
  });
}
