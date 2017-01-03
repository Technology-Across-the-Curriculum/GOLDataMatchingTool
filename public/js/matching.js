/**
 * Created by: Nathan Healea
 * Project: GOLDMT
 * File:
 * Date: 12/15/16
 * Time: 1:20 PM
 */
$(document).ready(function () {
    // Get course for dropdown
    getCourses();

    // When a use selects a course get section
    //  of that course.
    $("#courses").change(function () {
        getSection($(this).val());
    });

    // When a user selects a section of a course
    // get the class list
    $("#sections").change(function () {
        getClasslist($(this).val());
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
            for (var i = 0; i < data.length; i++) {
                courseDropdown.append('<option value="' + data[i].id + '">' + data[i].acronym + '</option>');
            }

        })
        .fail(function () {
            console.log('matchapi/getCourse : failed')
        });
}

/**
 *
 */
function getSection(id) {
    var data = null; // hold data to be returned

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type : "get",
        async: false,
        url  : url + 'matchapi/getSection/' + id
    })
        .done(function (json) {
            data = JSON.parse(json);

            // applying courses to dropdown
            var courseDropdown = $('#sections');
            var listChildren   = courseDropdown.children();
            var numChildren    = courseDropdown.children().length;

            // remove section when a new crouse is selected.
            if (numChildren > 1) {

                for (var i = 1; i < numChildren; i++) {
                    listChildren[i].remove();
                }
            }

            for (var i = 0; i < data.length; i++) {
                courseDropdown.append('<option value="' + data[i].id + '">' + data[i].crn + ' ' + data[i].code + '</option>');
            }

        })
        .fail(function () {
            console.log('matchapi/getSection' + id + ' : failed')
        });
}

/**
 *
 */
function getClasslist(id) {
    var data = null; // hold data to be returned

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type : "get",
        async: false,
        url  : url + 'matchapi/getClasslist/' + id
    })
        .done(function (json) {

            data = JSON.parse(json);

            // applying courses to dropdown
            var keys         = data['keys'];
            var studentList  = data['list'];
            var wrapper      = $('#classlist-table-wrapper');
            var table        = $('<table>', {id: "classlist-table", class: "table"});
            var tableHead    = $('<thead/>');
            var tableHeadRow = $('<tr/>');
            var tableBody    = $('<tbody/>');


            // removing table from page
            if (wrapper.children().length > 0) {
                wrapper.empty();
            }

            // adding header to the table
            for (var i = 0; i < keys.length; i++) {
                tableHeadRow.append($('<th/>', {text: keys[i]}));
            }
            // adding options colum to table header
            tableHeadRow.append($('<th/>', {text: "Options"}));

            // adding information to the table
            for (var s = 0; s < studentList.length; s++) {
                var tableBodyRow = $('<tr>');
                for (var k in studentList[s]) {
                    tableBodyRow.append(
                        $('<td>', {text: studentList[s][k]})
                    );
                }

                // adding secetion button to row
                tableBodyRow.append(
                    $('<td>').append(
                        $('<div>', {text: "Select", id: studentList[s].id, class: "btn btn-warning"})
                    )
                );

                tableBody.append(tableBodyRow)
            }

            tableHead.append(tableHeadRow);
            table.append(tableHead);
            table.append(tableBody);
            wrapper.append(table);

            // Setting DataTables Options
            table.dataTable({
                scrollY: 200
            });



        })
        .fail(function () {
            console.log('matchapi/getSection' + id + ' : failed')
        });
}
