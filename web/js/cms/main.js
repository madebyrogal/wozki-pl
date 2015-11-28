$(document).ready(function(){
  initMenu();
});

//Inicjacja menu
function initMenu(){
  $(".groupName").click(function(){
    if($(this).parent().attr('class') == 'open'){
      var ul = $(this).parent();
      ul.removeClass('open');
      ul.find('li').css('display', 'none');
    }
    else{
      var ul = $(this).parent();
      ul.addClass('open');
      ul.find('li').css('display', 'block');
    }
  });
}