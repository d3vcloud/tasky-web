const form = document.querySelector("#formCheckList");

function newSubTask(name,data){
    $.post('/subtask/save',{name:name},function(rpta){
        data.before(name);
        data.parent().parent().removeClass('editing');
        data.parent().after('<span class="delete-item" onclick="removeSubTask('+rpta+',this)" title="remove"><i class="fa fa-trash"></i></span>');
        data.remove();
    });
}

function getAll(){

}

function removeSubTask(id,cont){
    $.get('/subtask/delete/'+id,function(rpta){
        if(rpta == "Removed")
            form.removeChild(cont.parentElement);
       
    });
}

function updateSubTask(id,status,cont){
    //if(status == 0)
        //cont.attr('value',0);

    /*$(".updateST").click(function(){

    });*/
    console.log(id + ' ' + status);
}