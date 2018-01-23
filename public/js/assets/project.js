function save(){
	$("#submitProject").click(function(){
		$.post('/project/save', $("#FormProject").serializeObject(), function(status) {
			if(status == "Save"){
				notification("Save Project","Project Save Successfully","success",3000);
				addviewproject($("#name").val(),$("#description").val());
				//$('.btn-refresh').trigger('click');
			}else if(status == "Update"){
				notification("Update Project","Project Updated Successfully","success",3000);
			}else{
				notification("Error","An error occurred, try again","error",3000);
			}
			clearForm("FormProject");
		});
	});
}

function list(){
	$(".btn-refresh").click(function(){
		$.get('/project/list',function(projects){
			if(projects.length > 0)
			{
				$(".list-projects").html("");
				for (var i = 0; i < projects.length; i++) {
					addviewproject(projects[i].name,projects[i].description);
				}
			}
		});
	});
}

function addviewproject(title,description) {

	$html  = '<div class="col-md-3 my-project grow">'; 
	$html += '<div class="card-box widget-box-1" style="border: none;margin-bottom: 0px !important;">';
	$html += '<i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" data-original-title="'+description+'"></i>';
	$html += '<span class="text-dark" style="font-size: 15px;">' + title;
	$html += '</span></div></div>';

	$(".list-projects").append($html);
}
