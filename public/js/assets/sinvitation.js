function send()
{
    $("#send").click(function () {
        $("#loading").show();
        $.post('/send',{ emails:$("#emails").tagsinput('items') },function(data){
            if(data == "Sent")
            {
                $("#loading").hide();
                notification("Send Invitation","Invitation Sent Successfully","success",3000);
                $('#emails').tagsinput('removeAll');
            }
        });
    });
}