
    $.validator.addMethod('is_userid_available', function(value, element) {
        var response = '';
        $.ajax({
            type: 'post',
            url: cb_url + '/register/ajax_userid_check',
            data : {
                csrf_test_name: cb_csrf_hash,
                userid : value
            },
            async: false,
            dataType : 'json',
            success : function(data) {
                if (data.result === 'available'){
                    response = true;
                    if ($('#mem_userid-error').length) {
                        $("#mem_userid-error").remove();
                        $("#mem_userid").after('<label id="mem_userid-error" class="error" for="mem_userid">'+data.reason+'</label>');
                    } else {
                        $("#mem_userid").after('<label id="mem_userid-error" class="error" for="mem_userid">'+data.reason+'</label>');
                    }
                } else {
                    response = false;
                    $.validator.messages.is_userid_available = data.reason;
                }
            }
        });
        return response;
    }, $.validator.messages.is_userid_available);


    $.validator.addMethod('is_email_available', function(value, element) {
        var response = '';
        $.ajax({
            type: 'post',
            url: cb_url + '/register/ajax_email_check',
            data : {
                csrf_test_name: cb_csrf_hash,
                email : value
            },
            async: false,
            dataType : 'json',
            success : function(data) {
                if (data.result === 'available'){
                    response = true;
                    if ($('#mem_email-error').length) {
                        $("#mem_email-error").remove();
                        $("#mem_email").after('<label id="mem_email-error" class="error" for="mem_email">'+data.reason+'</label>');
                    } else {
                        $("#mem_email").after('<label id="mem_email-error" class="error" for="mem_email">'+data.reason+'</label>');
                    }
                } else {
                    response = false;
                    $.validator.messages.is_email_available = data.reason;
                }
            }
        });
        return response;
    }, $.validator.messages.is_email_available);


    $.validator.addMethod('is_password_available', function(value, element) {
        var response = '';
        $.ajax({
            type: 'post',
            url: cb_url + '/register/ajax_password_check',
            data : {
                csrf_test_name: cb_csrf_hash,
                password : value
            },
            async: false,
            dataType : 'json',
            success : function(data) {
                if (data.result === 'available'){
                    response = true;
                    
                } else {
                    response = false;
                    $.validator.messages.is_password_available = data.reason;
                }
            }
        });
        return response;
    }, $.validator.messages.is_password_available);


    $.validator.addMethod('is_nickname_available', function(value, element) {
        var response = '';
        $.ajax({
            type: 'post',
            url: cb_url + '/register/ajax_nickname_check',
            data : {
                csrf_test_name: cb_csrf_hash,
                nickname : value
            },
            async: false,
            dataType : 'json',
            success : function(data) {
                if (data.result === 'available'){
                    response = true;
                    
                } else {
                    response = false;
                    $.validator.messages.is_nickname_available = data.reason;
                }
            }
        });
        return response;
    }, $.validator.messages.is_nickname_available);

