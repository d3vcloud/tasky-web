function save(){
	$("#submitProject").click(function(){
		$.post('/task/save', $("#FormProject").serializeObject(), function(status) {
			if(status == "Save"){
				notification("Save Project","Project Save Successfully","success",3000);
				//$('.btn-refresh').trigger('click');
			}else if(status == "Update"){
				notification("Update Project","Project Updated Successfully","success",3000);
				//$('.btn-refresh').trigger('click');
			}else{
				notification("Error","An error occurred, try again","error",3000);
			}
			clearForm("FormProject");
		});
	});
}

function list(){
	$(".btn-refresh").click(function(){
		console.log('A');
	});
}
