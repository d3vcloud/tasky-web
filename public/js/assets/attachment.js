function getAll(){
    var table = $("#ListAttachments tbody");
    var date = "";
    var tbody;
    table.html('');
    $.get('/attachment/getall',function(data){
        //console.log(data);
        if(data.length){

            for (var j = 0; j < data.length; j++) {
                date = moment(data[j].date.date).format('YYYY-MM-DD - HH:mm');
                tbody += "<tr>";
                tbody += "<td style='text-align:center;'>"+getPreview(data[j].ext,data[j].url)+"</td>";
                tbody += "<td>";
                tbody += "<a href='/attachment/download/"+data[j].id+"'>"+data[j].name+"</a>";
                tbody += "</td>";
                tbody += "<td>"+data[j].size+"</td>";
                tbody += "<td>"+date+"</td>";
                tbody += "<td>";
                tbody += "<button class='btn btn-danger' onclick='removeAttachment("+data[j].id+",this);' style='font-size:10px;cursor:pointer;'><i class='fa fa-trash'></i></button>";
                tbody += "</td>";
                tbody += "</tr>";
            }
            table.html(tbody);
        }
    });
}

function removeAll(){
    var table = $("#ListAttachments tbody");

    $(".btn-deleteAll").click(function(){
        $.get('/attachment/removeall',function(rpta){
            if(rpta == "Removed")
                table.html('');
        });
    });
}

function removeAttachment(id,button){
    $.get('/attachment/remove/'+id,function(rpta){
        if(rpta == "Removed")
            $(button).closest("tr").remove();
    });
}