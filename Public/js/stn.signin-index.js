jQuery(function ($) {
    $.validator.addMethod('regex', function (value, element, param) {
        var regex = new RegExp(param);
        return (regex.test(value));
    });

    var $btn_submit = $('#btn_submit');
    $('#form').validate({
        errorClass: 'has-error',
        validClass: 'has-success',
        rules: {
            username: {
                required: true,
                regex: /^(\w{6,32})|((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i,
            },
            password: {
                required: true,
                regex: /^[\w\!\@\#\$\%\^\&\*\(\)\-\=\+\,\.\?\<\>\/\\]{8,16}$/i,
            },
        },
        messages: {
            username: {
                required: '<b class="text-danger">Username is required</b>',
                regex: '<b class="text-danger">Not an username or e-mail formatter</b>',
            },
            password: {
                required: '<b class="text-danger">Password is required</b>',
                regex: '<b class="text-danger">Not a password formatter</b>',
            },
        },
        submitHandler: function (form) {
            if (this.valid()) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    beforeSend: function () {
                        $btn_submit.tooltip('destroy').attr('disabled', 'disabled');
                    },
                    success: function (json) {
                        if (!json.status) {
                            $btn_submit.tooltip({
                                title: '<em class="text-danger">' + json.info + '</em>',
                                container: 'body',
                                html: true,
                                trigger: 'focus',
                            }).tooltip('show');
                            setTimeout(function () {
                                $btn_submit.tooltip('destroy');
                            }, 3 * 1000);

                            $btn_submit.removeAttr('disabled');
                        } else {
                            $('input[type="submit"]').val('Sign in successful, jump to previous page');
                            setTimeout(function () {
                                window.location.href = json.retUrl;
                            }, 2 * 1000);
                        }
                    },
                });
            }

            return false;
        },
        invalidHandler: function (form) {
            return false;
        },
        tooltip_options: {
            username: {
                placement: 'top',
            },
            password: {
                placement: 'bottom',
            },
            html: true,
        },
    });
});
