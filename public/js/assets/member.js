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

                    if(isSelected) concatMember(data.user.id,data.user.photo,data.user.last_name,data.taskid);
                    else removeMemberHTML(data.user.id,data.taskid);

                    if($("#membersTask > img").length) $("#listMembers").show();
                    else $("#listMembers").hide();

            });
        }
    });
}

function concatMember(id,img,alt,idTask)
{
    $("#membersTask").append('<img id="memberTD'+id+'" style="border-radius: 6px;border:1px solid #4c5667" alt="'+alt+'" ' +
        'height="35" width="35" src="'+img+'">');

    $(".mt"+idTask).append('<img id="memberTV'+id+''+idTask+'" data-task-id="'+idTask+'" data-id="'+id+'" src="'+img+'" alt="'+alt+'" ' +
        'class="thumb-sm rounded-circle img-task task-user">');
}

function removeMemberHTML(idUser,idTask)
{
    $("#memberTD"+idUser).remove(); $("#memberTV"+idUser+""+idTask).remove();
}

function removeMember()
{
    var user,idUser,idTask;
    $(".text-muted").on('click','.task-user',function(){
        user = $(this);
        idUser = user.data('id');
        idTask = user.data('task-id');

        $.post('/task/rmvmember',{idUser:idUser,idTask:idTask},function(data){
            if(data == "Success")
                $("#memberTV"+idUser+""+idTask).remove();
        });
    });
}