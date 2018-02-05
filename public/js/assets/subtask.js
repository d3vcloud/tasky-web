const form = document.querySelector("#formCheckList");

function newSubTask(name,data,newId){
    var res;
    $.post('/subtask/save',{name:name},function(rpta){
       if(rpta.status == "Saved")
       {
           data.before(name);
           data.parent().parent().removeClass('editing');
           data.parent().after('<span class="delete-item" onclick="removeSubTask('+rpta.id+',this)"           title="remove"><i class="fa fa-trash"></i></span>');
           data.remove();

           res = calculateValueProgress(rpta.total,rpta.completed);

           setValueProgress(res.toFixed(0));

           //assign event to new checbox of input
           var checkbox = document.getElementById(newId);
           checkbox.addEventListener('change',function(){
               updateSubTask(rpta.id,checkbox);
           });
       }
    });
}

function removeSubTask(id,cont){
    var res;
    $.get('/subtask/delete/'+id,function(rpta){
        if(rpta.status == "Removed"){
            form.removeChild(cont.parentElement);

            res = calculateValueProgress(rpta.total,rpta.completed);

            setValueProgress(res.toFixed(0));
        }

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

            setValueProgress(res);
        }
    });
}

function calculateValueProgress(total,completed)
{
    var res1,res2;

    res1 = 100 / total;

    res2 = (completed / total) * 100;

    $("input[type=checkbox]").val(res1);

    $("#progressbar").data("value",res2);

    return res2;
}

function setValueProgress(val) {
    $("#progressbar").width(val+"%");
    $("#progressbar").text(val+"%");
}