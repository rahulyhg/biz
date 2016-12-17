$(document).ready(function () {
    $("input[name='firstname'],input[name='secondname']").keypress(function (event) {
        var inputValue = event.charCode;
        if (!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) {
            event.preventDefault();
        }
    });
    $('.email').change(function () {
        var val = $(this).val();
        var url = base_url + 'check_email';
        if (val != "") {
            $.ajax({
                method: "POST",
                url: url,
                data: 'email=' + val,
                success: function (response) {
                    if (response == 'ok') {
                        $('.mail-error').css('display', 'none');
                        return true;
                    } else {
                        $('.mail-error').css('display', 'block');
                        var value = "This email id is already registered.";
                        $('.error_msg').text(value);
                        $('input[name="email"]').val('');
                        $('input[name="new_email"]').val('');
                        return false;
                    }
                }
            });
        }
    });
    $('.signup').click(function (event) {
        var pass_length = $('.password').val().length
        var conf_pass_length = $('.confpass').val().length
        if ((pass_length > '0') && (conf_pass_length > '0')) {
            if ((pass_length >= '6') && (conf_pass_length >= '6')) {
                if ($('.password').val() != $('.confpass').val()) {
                    var value = 'Your password does not match. Kindly enter the password again.';
                    $('.mail-error').css('display', 'block');
                    $('.error_msg').text(value);
                    // Prevent form submission
                    event.preventDefault();
                }
            } else {
                var value = 'Your password length should not be less than 6 characters.';
                $('.mail-error').css('display', 'block');
                $('.error_msg').text(value);
                // Prevent form submission
                event.preventDefault();
            }
        }
    });

    $('#reset_password').submit(function () {
        var val = $('input[name="pass_email"]').val();
        var url = base_url + 'login/request_password';
        if (val != "") {
            $.ajax({
                method: "POST",
                url: url,
                data: 'email=' + val,
                async: false,
                success: function (response) {
                    if ((response != '1') && (response != '2')) {
                        $('.mail-error').css('display', 'none');
                        return true;
                    } else if (response == '1') {
                        $('.mail-error').css('display', 'block');
                        var value = "Please Enter Registered email.";
                        $('.error_msg').text(value);
                        $('input[name="pass_email"]').val('');
                        return false;
                    } else if (response == '2') {
                        $('.mail-error').css('display', 'block');
                        var value = "We have shared the link on your registered email id. Click the link to change your password.";
                        $('.error_msg').removeClass('alert-danger').addClass('alert-success');
                        $('.error_msg').text(value);
                        $('input[name="pass_email"]').val('');
                        return false;
                    }
                }
            });
        }
        return false;
    });

    $('#pass_change').submit(function () {
        var pass = $('input[name="new_pass"]').val();
        var confirm_pass = $('input[name="new_conf_pass"]').val();
        if (pass != confirm_pass) {
            $('.mail-error').css('display', 'block');
            var html = "Password Mismatching";
            $('.error_msg').text(html);
            return false;
        } else {
            var url = base_url + 'update_password';
            $.ajax({
                method: "POST",
                url: url,
                data: 'password=' + pass,
                async: false,
                success: function (response) {
                    if (response == '1') {
                        $('.mail-error').css('display', 'block');
                        var value = "The password for your bizjumper account has been changed successfully.";
                        $('.error_msg').removeClass('alert-danger').addClass('alert-success');
                        $('.error_msg').text(value);
                        $('input[name="new_pass"]').val('');
                        $('input[name="new_conf_pass"]').val('');
                        return false;
                    }
                }
            });
        }
        return false;
    });
    $('.delete_acc').click(function () {
        var val = $("input[name='get_pass']").val();
        if (val == '') {
            var html = "Please enter Password";
            error_msg(html);
            return false;
        } else {
            remove_error_msg();
            $('body').prepend('<div class="popup_back"></div>');
            $('.del_acc').fadeIn();
            return false;
        }
    });
    $('.popup-close').click(function () {
        $('.popup_back').fadeOut(function () {
            $(this).remove();
        });
        $('.del_acc').fadeOut();
    });
    $('.remove_acc').click(function () {
        $('#deleteAccount').submit();
    });
    $('#deleteAccount').submit(function () {
        var password = $('input[name="get_pass"]').val();
        var url = base_url + 'delete_account';
        $.ajax({
            method: "POST",
            url: url,
            data: 'password=' + password,
            async: false,
            success: function (response) {
                if (response == '1') {
                    $('.popup_back').fadeOut(function () {
                        $(this).remove();
                    });
                    $('.del_acc').fadeOut();
                    $('.mail-error').css('display', 'block');
                    var value = "Please enter correct password.";
                    $('.error_msg').text(value);
                    return false;
                } else {
                    var redirect = base_url + 'comeback';
                    window.location.href = redirect;
                }
            }
        });
        return false;
    });
    $('#change_email').submit(function () {
        var email = $('input[name="email"]').val();
        var new_email = $('input[name="new_email"]').val();
        var url = base_url + 'settings/email_setting';
        var url1 = base_url + 'check_email';
        $.ajax({
            method: "POST",
            url: url1,
            data: 'email=' + new_email,
            async: false,
            success: function (response) {
                if (response == 'ok') {
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: 'email=' + email + '&new_mail=' + new_email,
                        async: false,
                        success: function (response) {
                            if (response == '1') {
                                var value = "We have shared the link on your registered email id. Click the link or button to activate your account.";
                                success_msg(value);
                                $('input[name="email"]').val('');
                                $('input[name="new_email"]').val('');
                                return false;
                            } else if (response == '2') {
                                var value = "Please enter registered Email.";
                                error_msg(value);
                                $('input[name="email"]').val('');
                                $('input[name="new_email"]').val('');
                                return false;
                            } else {
                                var value = "Something is wrong.";
                                error_msg(value);
                                $('input[name="email"]').val('');
                                $('input[name="new_email"]').val('');
                                return false;
                            }
                        }
                    });
                } else {
                    var value = "This email id is already registered.";
                    error_msg(value);
                    $('input[name="email"]').val('');
                    $('input[name="new_email"]').val('');
                    return false;
                }
            }
        });
        return false;
    });

    $('.reset_pass').click(function (event) {
        var pass = $("input[name='password']").val().length;
        var conf_pass = $("input[name='confirm_pass']").val().length;
        if (pass < 1) {
            var value = "Password cannot be blank";
            error_msg(value);
            // Prevent form submission
            event.preventDefault();
        } else if (pass < 6) {
            var value = "Password should be more than six letters.";
            error_msg(value);
            // Prevent form submission
            event.preventDefault();
        } else if ($("input[name='confirm_pass']").val() != $("input[name='password']").val()) {
            var value = "Password and Confirm Password don't match";
            error_msg(value);
            // Prevent form submission
            event.preventDefault();
        }
    });
});

function error_msg(value) {
    $('.mail-error').css('display', 'block');
    $('.error_msg').text(value);
}
function remove_error_msg() {
    $('.mail-error').css('display', 'none');
    $('.error_msg').text('');
}
function success_msg(value) {
    $('.mail-error').css('display', 'block');
    $('.error_msg').removeClass('alert-danger').addClass('alert-success');
    $('.error_msg').text(value);
}