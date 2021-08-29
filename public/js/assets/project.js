function save(){
	$("#submitProject").click(function(){
		$.post('/project/save', $("#FormProject").serializeObject(), function(status){
			if(status == "Save"){
				notification("Save Project","Project Saved Successfully","success",3000);
			}else if(status == "Update"){
				notification("Update Project","Project Updated Successfully","success",3000);
			}else{
				notification("Error","An error occurred, try again","error",3000);
			}
			clearForm("FormProject");
			$('.btn-refresh').trigger('click');
		});
	});
}

function list(){
	$(".btn-refresh").click(function(){
		$.get('/project/list',function(data){
			$(".list-projects").html("");
			if(data.myprojects.length > 0)
			{
				for (var i = 0; i < data.myprojects.length; i++) {
					addviewmyprojects(data.myprojects[i].id,data.myprojects[i].name,data.myprojects[i].description);
				}
			}
			if(data.projects.length > 0)
			{
				for (var i = 0; i < data.projects.length; i++) {
					addviewproject(data.projects[i].id,data.projects[i].name,data.projects[i].description);
				}
			}
		});
	});
}

function remove(id) {
	if(id > 0 ){
		(new PNotify({
			title: 'Confirmation',
			text: '¿Are you sure?',
			icon: 'glyphicon glyphicon-question-sign',
			hide: false,
			confirm: {
				confirm: true
			},
			buttons: {
				closer: false,
				sticker: false
			},
			history: {
				history: false
			}
			})).get().on('pnotify.confirm', function(){
				$.get('/project/delete/'+id,function(rpta){
					if (rpta == "Removed"){
						notification('Remove Project','Project Removed Successfully','success',3000);
						$('.btn-refresh').trigger('click');
					}else
						notification('Error','An error occurred, try again','error',3000);
				});
		});
	}
}

function addviewproject(id,title,description)
{
	var html;
	html  = '<div class="col-md-3 my-project grow">';
	html += '<div class="card-box widget-box-1" style="border: none;margin-bottom: 0px !important;">';
	html += '<i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" data-original-title="'+description+'"></i>';
	html += '<a  href="/project/detail/'+id+'" class="text-dark" style="font-size: 15px;">' + title;
	html += '</a></div></div>';

	$(".list-projects").append(html);

	$("[data-toggle=tooltip]").tooltip();
}

function addviewmyprojects(id,title,description) {
	var html;
	html  = '<div class="col-md-3 my-project grow">';
	html += '<div class="card-box widget-box-1" style="border: none;margin-bottom: 0px !important;">';
	html += '<a onclick="remove('+id+');"><i class="fa fa-trash pull-right inform" style="color: red;"></i></a>';
    html += '<a href="#" data-toggle="modal" data-idproject="'+id+'" class="btn-send-invitation" data-target="#modalInvitation"><i class="fa fa-user-plus pull-right inform"></i></a>';
	html += '<i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" data-original-title="'+description+'"></i>';
	html += '<a  href="/project/detail/'+id+'" class="text-dark" style="font-size: 15px;">' + title;
	html += '</a></div></div>';

	$(".list-projects").append(html);

	$("[data-toggle=tooltip]").tooltip();

}
