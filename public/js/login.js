$(document).ready(function () {

    $('#login').click(function () {
        var username = $('#username').val();
        var password = $('#password').val();

        $.ajax({
            type: 'POST',
            data: {'user': username, 'pass': password},
            async: true,
            url: url + 'loginapi/validate/'
        })
            .done(function (json) {
                console.log(json);
                var data = JSON.parse(json);

                console.log(data);
            })
            .fail(function () {
                console.log('ERROR: Could not reach url.')
            })
    })
});
