function saveLabel()
{
    $(".label-click").click(function(){
        $.post('/label/save',{ color:$(this).data('color'),name:$("#nameLabel").val() },function(rpta){
            if(rpta == "Saved") {
                $("#nameLabel").val('');
                $("#nameLabel").focus();
            }
        });
    });
}