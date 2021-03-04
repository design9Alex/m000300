$(document).ready(function () {
    /*--------------------------------------------
          		validate  表格驗證
    ---------------------------------------------*/
    $.extend($.validator.messages, {
        required: validateLanguage.required,
        remote: validateLanguage.remote,
        email: validateLanguage.email,
        url: validateLanguage.url,
        date: validateLanguage.date,
        dateISO: validateLanguage.dateISO,
        creditcard: validateLanguage.creditcard,
        number: validateLanguage.number,
        digits: validateLanguage.digits,
        equalTo: validateLanguage.equalTo,
        maxlength: $.validator.format(validateLanguage.maxlength),
        minlength: $.validator.format(validateLanguage.minlength),
        rangelength: $.validator.format(validateLanguage.rangelength),
        range: $.validator.format(validateLanguage.range),
        max: $.validator.format(validateLanguage.max),
        min: $.validator.format(validateLanguage.min),
        step: $.validator.format(validateLanguage.step)
    });
    jQuery.validator.setDefaults({
        debug: true,
        ignore: ".ignore-valid",
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        focusCleanup: true,
        invalidHandler: function (e, validator) {
            let errors = validator.numberOfInvalids();
            if (errors) {
                let message = validateLanguage.onelinemessage.replace('{0}', errors);
                $("div.error span.text").html(message);
                $("div.error").addClass('show').show();
            } else {
                $("div.error").removeClass('show').hide();
            }
        },
        submitHandler: function(form) {
            $("input[type=submit]", form).prop('disabled' , true);
            form.submit();
        }
    });
    $('form.validate').each(function () {
        $("div.error").hide();
        $(this).validate();
    });
});
