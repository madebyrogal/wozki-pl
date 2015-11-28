$(document).ready(function(){
  removeBlur();
  changeMainImageGallery();
  initPrettyPhoto();
  ciasteczka(0);
});

//Usuwa mrówki wokoło kliknietego obszaru
function removeBlur(){
  $("a").bind("focus",function(){
    if(this.blur)
      this.blur();
  });
}

//Zmienia zdjecie na karcie produktu
function changeMainImageGallery(){
  $(".thumbGallery").click(function(e){
    e.preventDefault();
    var newImg = $(this).attr('data-img');
    $('#mainGalleryImage').attr('src', newImg);
  })
}

//Inicjacja prettyPhoto
function initPrettyPhoto(){
  $("a[rel^='prettyPhoto']").prettyPhoto({
    autoplay_slideshow: false,
    social_tools: false
  });
}

//Akceptacja ciasteczek
function ciasteczka(a)
{
  if(a>0)
  {
    $.cookie('ciasteczka_accept', '1', {
      path: '/', 
      expires: 3650
    });
    $('#ciasteczka_alert').hide();
  }
  else
  {
    if($.cookie('ciasteczka_accept')>=0)
      $('#ciasteczka_alert').hide();
    else
      $('#ciasteczka_alert').show();
  }
}