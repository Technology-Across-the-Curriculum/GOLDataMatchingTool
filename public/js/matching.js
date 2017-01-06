/**
 * Created by: Nathan Healea
 * Project: GOLDMT
 * File:
 * Date: 12/15/16
 * Time: 1:20 PM
 */

var studentId = null;
var courseId = null;
var sectionId = null;
var sessionId = null;
var participantMatch = {};
var participantTable = null;

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
        getParticipant(sectionId);

        // When a student is selected higlight the row and save the id
        $("div.btn").click(function () {
            pid = $(this).attr('id').split('-');
            if (pid[1] == 'participant') {
                selectParticipant(pid[0]);
            }
            if (pid[1] == 'student') {
                selectStudent(pid[0]);
            }
        });

        $('#selectAll-btn').click(function () {
            selectAllParticipants();
        });

        $('#clear-btn').click(function () {
            clearAllParticipants();
        });

        $('#delete-btn').click(function () {
            deleteSelected();
        });
    });

    $('#save-btn').click(function () {
        saveMatches();
    });


    // When a user selects a section of a course
    // get the class list
    /*$("#session").change(function () {
     sessionId = $(this).val();

     });*/


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
                var tableBodyRow = $('<tr>', {id: studentList[s].id + "-cl-row"});
                for (var k in studentList[s]) {
                    tableBodyRow.append(
                        $('<td>', {text: studentList[s][k]})
                    );
                }

                // adding secetion button to row
                tableBodyRow.append(
                    $('<td>').append(
                        $('<div>', {text: "Select", id: studentList[s].id + "-student", class: "btn btn-warning"})
                    )
                );

                tableBody.append(tableBodyRow)
            }

            // Building table
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

    // Makes an ajax call to backfillapi/fillNode
    // returns stats of filled node
    $.ajax({
        type: "get",
        async: false,
        url: url + 'matchapi/getParticipant/' + section_id + '/' + session_id
    })
        .done(function (json) {
            data = JSON.parse(json);
            // applying courses to dropdown
            var keys = data['keys'];
            var participantList = data['list'];
            var wrapper = $('#participant-table-wrapper');
            var table = $('<table>', {id: "participant-table", class: "table"});
            var tableHead = $('<thead/>');
            var tableHeadRow = $('<tr/>');
            var tableBody = $('<tbody/>');


            // removing table from page
            if (wrapper.children().length > 0) {
                wrapper.empty();
            }

            if (participantList != "empty" && keys != "empty") {
                // adding header to the table
                for (var i = 0; i < keys.length; i++) {
                    tableHeadRow.append($('<th/>', {text: keys[i]}));
                }
                // adding options colum to table header
                tableHeadRow.append($('<th/>', {text: "Options"}));

                // adding information to the table
                for (var s = 0; s < participantList.length; s++) {
                    var tableBodyRow = $('<tr>', {id: participantList[s].id + '-pl-row'});
                    for (var k in participantList[s]) {
                        tableBodyRow.append(
                            $('<td>', {text: participantList[s][k]})
                        );
                    }

                    // adding secetion button to row
                    tableBodyRow.append(
                        $('<td>').append(
                            $('<div>', {
                                text: "Select",
                                id: participantList[s].id + "-participant",
                                class: "btn btn-warning"
                            })
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
                    stripeClasses: [],
                    "dom": '<"toolbar">frtip'
                });

                /*participantTable = table;*/

                // adding Custom tool bar
                var toolbar = $("div.toolbar");
                var selectAllBtn = $('<div>', {id: 'selectAll-btn', class: "btn btn-primary", text: "Select All"});
                var clearBtn = $('<div>', {id: 'clear-btn', class: 'btn btn-warning', text: 'Clear'});
                var deleteBtn = $('<div>', {id: 'delete-btn', class: 'btn btn-danger', text: 'Delete Selected'});
                toolbar.append(selectAllBtn);
                toolbar.append(clearBtn);
                toolbar.append(deleteBtn);


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
    if (studentId == null) {
        $("#" + id + "-cl-row").addClass('info');
        studentId = id;
    }
    else if (studentId == id) {
        $("#" + studentId + "-cl-row").removeClass('info');
        studentId = null;
    }
    else {
        $("#" + studentId + "-cl-row").removeClass('info');
        $("#" + id + "-cl-row").addClass('info');
        studentId = id;
    }
}

/**
 * Description:
 * Parameters:
 * Returns:
 */
function selectParticipant(id) {
    if (participantMatch[id]) {
        $("#" + id + "-pl-row").removeClass('info');
        delete participantMatch[id];
    }
    else {
        $("#" + id + "-pl-row").addClass('info');
        participantMatch[id] = 1;
    }
}

/**
 * Description:
 * Parameters:
 * Returns:
 */
function selectAllParticipants() {
    var tbody = $('#participant-table-wrapper table tbody');
    var rows = tbody.children();
    rows.each(function () {
        var id = this.id.split('-')[0];
        $("#" + this.id).addClass('info');
        participantMatch[id] = 1
    });
}

/**
 * Description:
 * Parameters:
 * Returns:
 */
function clearAllParticipants() {
    var tempParticipantMatch = participantMatch;
    for (var key in tempParticipantMatch) {
        $("#" + key + "-pl-row").removeClass('info');
        delete participantMatch[key];
    }
}

/**
 * Description:
 * Parameters:
 * Returns:
 */
function saveMatches() {
    var student = true;
    var participant = true;

    $('#error-message').empty();

    // check for data being selected
    if (studentId == null || studentId == undefined) {
        $('#error-message').append(
            $('<div>', {text: "Please select a student.", class: 'col-lg-12 alert alert-warning '})
        );
        student = false;
    }

    if ($.isEmptyObject(participantMatch)) {
        $('#error-message').append(
            $('<div>', {text: "Please select a participant.", class: 'col-lg-12 alert alert-warning '})
        );
        participant = false;
    }

    if (student && participant) {
        var data = {'studentId': studentId, 'matches': participantMatch};
        $.ajax({
            type: "POST",
            async: false,
            data: data,
            url: url + 'matchapi/match'
        })
            .done(function (json) {
                var data = JSON.parse(json);

                // remove successfull match from table
                for (var key in data) {

                    if (data[key] == 's') {
                        $('#' + key + '-pl-row').removeClass('info');
                        $('#' + key + '-pl-row').addClass('success');
                    }
                    else {
                        $('#' + key + '-pl-row').removeClass('info');
                        $('#' + key + '-pl-row').addClass('warning');
                    }
                }

                // Resetting the participant match after success of action.
                participantMatch = {};

            })
            .fail(function () {
            });



    }
    else {
        console.log("data not saved");
    }

}


/**
 * Description:
 * Parameters:
 * Returns:
 */
function deleteSelected() {
    var participant = true;
    console.log(participantMatch);
    $('#error-message').empty();


    // check if there are participant selected.
    if ($.isEmptyObject(participantMatch)) {
        $('#error-message').append(
            $('<div>', {text: "Please select a participant(s) to delete.", class: 'col-lg-12 alert alert-warning '})
        );
        participant = false;
    }

    if (participant) {
        var data = participantMatch;
        $.ajax({
            type: "POST",
            async: false,
            data: data,
            url: url + 'matchapi/deleteRecord'
        })
            .done(function (json) {
                console.log(json);
                var data = JSON.parse(json);
                console.log(data);

                // remove successfull match from table
                for (var key in data) {
                    if (data[key] == 's') {
                        $('#' + key + '-pl-row div.btn').remove();
                        $('#' + key + '-pl-row').removeClass('info');
                        $('#' + key + '-pl-row').addClass('danger');
                    }
                    else {
                        console.log(data[key]);
                        $('#' + key + '-pl-row').removeClass('info');
                        $('#' + key + '-pl-row').addClass('warning');
                    }
                }
                console.log(participantMatch);

                // Resetting participantMatch after success of action.
                participantMatch = {};

            })
            .fail(function () {
            })

    }
    else {
        console.log("data not saved");
    }

}


