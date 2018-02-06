function saveComment()
{
    $("#comment").keyup(function(e) {
        var code = e.keyCode ? e.keyCode : e.which;
        if (code == 13) {
            $.post('/comment/save',{ comment:$(this).val() },function(rpta){
                if(rpta.status == "Saved"){
                    concatComment(rpta.activity.date_time,
                        rpta.photo,
                        rpta.username,
                        rpta.user,
                        $("#comment").val());
                    $("#comment").val("");
                }
            });

        }
    });
}

function concatComment(date,photo,username,user,message)
{
    var activity = "";
    activity += '<div class="time-item">';
    activity += '<div class="item-info">';
    activity += '<div class="text-muted"><small>'+date+'</small></div>';
    activity += '<p>';
    activity += '<img class="align-self-start rounded mr-3 img-fluid thumb-sm" ' +
        'src="'+photo+'" alt="'+username+'" />';
    activity += '<a href="#" ' +
        'class="text-info">'+user+'</a> commented this task';
    activity += '</p>';
    activity += '<p><em>'+message+'</em></p>';
    activity += '</div>';
    activity += '</div>';

    $(".timeline-2").prepend(activity);

}