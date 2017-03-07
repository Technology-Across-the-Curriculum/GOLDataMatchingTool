/**
 * Created by nathanhealea on 3/7/17.
 */
var studentModal = null;
var btnDetail = 'btn-detail-';

$(function(){

    // Load modal and save the object
    studentModal = $('#student-modal').modal({'show': false});


    $("[id*='" + btnDetail + "']").on('click',function(){

        var id = this.id.replace(btnDetail, '');

        // Show the modal
        studentModal.modal('show');
        $.when(getStudentData(id)).done(function(json){

            var data = JSON.parse(json);
            console.log(data);
            buildTable(data);


        })

    })
});

function getStudentData(id){
    return $.ajax({
        type: "get",
        async: false,
        url: url + 'dataapi/getPaticipants/' + id
    })
}

function buildTable(data){
    $('#student-data').DataTable( {
        "data":data,
        "columns": [
            { "data": "id" },
            { "data": "first" },
            { "data": "last" },
            { "data": "lmsid" },
            { "data": "email" }
        ]
    } );
}


