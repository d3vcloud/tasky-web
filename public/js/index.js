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

function setTimeZone()
{
    if(localStorage.getItem('timezone') === null){

        localStorage.setItem('timezone','defined');

        var timezone_offset_minutes = new Date().getTimezoneOffset();
        timezone_offset_minutes = timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes;
        $.post('/timezone',{timezone:timezone_offset_minutes},function(data){
            console.log(data);
        });
    }
}




