$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

// sweetalert
const swalCartDefault = Swal.mixin({
    showConfirmButton: false,
    showCloseButton: true,
    closeButtonHtml: '<i class="icon-close"></i>',
    scrollbarPadding: false,
    timer: 3000,
});
const swalRemoveWarn = Swal.mixin({
    showConfirmButton: true,
    showCancelButton: true,
    showCloseButton: true,
    closeButtonHtml: '<i class="icon-close"></i>',
    scrollbarPadding: false,
    reverseButtons: true,
    confirmButtonText: '確定',
    cancelButtonText: '取消',
    customClass: {
        popup: 'popup-medium no-icon'
    },
});

const $body = $('body');

// Initial Modals
$body
    //--依據按鈕 data-btn 開啟對應的彈跳視窗
    .on('click', '[data-btn-modal]', function() {
        let modalIndex = $(this).data('btn-modal');
        let modalWrapIndex = $(this).data('btn-wrap');
        //---按鈕 [data-btn-modal] 對應 視窗 [data-modal]
        $('[data-modal='+ modalIndex +']').fadeIn(300);
        //---按鈕 [data-btn-wrap] 對應 區塊 [data-wrap]
        $('[data-wrap='+ modalWrapIndex +']').css('display','block').siblings().css('display', 'none');
    })
    //--點擊黑底關閉彈跳視窗
    .on('click', '.modal', function() {
        $('.modal').fadeOut(300);
    })
    //--阻擋彈跳視窗內容點擊冒泡
    .on('click', '.modal .wrap', function(e) {
        e.stopPropagation();
    })
    //--X按鈕關閉彈跳視窗
    .on('click', '.js-modal-close', function() {
        $('.modal').fadeOut(300);
    });

function errorDemo() {
    $('<span class="error-msg"><i class="txt-icon icon-alert-circle-fill"></i>此代碼無效</span>').insertAfter('.coupon-bar');
}

$(function() {

    const $window = $(window),
        $header = $('#header');

    /*== cart =========================== */

    /* -- cart head -----------------*/

    const $cartHead = $('.cart-section[data-section="head"]'),
        offsetTop = $header.find('.header-main').height() - $header.find('.header-topbar').height();
    let windowscrolltop = 0;
    if ( window.innerWidth < 1200 ) {
        $cartHead.addClass('scroll-up');
    }
    cartOnScroll();
    $window.on('scroll', cartOnScroll);

    function cartOnScroll()  {
        if (Math.abs(windowscrolltop - $window.scrollTop()) <= 5 ) {
            return;
        }
        if ( window.innerWidth < 992 ) {
            if ( $window.scrollTop() >= offsetTop ) {
                $cartHead.addClass('sticky');
                if ( $window.scrollTop() > windowscrolltop ) {
                    $header.css('visibility', 'hidden');
                    $cartHead.removeClass('scroll-up');
                } else {
                    $header.css('visibility', 'visible');
                    $cartHead.addClass('scroll-up');
                }
            } else {
                $cartHead.removeClass('sticky');
                $header.css('visibility', 'visible');
            }
        }
        windowscrolltop = $window.scrollTop();
    }

    /* -- checkout ------------------*/

    checkOutWrap();
    $window.on('resize', checkOutWrap);
    function checkOutWrap() {
        if ( window.innerWidth < 992 && !$('.cart-checkout').length ) {
            $('.cart-checkout-inner').wrapAll('<div class="cart-group page-group-style"><div class="cart-checkout"></div></div>');
        } else if ( window.innerWidth >= 992 && $('.cart-checkout').length )  {
            $('.cart-checkout').parent('.cart-group').contents().unwrap();
        }
    }

});

/* -- alerts --------------------*/

function memberLevel()  {
    const content = $('.cart-popup[data-popup="member"]').html();
    swalCartDefault.fire({
        title: '會員升等提醒',
        timer: 5000,
        icon: 'warning',
        html: content,
        customClass: {
            popup: 'popup-medium',
        }
    });
}
function cartChange() {
    swalCartDefault.fire({
        title: '商品異動',
        timer: 5000,
        icon: 'warning',
        html: '<p>您購物車中的部分商品有所異動，請以實際購物車結帳時的為準，謝謝。</p>',
        showConfirmButton: true,
        confirmButtonText:  '我已了解',
        customClass: {
            popup: 'popup-medium',
        },
        onOpen: function() {
            Swal.stopTimer();
        }
    });
}
function eventExpire() {
    swalCartDefault.fire({
        title: '活動過期/庫存不足',
        timer: 5000,
        icon: 'warning',
        html: '<p>您購物車中的部分商品促銷活動已過期或庫存不足，請再次確認購物清單內容，謝謝。</p>',
        showConfirmButton: true,
        confirmButtonText:  '確定',
        customClass: {
            popup: 'popup-medium',
        },
        onOpen: function() {
            Swal.stopTimer();
        }
    });
}

/* -- functions -----------------*/

// show popup
function cartPopup(popupName) {
    const classname = 'for-' + popupName;
    $('.popup').each(function() {
        if ( $(this).hasClass(classname) ) {
            productPopup(popupName);
        }
    });
}

// coupon toggle
function couponToggle(elm) {
    const $info = $(elm).parents('.tr-info');
    $(elm).parents('tbody').toggleClass('active');
    if ( window.innerWidth >= 768 ) {
        $info.siblings('.tr-detail').find('.td-inner').slideToggle();
    } else {
        const detail = $info.siblings('.tr-detail').html();
        if ( !$info.find('.detail').length ) {
            $info.find('td').eq(0).append('<div class="detail">' + detail + '</div>');
        }
        $info.find('.detail').slideToggle(300);
    }
    if ( !$('html').hasClass('macintosh') ) {
        setTimeout(function() {
            $('.product-popup .popup-content').getNiceScroll(0).resize();
        }, 350);
    }
}

// invoice toggle
function invoiceToggle(elm) {
    const $this = $(elm), type = $this.data('invoice');
    $this.parent('li').addClass('active').siblings('li').removeClass('active');
    $('.invoice-device').find('.for-' + type).fadeIn().siblings('div').hide();
}

// device toggle
function deviceToggle(elm) {
    const $this = $(elm), type = $this.data('device');
    if ( type === 'barcode' ) {
        $('.device-verify').fadeIn();
        $('.device-note.for-member').hide();
        $('.device-note.for-barcode').fadeIn();
    } else {
        $('.device-verify').fadeOut();
        $('.device-note.for-barcode').hide();
        $('.device-note.for-member').fadeIn();
    }
}

// address toggle
function addressToggle() {
    $('.for-company .add-box').fadeToggle();
}

// event description toggle
function eventDescToggle(elm) {
    const $this = $(elm),
        $event = $this.parents('.event'),
        $desc = $event.siblings('.description'),
        descTitle = $desc.data('title'),
        descContent = $desc.html();
    eventDesc(descTitle, descContent);
}

// use coupon
function useCoupon(elm) {
    $(elm).parent().html('<span class="btn btn-inline fill-mRed no-hover"><span class="btn-inner">已使用</span></span>');
}

new Vue({
    el: '#main',
    data: {
        tags: cartTags,
        elements: {
            slick: {
                prevArrow: '<button type="button" class="slick-prev"><img src="/static/demo/images/svg/icon-chevron-left.svg" class="svg" /></button>',
                nextArrow: '<button type="button" class="slick-next"><img src="/static/demo/images/svg/icon-chevron-right.svg" class="svg" /></button>'
            }
        },
        currentCart: null,
        carts: [],
        gifts: [],
        additions: [],
        redeems: [],
        recommends: [],
        deliveries: [],
        payments: [],
        slides: {
            gift: null,
            addition: null,
            recommend: null
        },
        selects: null,
        needDelete: []
    },
    mounted: function () {
        this.validateProducts();
        //this.getCarts();
    },
    watch: {
        carts: function () {
            if (this.currentCart === null && this.carts.length > 0) {
                this.currentCart = this.carts[0].id;
            }

            if (this.currentCart !== null) {
                this.getGifts();
                this.getAdditions();
                this.getDeliveries();
                this.getPayments();
            }

            this.$nextTick(function () {
                this.updateSelect();
            });
        },
        gifts: function () {
            this.$nextTick(function () {
                let _this = this;
                let $sliderGiveaway = $('.for-gifts .slider');

                if (_this.slides.gift !== null) {
                    _this.slides.gift.slick('unslick');
                }
                if ($sliderGiveaway.length > 0) {
                    _this.slides.gift = _this.bindSlick($sliderGiveaway);
                }
            });
        },
        additions: function () {
            this.$nextTick(function () {
                let _this = this;
                let $sliderAdditional = $('.cart-addition-list .slider');

                if (_this.slides.addition !== null) {
                    _this.slides.addition.slick('unslick');
                }
                if ($sliderAdditional.length > 0) {
                    _this.slides.addition = _this.bindSlick($sliderAdditional);
                }
            });
        },
        recommends: function () {
            this.$nextTick(function () {
                let _this = this;
                let $sliderRecommend = $('.cart-recommend-list .slider');

                if (_this.slides.recommend !== null) {
                    _this.slides.recommend.slick('unslick');
                }
                if ($sliderRecommend.length > 0) {
                    _this.slides.recommend = _this.bindSlick($sliderRecommend);
                }
            });
        },
        deliveries: function () {
            this.$nextTick(function () {
                this.updateSelect();
            });
        },
        payments: function () {
            this.$nextTick(function () {
                this.updateSelect();
            });
        }
    },
    methods: {
        getCarts: function () {
            let _this = this;
            _this.startLoading();
            $.ajax({
                url: cartPaths.getCarts,
                type: 'post',
                success: function (response) {
                    _this.carts = response.data;
                },
                error: function () {
                    _this.carts = [];
                },
                complete: function () {
                    _this.endLoading();
                }
            });
        },
        getGifts: function () {
            let _this = this;
            $.ajax({
                url: cartPaths.getGifts,
                data: {cart_id: _this.currentCart},
                type: 'post',
                success: function (response) {
                    _this.gifts = response.data;
                },
                error: function () {
                    _this.gifts = [];
                }
            });
        },
        getAdditions: function () {
            let _this = this;
            $.ajax({
                url: cartPaths.getAdditions,
                data: {cart_id: _this.currentCart},
                type: 'post',
                success: function (response) {
                    _this.additions = response.data;
                },
                error: function () {
                    _this.additions = [];
                }
            });
        },
        getRecommends: function () {
            let _this = this;
            $.ajax({
                url: cartPaths.getRecommends,
                data: {cart_id: _this.currentCart},
                type: 'post',
                success: function (response) {
                    _this.recommends = response.data;
                },
                error: function () {
                    _this.recommends = [];
                }
            });
        },
        getDeliveries: function () {
            let _this = this;
            $.ajax({
                url: cartPaths.getDeliveries,
                data: {cart_id: _this.currentCart},
                type: 'post',
                success: function (response) {
                    _this.deliveries = response.data;
                },
                error: function () {
                    _this.deliveries = [];
                }
            });
        },
        getPayments: function () {
            let _this = this;
            $.ajax({
                url: cartPaths.getPayments,
                data: {cart_id: _this.currentCart},
                type: 'post',
                success: function (response) {
                    _this.payments = response.data;
                },
                error: function () {
                    _this.payments = [];
                }
            });
        },
        addProduct: function (products, saleType = null, saleId = null) {
            let _this = this;
            _this.startLoading();
            $.ajax({
                url: cartPaths.addProduct,
                data: {products: products, sale_type: saleType, sale_id: saleId},
                type: 'put',
                success: function () {
                    _this.currentCart = null;
                    _this.getCarts();
                }
            });
        },
        updateProduct: function (e, type, id) {
            let _this = this;
            let amount = parseInt(e.target.value);
            _this.startLoading();
            $.ajax({
                url: cartPaths.updateProductAmount,
                data: {id: id, type: (type === 'set' ? 'normal' : type), amount: amount},
                type: 'patch',
                success: function () {
                    _this.currentCart = null;
                    _this.getCarts();
                }
            });
        },
        changeAmount: function (e, increase = true) {
            let $input = $(e.target).parents('.input-group').children('input.qtt');
            let newAmount = parseInt($input.val()) + (increase ? 1 : -1);
            $input.val(newAmount < 0 ? 0 : newAmount);
            $input.get(0).dispatchEvent(new Event('change'));
        },
        deleteProduct: function (type, id) {
            let _this = this;
            _this.startLoading();
            $.ajax({
                url: cartPaths.deleteProduct,
                data: {id: id, type: (type === 'set' ? 'normal' : type)},
                type: 'delete',
                success: function () {
                    _this.currentCart = null;
                    _this.getCarts();
                }
            });
        },
        validateProducts: function () {
            let _this = this;
            $.ajax({
                url: cartPaths.validateProducts,
                type: 'post',
                success: function (response) {
                    if (response.code === '2003') {
                        _this.needDelete = response.data;
                        if (_this.needDelete.length > 0) {
                            let reason = '以下商品庫存不足、已失效或價格變動';
                            for (let i in _this.needDelete) {
                                if (_this.needDelete.hasOwnProperty(i)) {
                                    reason += '<br />' + _this.needDelete[i].title;
                                }
                            }
                            Swal.fire({
                                'title': '您的購物車將更新',
                                'html': reason,
                            }).then(function () {
                                _this.fixProducts();
                            });
                        }
                    } else {
                        _this.currentCart = null;
                        _this.getCarts();
                    }
                }
            });
        },
        fixProducts: function () {
            let _this = this;
            _this.startLoading();
            let row = _this.needDelete.shift();
            if (row.delete_amount > 0) {
                $.ajax({
                    url: cartPaths.updateProductAmount,
                    data: {id: row.id, type: row.type, amount: row.amount},
                    type: 'patch',
                    success: function () {
                        if (_this.needDelete.length > 0) {
                            _this.fixProducts();
                        } else {
                            _this.currentCart = null;
                            _this.getCarts();
                        }
                    }
                });
            } else {
                if (_this.needDelete.length > 0) {
                    _this.fixProducts();
                } else {
                    _this.currentCart = null;
                    _this.getCarts();
                }
            }
        },
        setBonus: function (e, type, point) {
            let _this = this;

            $.ajax({
                url: cartPaths.setBonus,
                data: {cart_id: _this.currentCart, type: type, point: point},
                type: 'put',
                success: function () {
                    _this.getCarts();
                }
            });
        },
        addCoupon: function (e, serial) {
            let _this = this;

            $.ajax({
                url: cartPaths.addCoupon,
                data: {cart_id: _this.currentCart, serial: serial},
                type: 'put',
                success: function () {
                    _this.getCarts();
                }
            });
        },
        deleteCoupon: function (e, serial) {
            let _this = this;

            $.ajax({
                url: cartPaths.deleteCoupon,
                data: {cart_id: _this.currentCart, serial: serial},
                type: 'delete',
                success: function () {
                    _this.getCarts();
                }
            });
        },
        setLocation: function () {
            let _this = this;
            let locationSet = {country: 39, state: 2, county: 8, city: 98};
            $.ajax({
                url: cartPaths.setLocation,
                data: {cart_id: _this.currentCart, location: locationSet},
                type: 'put',
                success: function () {
                    _this.getCarts();
                }
            });
        },
        setDelivery: function (e) {
            let _this = this;
            $.ajax({
                url: cartPaths.setDelivery,
                data: {cart_id: _this.currentCart, delivery: e.target.value},
                type: 'put',
                success: function () {
                    _this.getCarts();
                }
            });
        },
        setPayment: function (e) {
            let _this = this;
            $.ajax({
                url: cartPaths.setPayment,
                data: {cart_id: _this.currentCart, payment: e.target.value},
                type: 'put',
                success: function () {
                    _this.getCarts();
                }
            });
        },
        updateSelect: function () {
            let $selects = $('.l__form select');

            if (this.selects !== null) {
                for (let index in this.selects) {
                    if (this.selects.hasOwnProperty(index)) this.selects[index].destroy();
                }
            }
            if ($selects.length > 0) {
                this.selects = customSelect('.l__form select');
            }
        },
        confirmDelete: function (type, id) {
            let _this = this;
            swalRemoveWarn.fire({
                title: '您確定要移除此商品嗎？',
            }).then(function(result) {
                if ( result.value ) {
                    _this.deleteProduct(type, id);
                }
            });
        },
        startLoading: function () {
            $('.cart-overlay').addClass('active');
        },
        endLoading: function () {
            setTimeout(function () {
                $('.cart-overlay').removeClass('active');
            }, 300);
        },
        bindSlick: function ($elem) {
            return $elem.slick({
                slidesToShow: 7, slidesToScroll:  7, dots: false, arrows: true,
                prevArrow: this.elements.slick.prevArrow, nextArrow: this.elements.slick.nextArrow,
                responsive: [
                    {breakpoint: 1400, settings: {slidesToShow: 6, slidesToScroll: 6}},
                    {breakpoint: 1200, settings: {slidesToShow: 5, slidesToScroll: 5}},
                    {breakpoint: 992, settings: {slidesToShow: 4, slidesToScroll: 4, arrows: false, dots: true}},
                    {breakpoint: 768, settings: {slidesToShow: 3, slidesToScroll: 3, arrows: false, dots: true}},
                    {breakpoint: 480, settings: {slidesToShow: 2, slidesToScroll: 2, arrows: false, dots: true}}
                ]
            });
        }
    }
});
