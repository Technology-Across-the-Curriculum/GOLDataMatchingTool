/**
 * Created by nathanhealea on 3/7/17.
 */
var studentModal = null;
var btnDetail = 'btn-detail-';
var dataTable = null;

$(function () {

    // Load modal and save the object
    studentModal = $('#student-modal').modal({'show': false});


    /*$("[id*='" + btnDetail + "']").on('click',function(){

     var id = this.id.replace(btnDetail, '');

     // Show the modal
     studentModal.modal('show');
     $.when(getStudentData(id)).done(function(json){

     var data = JSON.parse(json);
     console.log(data);
     buildTable(data);


     })

     })*/

    // Modal Close Button
    $('#btn-modal-close').on('click', function () {
        emptyTable();
    });

    // Modal Exit Button
    $('#btn-modal-exit').on('click', function () {
        emptyTable();
    });

    // Onclick events for table Details button
    $('#classlist-table tbody').on('click', 'div.btn', function () {

        var id = this.id.replace(btnDetail, '');
        studentModal.modal('show');
        $.when(getStudentData(id)).done(function (json) {

            var data = JSON.parse(json);
            console.log(data);

            buildTable(data);


        })
    })
});

function getStudentData(id) {
    return $.ajax({
        type: "get",
        async: false,
        url: url + 'dataapi/getPaticipants/' + id
    })
}

function buildTable(data) {
    dataTable = $('#student-data').DataTable({
        "data": data,
        "destroy": true,
        "columns": [
            {"data": "id"},
            {"data": "first"},
            {"data": "last"},
            {"data": "lmsid"},
            {"data": "email"}
        ]
    });

    

}

function emptyTable() {
    dataTable.destroy();
}


