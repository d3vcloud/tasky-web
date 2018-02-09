function saveComment()
{
    $("#comment").keyup(function(e) {
        var code = e.keyCode ? e.keyCode : e.which;
        if (code == 13) {
            $.post('/comment/save',{ comment:$(this).val() },function(rpta){
                if(rpta.status == "Saved"){
                    concatActivity(rpta.activity.date_time,
                        rpta.photo,
                        rpta.username,
                        rpta.user,
                        rpta.activity.message);
                    $("#comment").val("");
                }
            });

        }
    });
}



function concatActivity(date,photo,username,user,message)
{
    var activity = "";
    activity += '<div class="time-item">';
    activity += '<div class="item-info item-info-customize">';
    activity += '<div class="text-muted"><small>'+moment(date.date).fromNow()+'</small></div>';
    activity += '<p>';
    activity += '<img class="align-self-start rounded mr-3 img-fluid img-customize thumb-sm" ' +
        'src="'+photo+'" alt="'+username+'" />';
    activity += '<a href="#" class="text-info">'+user+'</a> '+message+'';
    activity += '</p>';
    activity += '</div>';
    activity += '</div>';

    $(".timeline-2").prepend(activity);

}