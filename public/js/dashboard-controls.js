/**
 * Created by nathanhealea on 3/7/17.
 */
var studentModal = null;
var btnDetail = 'btn-detail-';
var dataTable = null;
var mismatch = {};
var row = null;

$(function () {

    // Load modal and save the object
    studentModal = $('#student-modal').modal({'show': false});

    // Modal Close Button
    $('#btn-modal-close').on('click', function () {
        emptyTable();
    });

    // Modal Exit Button
    $('#btn-modal-exit').on('click', function () {
        emptyTable();
    });

    $('#btn-modal-save').on('click',function(){
        saveMismatches();
        //emptyTable();
    });

    // Onclick events for table Details button
    $('#classlist-table tbody').on('click', 'div.btn', function () {

        var id = this.id.replace(btnDetail, '');
        studentModal.modal('show');
        $.when(getStudentData(id)).done(function (json) {
            var data = JSON.parse(json);

            data = addSelectBtn(data);
            console.log(data);
            buildTable(data);
        })
    })
});

/**
 * Gets all match records of selected student
 * @param id
 * @returns {*}
 */
function getStudentData(id) {
    return $.ajax({
        type: "get",
        async: false,
        url: url + 'dataapi/getPaticipants/' + id
    })
}

/**
 * Build a table that list all matches
 * @param data
 */
function buildTable(data) {
    dataTable = $('#student-data').DataTable({
        "data": data,
        "destroy": true,
        "columns": [
            {"data": "id"},
            {"data": "first"},
            {"data": "last"},
            {"data": "lmsid"},
            {"data": "email"},
            {"data": "option"}
        ]
    });

    $('#student-data tbody').on('click', 'tr td div.btn ', function (){
        console.log(this.id);
        var row = $('#'+ this.id);
        selectRow(this, row);
    });

}

/**
 * Empties and uninitializes DataTable
 */
function emptyTable() {
    dataTable.destroy();
    $('#student-data tbody').empty();

}

/**
 * Changes row color depending on if the selected
 *  Also addes/remove the row id from mustached list.
 * @param row
 */
function selectRow(btn, row){
    if($(row).hasClass('alert-warning')){
        $(row).removeClass('alert-warning');
        $(btn).children('i').removeClass('fa-times');
        $(btn).children('i').addClass('fa-circle-o');
        mismatch[btn.id] = "false";
    }
    else{
        $(row).addClass('alert-warning');
        $(btn).children('i').removeClass('fa-circle-o');
        $(btn).children('i').addClass('fa-times');
        mismatch[btn.id] = "true";
    }
    console.log(mismatch);

}

/**
 *  Adds a select button in to data object.
 * @param data
 * @returns {*}
 */
function addSelectBtn(data){
    for(var d in data){
        data[d]['option'] = '<div id="' + data[d].id + '" class="btn btn-default btn-sm"><i class="fa fa-circle-o" aria-hidden="true"></i></div>'
    }
    return data;
}

/**
 *
 */
function saveMismatches(){
    $.ajax({
        type: "POST",
        async: false,
        data: mismatch,
        url: url + 'matchapi/unmatch'
    })
        .done(function(json){
            console.log(json);

        })
        .fail(function(){

        });
}


