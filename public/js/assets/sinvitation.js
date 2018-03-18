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
            /*if(data == "Added")
            {
                notification("Add User","User Added Successfully","success",3000);
            }*/
            console.log(data);
            $("li").removeClass("selected");
            $(".filter-option").text('Nothing selected');
        });
    });
}



$(".btn-send-invitation").click(function(){
    $("#listMembers").empty();

    $(".id").val($(this).data('idproject'));

    $.get('/project/getmembers/'+$(this).data('idproject'),function(data){
        $("#listMembers").append("<option value='1'>XXXXXX2</option>" +
            "<option value='2'>XXXXXX2</option>" +
            "<option value='3'>XXXXXX3</option>" +
            "<option value='4'>XXXXXX4</option>" +
            "<option value='5'>XXXXXX5</option>");

        if(data.length)
        {
            for(var i=0; i<data.length; i++)
            {
                $("#listMembers").append("<option value='"+data[i].id+"'>"+data[i].user+"</option>");
            }
        }

        //console.log(data);

        $("#listMembers").addClass('selectpicker');
        $('.selectpicker').selectpicker();
    });
});