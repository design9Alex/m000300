$(function () {
    let $wrapper = $(".wrapper");
    let _mobileW = 1199;

    /** 行動版本預設選單關閉 **/
    if ($(window).width() < _mobileW) {
        $wrapper.addClass('slide-nav-close');
    }

    /*--------------------------------------------
     選單螢幕自動關閉開啟
     ---------------------------------------------*/
    var navCloseAuto = function() {
        if ($(window).width() < _mobileW) {
            if ($(".slide-nav-close").length < 1) {
                setTimeout(function() {
                    $wrapper.addClass('slide-nav-close');
                }, 200)
            }
        } else {
            if ($(".slide-nav-close").length > 0) {
                setTimeout(function() {
                    $wrapper.removeClass('slide-nav-close');
                }, 200)
            }
        }
    };

    $(window).resize(function() {
        navCloseAuto();
    });

    /*--------------------------------------------
     左側主選單開閉
     ---------------------------------------------*/
    $(document)
        // 左側主選單開閉
        .on('click', '#toggle_nav_btn', function() {
            $wrapper.toggleClass('slide-nav-close');
            return false;
        })
        // 側選單自動打開
        .on('click', '.fixed-sidebar-left a[data-toggle="collapse"]', function() {
            if ($(".slide-nav-close").length > 0) {
                $wrapper.removeClass('slide-nav-close');
            }
        });

    /*--------------------------------------------
     markdom
     ---------------------------------------------*/
    // 自動取得id
    /*$('h1, h2, h3, h4').each(function () {
        $(this).attr('id', $(this).text());
    });*/

    /*--------------------------------------------
     卷軸
     ---------------------------------------------*/
    $('.nicescroll-bar').each(function() {
        $(this).slimscroll({
            height: '100%',
            color: '#878787',
            disableFadeOut: true,
            borderRadius: 0,
            size: '4px',
            alwaysVisible: false
        });
    });

});
