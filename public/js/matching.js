/**
 * Created by: Nathan Healea
 * Project: GOLDMT
 * File:
 * Date: 12/15/16
 * Time: 1:20 PM
 */

var selectedStudentId = null;
var courseId = null;
var sectionId = null;
var sessionId = null;

$(document).ready(function () {
    // Get course for dropdown
    getCourses();

    // When a use selects a course get section
    //  of that course.
    $("#courses").change(function () {
        courseId = $(this).val();
        getSection(courseId);
    });

    // When a user selects a section of a course
    // get the class list
    $("#sections").change(function () {
        sectionId = $(this).val();
        getClasslist(sectionId);
        getSession(sectionId);

        // When a student is selected higlight the row and save the id
        $("div.btn").click(function () {
            selectStudent($(this).attr('id'));
        });
    });

    // When a user selects a section of a course
    // get the class list
    $("#session").change(function () {
        sessionId = $(this).val();
        getParticipant(sectionId, sessionId);

        // When a student is selected higlight the row and save the id
        $("div.btn").click(function () {
            selectStudent($(this).attr('id'));
        });
    });


});


/**
 * Description:
 *  Makes an Ajax call to matchapi function getCourse and returns a list of coruses and
 *    add the data to a "Select course" dropdown.
 * Parameters:
 *  id: id of the course
 * Returns:
 *  none
 */
function getCourses() {
    var data = null; // hold data to be returned

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type: "get",
        async: false,
        url: url + 'matchapi/getCourse'
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
 * Description:
 *  Makes an Ajax call to matchapi function getSection and returns a list of sections for a given course and
 *    add it to a "Select Section" dropdown.
 * Parameters:
 *  id: id of the course
 * Returns:
 *  none
 */
function getSection(id) {
    var data = null; // hold data to be returned

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type: "get",
        async: false,
        url: url + 'matchapi/getSection/' + id
    })
        .done(function (json) {
            data = JSON.parse(json);

            // applying courses to dropdown
            var courseDropdown = $('#sections');
            var listChildren = courseDropdown.children();
            var numChildren = courseDropdown.children().length;

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
 * Description:
 *  Makes an Ajax call to matchapi function getSection and returns a list of sections for a given course and
 *    add it to a "Select Section" dropdown.
 * Parameters:
 *  id: id of the course
 * Returns:
 *  none
 */
function getSession(id) {
    var data = null; // hold data to be returned
    console.log(id);

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type: "get",
        async: false,
        url: url + 'matchapi/getSession/' + id
    })
        .done(function (json) {
            data = JSON.parse(json);

            // applying courses to dropdown
            var courseDropdown = $('#session');
            var listChildren = courseDropdown.children();
            var numChildren = courseDropdown.children().length;

            // remove section when a new crouse is selected.
            if (numChildren > 1) {

                for (var i = 1; i < numChildren; i++) {
                    listChildren[i].remove();
                }
            }

            for (var i = 0; i < data.length; i++) {
                courseDropdown.append('<option value="' + data[i].id + '">' + data[i].date_created + '</option>');
            }

        })
        .fail(function () {
            console.log('matchapi/getSection' + id + ' : failed')
        });
}


/**
 * Description:
 *  Makes an Ajax call to matchapi function getClasslist and returns the classlist for a givien section and
 *    creates  tables with the given data.
 * Parameters:
 *  id: id of the section
 * Returns:
 *  none
 */
function getClasslist(id) {
    var data = null; // hold data to be returned

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type: "get",
        async: false,
        url: url + 'matchapi/getClasslist/' + id
    })
        .done(function (json) {

            data = JSON.parse(json);

            // applying courses to dropdown
            var keys = data['keys'];
            var studentList = data['list'];
            var wrapper = $('#classlist-table-wrapper');
            var table = $('<table>', {id: "classlist-table", class: "table"});
            var tableHead = $('<thead/>');
            var tableHeadRow = $('<tr/>');
            var tableBody = $('<tbody/>');


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
                var tableBodyRow = $('<tr>', {id: studentList[s].id});
                for (var k in studentList[s]) {
                    tableBodyRow.append(
                        $('<td>', {text: studentList[s][k]})
                    );
                }

                // adding secetion button to row
                tableBodyRow.append(
                    $('<td>').append(
                        $('<div>', {text: "Select", id: studentList[s].id + "-btn", class: "btn btn-warning"})
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
                scrollY: 200,
                bPaginate: false,
                stripeClasses: []
            });


        })
        .fail(function () {
            console.log('matchapi/getSection' + id + ' : failed')
        });
}

/**
 * Description:
 *  Makes an Ajax call to matchapi function getClasslist and returns the classlist for a givien section and
 *    creates  tables with the given data.
 * Parameters:
 *  id: id of the section
 * Returns:
 *  none
 */
function getParticipant(section_id, session_id) {
    var data = null; // hold data to be returned
    console.log("section_id " + section_id);
    console.log("session_id " + session_id);

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type: "get",
        async: false,
        url: url + 'matchapi/getParticipant/' + section_id + '/' + session_id
    })
        .done(function (json) {
            console.log(json);
            data = JSON.parse(json);
            console.log(data);

            // applying courses to dropdown
            var keys = data['keys'];
            var studentList = data['list'];
            var wrapper = $('#participant-table-wrapper');
            var table = $('<table>', {id: "participant-table", class: "table"});
            var tableHead = $('<thead/>');
            var tableHeadRow = $('<tr/>');
            var tableBody = $('<tbody/>');


            // removing table from page
            if (wrapper.children().length > 0) {
                wrapper.empty();
            }

            if (studentList != "empty" && keys != "empty") {
                // adding header to the table
                for (var i = 0; i < keys.length; i++) {
                    tableHeadRow.append($('<th/>', {text: keys[i]}));
                }
                // adding options colum to table header
                tableHeadRow.append($('<th/>', {text: "Options"}));

                // adding information to the table
                for (var s = 0; s < studentList.length; s++) {
                    var tableBodyRow = $('<tr>', {id: studentList[s].id});
                    for (var k in studentList[s]) {
                        tableBodyRow.append(
                            $('<td>', {text: studentList[s][k]})
                        );
                    }

                    // adding secetion button to row
                    tableBodyRow.append(
                        $('<td>').append(
                            $('<div>', {text: "Select", id: studentList[s].id + "-btn", class: "btn btn-warning"})
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
                    scrollY: 200,
                    bPaginate: false,
                    stripeClasses: []
                });
            }
            else {
                wrapper.append(
                    $('<div>', {class: "alert alert-success", text: "No Unmatched Entries fround"})
                );
            }


        })
        .fail(function () {
            console.log('matchapi/getSection' + id + ' : failed')
        });
}

/**
 * Description:
 * Parameters:
 * Returns:
 */
function selectStudent(id) {
    id = id.split('-')[0];
    console.log(id);

    if (selectedStudentId == null) {
        $("#" + id).addClass('success');
        selectedStudentId = id;
    }
    else {
        $("#" + selectedStudentId).removeClass('success');
        $("#" + id).addClass('success');
        selectedStudentId = id;
    }


}


