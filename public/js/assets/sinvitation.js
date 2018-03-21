function send()
{
    $("#send").click(function () {
        $("#loading").show();
        $.post('/send',{ emails:$("#emails").tagsinput('items'),id:$(".id").val() },function(data){
            if(data == "Sent")
            {
                $("#loading").hide();
                notification("Send Invitation","Invitation Sent Successfully","success",3000);
                $('#emails').tagsinput('removeAll');
            }
        });
    });
}

function addUser()
{
    $("#addUser").click(function () {
        $.post('/project/adduser',$("#FormAddUser").serializeObject(),function(data){
            if(data == "Added")
            {
                notification("Add User","User Added Successfully","success",3000);
                $('#listMembers').selectpicker('deselectAll');
            }
        });
    });
}



$(".btn-send-invitation").click(function(){

    $("#listMembers").empty();
    $('#listMembers').selectpicker('destroy');

    $(".id").val($(this).data('idproject'));

    $.get('/project/getmembers/'+$(this).data('idproject'),function(data){
        if(data.length)
        {
            for(var i=0; i<data.length; i++)
            {
                $('#listMembers').append($("<option></option>")
                    .attr("value", data[i].id)
                    .text(data[i].user));
            }
        }
        //console.log(data);
        $('#listMembers').selectpicker();
    });
});