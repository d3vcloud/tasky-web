
// add items
$('#add-todo').click(function(){
  var lastSibling = $('#formCheckList > .todo-wrap:last-of-type > input').attr('id');

  if(lastSibling == undefined) lastSibling = 0;

  var newId = Number(lastSibling) + 1;
      
  $(this).before('<span class="editing todo-wrap remove-this"><input type="checkbox" ' +
      'id="'+newId+'"/><label for="'+newId+'" ' +
      'class="todo"><i class="fa fa-check"></i><input type="text" class="input-todo" ' +
      'placeholder="Enter subtask..." id="input-todo'+newId+'"/></label></div>');
  
  $('#input-todo'+newId+'').parent().parent().animate({
    height:"36px"
  },200)
  $('#input-todo'+newId+'').focus();
  
  $('#input-todo'+newId+'').enterKey(function(){
        $(this).trigger('enterEvent');
  });
  
  $('#input-todo'+newId+'').on('blur enterEvent',function(){
    var data = $(this);
    event.preventDefault();
    var todoTitle = $('#input-todo'+newId+'').val();
    var todoTitleLength = todoTitle.length;
    if (todoTitleLength > 0) {

      newSubTask(todoTitle,data,newId);//add new subtask to database

      /*$('.delete-item').click(function(){
        var parentItem = $(this).parent();
        parentItem.animate({
          left:"-30%",
          height:0,
          opacity:0
        },200);
        setTimeout(function(){ $(parentItem).remove(); }, 1000);
      });*/
    }
    else {
      $('.editing').animate({
        height:'0px'
      },200);
      setTimeout(function(){
        $('.editing').remove()
      },400)
    }
  })

});

// remove items 

/*$('.delete-item').click(function(){
 
  var parentItem = $(this).parent();
  parentItem.animate({
    left:"-30%",
    height:0,
    opacity:0
  },200);
  setTimeout(function(){ $(parentItem).remove(); }, 1000);
});*/

// Enter Key detect

$.fn.enterKey = function (fnc) {
    return this.each(function () {
        $(this).keypress(function (ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
            }
        })
    })
}


