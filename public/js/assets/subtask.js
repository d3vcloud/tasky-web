function newSubTask(name){
    $.post('/subtask/save',{name:name},function(rpta){
        idSubTaskGlobal = rpta;
        //console.log(rpta);
    });
}

function getAll(){
    
}

function remove(){

}

function update(){

}