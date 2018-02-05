const form = document.querySelector("#formCheckList");

function newSubTask(name,data,newId){
    $.post('/subtask/save',{name:name},function(rpta){
        data.before(name);
        data.parent().parent().removeClass('editing');
        data.parent().after('<span class="delete-item" onclick="removeSubTask('+rpta+',this)"           title="remove"><i class="fa fa-trash"></i></span>');
        data.remove();

        //assign event to new checbox of input
        var checkbox = document.getElementById(newId);
        checkbox.addEventListener('change',function(){
            updateSubTask(rpta,checkbox);
        });
    });
}

function removeSubTask(id,cont){
    $.get('/subtask/delete/'+id,function(rpta){
        if(rpta == "Removed")
            form.removeChild(cont.parentElement);
    });
}

function updateSubTask(id,check){
    var value = parseFloat($("#progressbar").data("value"));
    var res;
    $.post('/subtask/update',{id:id,status:check.checked,field:'status'},function(rpta){
        if(rpta == "Updated")
        {
            if(check.checked) value += parseFloat(check.value);
            else value -= parseFloat(check.value);

            $("#progressbar").data("value",value);

            if(value < 0) res = 0;
            else if(value > 99.99) res = 100;
            else res = value.toFixed(0);

            $("#progressbar").width(res+"%");
            $("#progressbar").text(res+"%");
        }
    });
}