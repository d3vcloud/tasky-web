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

function addUser()
{
    $("#addUser").click(function () {
        $.post('/project/adduser',{ emails:$("#emails").tagsinput('items'),id:$("#id").val() },function(data){
            if(data == "Added")
            {
                notification("Add User","User Added Successfully","success",3000);
            }
        });
    });
}

var select = $("#listMembers");

$(".btn-send-invitation").click(function(){

    $('.selectpicker').selectpicker();

    $(".id").val($(this).data('idproject'));
    $.get('/project/getmembers/'+$(this).data('idproject'),function(data){
        for(var i=0; i<data.length; i++)
        {
            select.append("<option value='"+data[i].id+"'>"+data[i].user+"</option>");
        }
        console.log(data);
    });
})