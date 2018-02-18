function saveLabel()
{
    $(".label-click").click(function(){
        $.post('/label/save',{ color:$(this).data('color'),name:$("#nameLabel").val() },function(rpta){
            if(rpta.status == "Saved") {
                concatLabel(rpta.label.name,rpta.label.color,rpta.taskid);
                $("#nameLabel").val('');
                $("#nameLabel").focus();
            }
        });
    });
}

function concatLabel(name,color,id)
{
    $(".card-tags-detail").append('<span class="card-label-detail" ' +
        'style="background-color:'+color+'" title="'+name+'">'+name+'</span>');

    $(".ct"+id).append('<span class="card-label" ' +
        'style="background-color:'+color+'" title="'+name+'">'+name+'</span>');
}