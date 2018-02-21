function send()
{
    $.post('/send',{email:'neils.alfaro@gmail.com'},function(data){
       if(data == "sent")
           notification("Send Invitation","Invitation Sent Successfully","success",3000);
    });
}