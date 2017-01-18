/**
 * Created by nathan on 11/30/15.
 */
$(function () {

    $('form').submit(function (event) {
        var logindata = {
            'username': null,
            'password': null
        };

        logindata['username'] = $('[id="username"]').val();
        logindata['password'] = $('[id="password"]').val();

        // Check to see if password matches
        $.ajax({
            type: "post",
            async: true,
            url: url + 'home/checklogin',
            data: logindata
        })
            .done(function (data) {
                var result = JSON.parse(data);
                if (result['error'] == true) {
                    ShowError(true);
                }
                else if (result['error'] == false) {
                    window.location.href = url + 'dashboard/index';
                }

            })
            .fail(function () {
                alert("Password Check failed");
            });
        return false;
    });
});

// Shoes error login informaion
function ShowError(display){
    var error = $('#loginerror');
    
    if(error.hasClass('hidden')){
        error.removeClass('hidden');
    }
    else if(display == false && !(error.hasClass('hidden'))){
        error.addClass('hidden');
    }
}