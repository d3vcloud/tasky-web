function saveComment()
{
    //
    $("#comment").keyup(function(e) {
        var code = e.keyCode ? e.keyCode : e.which;
        if (code == 13) {
            $.post('/comment/save',{ comment:$(this).val() },function(rpta){
                if(rpta == "Saved") $(this).val('');
            });

        }
    });
}