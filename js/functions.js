function refreshTable(){
    $('#usersTable').DataTable().ajax.reload();
}


function formVal(el){
    $(el).each(function(){
        if( !$(this).val() ){
            $(this).addClass('has-error');
        }else{
            $(this).removeClass('has-error');
        }

        $(this).on('keyup', function(){
            if( $(this).val() ){
                $(this).removeClass('has-error');
            }
        });
    })
}

function resetForm(formID){
    $(formID).find('input, select, textarea').each(function(){
        if($(this).length){
            $(this).val('');
        }
    });
}