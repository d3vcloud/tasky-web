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
    var html,status,can,result,url,tbody,date;
    var table = $("#ListAttachments tbody");

   $('#upcoming').on('click','.btn-task-detail',function(){

        url = $(this).data('url');
        html = "";
        can = 0;
        table.html('');
        tbody = "";

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
            $(".progress-md").html("");

            if(data.subtasks.length){

                for(var i=0; i<data.subtasks.length; i++){
                    if(data.subtasks[i].isComplete) {
                        status = "checked";
                        ++can;
                    }
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

                result = (can / data.subtasks.length) * 100;

                $(".progress-md").html('<div class="progress-bar progress-bar-inverse" ' +
                    'role="progressbar" aria-valuenow="'+ result.toFixed(0) +'"' +
                    'aria-valuemin="0" aria-valuemax="100" ' +
                    'style="width:'+result.toFixed(0)+'%;font-size:12.8px;">' +
                    ''+ result.toFixed(0) +'%</div>');
            }

            //console.log(data.attachments);

            if(data.attachments.length){
                for (var j = 0; j < data.attachments.length; j++) {
                    date = moment(data.attachments[j].date.date).format('YYYY-MM-DD - HH:mm');
                    tbody += "<tr>";
                    tbody += "<td style='text-align:center;'>"+getPreview(data.attachments[j].ext,data.attachments[j].url)+"</td>";
                    tbody += "<td>";
                    tbody += "<a href='/attachment/download/"+data.attachments[j].id+"'>"+data.attachments[j].name+"</a>";
                    tbody += "</td>";
                    tbody += "<td>"+data.attachments[j].size+"</td>";
                    tbody += "<td>"+date+"</td>";
                    tbody += "<td>";
                    tbody += "<button class='btn btn-danger' onclick='removeAttachment("+data.attachments[j].id+",this)' style='font-size:10px;cursor:pointer;'><i class='fa fa-trash'></i></button>";
                    tbody += "</td>";
                    tbody += "</tr>";
                }
                table.html(tbody);
            }
        });
   });
}

function getPreview(ext,url){
    var icon;

    if (ext == "xlsx" || ext == "xls" || ext == "xlsm") {
		icon = "<i class='fa fa-file-excel-o fa-3x'></i>";
    }else if (ext == "tiff" || ext == "png" || ext == "jpg" || ext == "jpeg" 
        || ext == "tif" || ext == "bmp" || ext == "gif") {
		icon = "<img width='80px' alt='Image' src='/"+url+"'/>";
	}else if (ext == "doc" || ext == "docx") {
		icon = "<i class='fa fa-file-word-o fa-3x'></i>";
	}else if (ext == "pptx" || ext == "ppt" || ext == "pptm") {
		icon = "<i class='fa fa-file-powerpoint-o fa-3x'></i>";
    }else if (ext == "mp4" || ext == "avi" || ext == "mov" || ext == "wmv" 
        || ext == "mkv" || ext == "3gp") {
		icon = "<i class='fa fa-file-video-o fa-3x'></i>";
	}else if (ext == "pdf") {
		icon = "<i class='fa fa-file-pdf-o fa-3x'></i>";
	}else if (ext == "html" || ext == "css" || ext == "js") {
		icon = "<i class='fa fa-file-code-o fa-3x'></i>";
	}else if (ext == "mp3" || ext == "wma" || ext == "wav") {
		icon = "<i class='fa fa-file-sound-o fa-3x'></i>";
	}else if (ext == "zip" || ext == "rar") {
		icon = "<i class='fa fa-file-zip-o fa-3x'></i>";
	}else if (ext == "txt") {
		icon = "<i class='fa fa-file-text-o fa-3x'></i>";
	}else {
		icon = "<i class='fa fa-file-o fa-3x'></i>";
    }
    return icon;
}

                                
