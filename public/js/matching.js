/**
 * Created by: Nathan Healea
 * Project: GOLDMT
 * File:
 * Date: 12/15/16
 * Time: 1:20 PM
 */
$(document).ready(function(){
    // Get course for dropdown
    getCourses();

    $("#courses").change(function() {
        alert($(this).val());
    });

});


/**
 *
 */
function getCourses() {
    var data = null; // hold data to be returned

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type : "get",
        async: false,
        url  : url + 'matchapi/getCourse'
    })
        .done(function (json) {
            data = JSON.parse(json);

            // applying courses to dropdown
            var courseDropdown = $('#courses');
            for(var i = 0; i < data.length; i++){
                courseDropdown.append('<option value="' + data[i].id + '">'  + data[i].acronym + '</option>' );
            }

        })
        .fail(function () {
            console.log('matchapi/getCourse : failed')
        });
}
