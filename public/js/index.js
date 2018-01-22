function clearForm(form){
	document.getElementById(form).reset();
}

function notification(title,text,type,seconds){
    new PNotify({
        title: title,
        text: text,
        type: type,
        delay: seconds
    });
}

function dateFormat(param) {
	const date = param.split("-");
	return date[2] + "/" + date[1] + "/" + date[0];
}

function deleteComma(string){
	return string.replace(/,(\s+)?$/, '');
}




