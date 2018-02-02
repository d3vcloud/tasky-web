//modify buttons style
$.fn.editableform.buttons =
        '<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light"><i class="md md-check"></i></button>' +
        '<button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect"><i class="md md-close"></i></button>';

const upcoming = document.querySelector('#upcoming');

function newTask() {
    $(".btn-add-task").click(function() {
        var html = '<li class="task-detail task-main">';
        html += '<div class="pull-right">';
        html += '<a href="#" onclick="save(this);" class="btn-check"><i class="fa fa-check"' +
            'style="color: green;cursor: pointer;"></i></a>  ';
        html += '<a href="#" onclick="cancel(this);" class="btn-cancel"><i class="fa fa-times"' +
            'style="color: red;cursor: pointer;"></i></a>';
        html += '</div>';
        html += '<form action="" method="POST" id="FormTask">';
        html += '<span class="task-title">';
        html += '<input type="text" name="task" id="task-field" class="input-cus" required' +
            'autofocus/>';
        html += '</span>';
        html += '</form>';
        html += '</li>';

        $("#upcoming").append(html);

        $('#task-field').focus();
    });
}

function cancel (container) {
    const first = container.parentElement;
    const second = first.parentElement;
    upcoming.removeChild(second);
}

function save (form) {
    var html = "";

    $.post('/task/save',$("#FormTask").serializeObject(),function(data){
        if(data.status == "Saved"){
            var nameTask = $("#task-field").val();

            //Delete current container task "li"
            const first = form.parentElement;
            const second = first.parentElement;
            upcoming.removeChild(second);

            //Add task with trash icon
            html += '<li class="task-detail task-main ui-sortable-handle">';
            html += '<div class="pull-right">';
            html += '<a onclick="remove('+data.id+',this)">';
            html += '<i class="fa fa-trash" style="color: red;cursor: pointer;"></i>';
            html += '</a>';
            html += '</div>';
            html += '<a class="task-title btn-task-detail" data-url="/task/detail/'+data.id+'"' +
                'data-toggle="modal" data-target="#modalDetail">' +nameTask+ '</a></li>';
                                
            $("#upcoming").append(html);
        }

    });
}

function remove(id,cont) {
    if(id > 0 ){
        (new PNotify({
            title: 'Confirmation',
            text: '¿Are you sure?',
            icon: 'glyphicon glyphicon-question-sign',
            hide: false,
            confirm: {
                confirm: true
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
            })).get().on('pnotify.confirm', function(){
                $.get('/task/delete/'+id,function(rpta){
                    if (rpta == "Removed"){
                        notification('Remove Task','Task Removed Successfully','success',3000);
                        
                        //Delete current container task "li"
                        const first = cont.parentElement;
                        const second = first.parentElement;
                        second.parentElement.removeChild(second);
                    }else
                        notification('Error','An error occurred, try again','error',3000);
                });
        });
    }
}

function updateDate(datep) {
    $.post('/task/update',{value:datep,name:"dueDateTask"},function(rpta){
        console.log(rpta);
    });
}

function showInformation() {
    var description = "";
    var due_date = "";
    var html,status;
   $('#upcoming').on('click','.btn-task-detail',function(){
        var url = $(this).data('url');
        html = "";
        $.get(url,function(data){
            $('#titleTask').editable('setValue', data.task.name);
            
            if(data.task.description == null || data.task.description == "")
                description = 'Edit description';
            else description = data.task.description;

            $("#descriptionTask").editable('setValue',description);

            if(data.task.due_date == null || data.task.due_date == "") due_date = "";
            else  due_date = moment(data.task.due_date).format('DD-MMM - HH:mm');

            $("#dueDate").val(due_date);

            $("#containerST").html("");

            if(data.subtasks.length){

                for(var i=0; i<data.subtasks.length; i++){
                    if(data.subtasks[i].isComplete) status = "checked";
                    else status = "";

                    html += '<span class="todo-wrap" style="height: 36px;">';
                    html += '<input type="checkbox" ' +
                        'onchange="updateSubTask('+ data.subtasks[i].id +',this);" ' +
                        'id="C'+ data.subtasks[i].id +'" '+status+'>';
                    html += '<label for="C'+ data.subtasks[i].id +'" ' +
                        'class="todo"><i class="fa ' +
                        'fa-check"></i>'+ data.subtasks[i].name +'</label>';
                    html += '<span class="delete-item" ' +
                        'onclick="removeSubTask('+ data.subtasks[i].id +',this)"' +
                        ' title="remove"><i class="fa fa-trash"></i></span>';
                    html += '</span>';

                }
                $("#containerST").html(html);
            }

            //if(data.attachments.length)
            console.log(data.attachments);
        });
   });
}

                                
