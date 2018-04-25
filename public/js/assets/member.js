function addMemberToTask()
{
    var id,isSelected,sel;
    $("#members").on('click','.btn-member',function(){

        sel = $(this);
        id = sel.data('id');

        if(sel.hasClass('selected')) {
            sel.removeClass('selected').addClass('deselected'); isSelected = 0;
        }else{
            sel.removeClass('deselected').addClass('selected'); isSelected = 1;
        }

        if(id != 0 || id > 0)
        {
            $.post('/task/addmember',{id:id,selected:isSelected},function(data){
                
                if(data.status == "Success")
                {
                    if(isSelected) concatMember(data.user.id,data.user.photo,data.user.last_name,data.taskid);
                    else removeMemberHTML(data.user.id,data.taskid);

                    if($("#membersTask > img").length) $("#listMembers").show();
                    else $("#listMembers").hide();
                }
            });
        }
    });
}

//Agrega contenedor vista usuario dentro del detalle
function concatMember(id,img,alt,idTask)
{
    var memberTask = document.getElementById('membersTask');
    memberTask.innerHTML += '<img id="memberTD'+id+'" style="border-radius: 6px;border:1px solid #4c5667" alt="'+alt+'" ' +
        'height="35" width="35" src="'+img+'">';

    $(".mt"+idTask).append('<img id="memberTV'+id+''+idTask+'" data-task-id="'+idTask+'" data-id="'+id+'" src="'+img+'" alt="'+alt+'" ' +
        'class="thumb-sm rounded-circle img-task task-user img-user-main" data-placement="bottom">');

    sendEmail("has added you to the task:",idTask,id);
}

//Elimina contenedor vista usuario dentro del detalle
function removeMemberHTML(idUser,idTask)
{
    $("#memberTD"+idUser).remove();
    $("#memberTV"+idUser+""+idTask).remove();
    sendEmail("has eliminated you from the task:",idTask,idUser);
}

//Elimina contenedor de la tarjeta ademas de eliminar el usuario de la BD
function removeMember()
{
    var user,idUser,idTask;
    $(".text-muted").on('click','.task-user',function(){
        user = $(this);
        idUser = user.data('id');
        idTask = user.data('task-id');

        $.post('/task/rmvmember',{idUser:idUser,idTask:idTask},function(data){
            if(data == "Success")
            {
                var elem = document.getElementById('memberTV'+idUser+""+idTask);
                elem.parentNode.removeChild(elem);
                sendEmail("has eliminated you from the task:",idTask,idUser);
            }
        });
    });
}

//Envia mail despues de agregar o eliminar un usuario de una tarea
function sendEmail(msj,idTask,idUser)
{
    $.post('/task/sendemail',{idUser:idUser,msj:msj,idTask:idTask},function(response){
        console.log(response);
    });
}