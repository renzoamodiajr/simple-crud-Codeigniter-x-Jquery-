$("#usersTable").DataTable({
    "ajax": {
        "url": baseUrl + "get_data",
        "dataSrc": ""
    },
});




$(document).on('click', '#submitBtn', function(){
    let name = $("#name").val();
    let email = $("#email").val();
    $.ajax({
        url: baseUrl + "insert",
        type: 'POST',
        data:{
            name: name,
            email: email,
        },
        success:function(jsonResp){
            let response = JSON.parse(jsonResp);
            console.log(response);
            if(response.response == "error"){
                formVal("#addForm :input");
            }
            if(response.response == "success"){

                $("#addModal").modal('hide');

                resetForm("#addForm");
                refreshTable();
            }
        }
    })
})


$(document).on('click', '.updateBtn', function(){
    let id = $(this).data('id');
    let name = $("#name" + id).val();
    let email = $("#email" + id).val();

    $.ajax({
        url: baseUrl + "update",
        method: 'POST',
        data:{
            id: id,
            name: name,
            email: email
        },
        success: function(jsonResp){
            let response = JSON.parse(jsonResp);
            console.log(response);
            if(response.response == "success"){
                $("#editModal" + id).modal('hide');
                refreshTable();
            }
        }
    })

})


$(document).on('click', '.deleteBtn', function(){
    let id = $(this).data('id');

    $.ajax({
        url: baseUrl + "delete",
        method: 'POST',
        data:{
            id: id
        },
        success: function(jsonResp){
            let response = JSON.parse(jsonResp);
            console.log(response);
            if(response.response == "success"){
                $("#deleteModal" + id).modal('hide');
                refreshTable();
            }
        }
    })

})