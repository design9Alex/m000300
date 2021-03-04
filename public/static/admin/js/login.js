$(function () {
    $("#login-swiper").each(function() {
        new Swiper('#login-swiper', {
            autoplay: {delay: 3000},
            effect: 'fade',
            speed:1000
        });
    });

    $('#captcha-img').on('click', function () {
        let $this = $(this);
        let captchaUrl = $this.attr('data-src').replace(/\/[0-9]*$/, '') + '/';
        $this.attr('src', captchaUrl + (new Date()).getMilliseconds());
    }).click();

    $("#loginForm").validate({
        rules: {
            username: { required: true, minlength: 4, maxlength: 16},
            password: {required: true, minlength: 4, maxlength: 16},
            captcha: {required: true}
        },
        success: function (error) {},
        invalidHandler: function (ev, validator) {
            var errors = validator.numberOfInvalids();

            if(errors) {
                $("div.error .text").html(validateLanguage.onelinemessage.replace('{0}', errors));
                $('.alert-danger').addClass('show');
            } else {
                $('.alert-danger').removeClass('show');
            }
        },
        errorPlacement: function(error, element) {},
        highlight: function(element){ $(element).css({'border': '1px dotted #ff0000'}); },
        unhighlight: function(element){ $(element).css({"border": ''}); },
        submitHandler: function(form) {
            let $submit = $('button[type=submit]', $(form));
            $submit.prop('disabled', true).text($submit.attr('data-loading')); form.submit();
        }
    });
});

