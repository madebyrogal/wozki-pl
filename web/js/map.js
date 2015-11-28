$(document).ready(function(){
  initialize();
})
//Inicjacja mapy google
function initialize() {
  var mapOptions = {
    center: new google.maps.LatLng(52.34099,17.868254),
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("maps"), mapOptions);
  
  //var image = '../image/icons/map_icon.png';
  var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map,
    title: 'Widlaki'
    //icon: image
  });
  
  var contentString = 
  '<div id="info_content">'+
  '<div id="info_body">'+
  '<p>'+
  'Babin Olędry 10<br />'+
  '62-420 Strzałkowo<br />'+
  'woj. wielkopolskie - Polska'+
  '</p>'+
  '</div>'+
  '</div>';
  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });
  
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}