function send()
{
    $("#send").click(function () {
        $("#loading").show();
        $.post('/send',{ emails:$("#emails").tagsinput('items'),id:$("#id").val() },function(data){
            if(data == "Sent")
            {
                $("#loading").hide();
                notification("Send Invitation","Invitation Sent Successfully","success",3000);
                $('#emails').tagsinput('removeAll');
            }
        });
    });
}

$(".btn-send-invitation").click(function(){
    $("#id").val($(this).data('idproject'));
})