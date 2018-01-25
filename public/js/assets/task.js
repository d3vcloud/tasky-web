function newTask() {
    $(".btn-add-task").click(function() {
        var html = '<li class="task-detail task-main">';
        html += '<div class="pull-right">';
        html += '<a href="#" onclick="save();" class="btn-check"><i class="fa fa-check" style="color: green;cursor: pointer;"></i></a>  ';
        html += '<a href="#" onclick="cancel(this);" class="btn-cancel"><i class="fa fa-times" style="color: red;cursor: pointer;"></i></a>';
        html += '</div>';
        html += '<form action="" method="POST" id="FormTask">';
        html += '<span class="task-title">';
        html += '<input type="text" name="task" class="input-cus" required autofocus/>';
        html += '</span>';
        html += '</form>';
        html += '</li>';

        $("#upcoming").append(html);
    });
}

function cancel (container) {
    console.log(container);
}

function save () {
    $.post('/task/save',$("#FormTask").serializeObject(),function(data){
        console.log(data);
    });
}

                                
