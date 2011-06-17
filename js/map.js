  var geocoder;
  var map;
  var infowindow = new google.maps.InfoWindow();
  var marker;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(54.050,-2.800);
    var myOptions = {
      zoom: 12,
      center: latlng,
      mapTypeId: 'roadmap'
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    //Create Marker Content
    var contentString = '<div id="content">'+
    '<div id="siteNotice">'+
    '</div>'+
    '<h1 id="firstHeading" class="firstHeading">Lancaster University</h1>'+
    '</div>';
  
    //Info Window Listener
    var infowindow = new google.maps.InfoWindow({
    content: contentString
    });
    
    //Create Markers
      var marker = new google.maps.Marker({
      position: new google.maps.LatLng(54.050,-2.800), 
      map: map, 
      title:"Lancaster University Graduate College"
  });
      var marker1 = new google.maps.Marker({   
      position: new google.maps.LatLng(54.480,-2.740),
      map: map,
      title:"Lancaster City Center"
  });
  
  google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
}); 
  }
 
  function codeLatLng() {
    var input = document.getElementById("latlng").value;
    var latlngStr = input.split(",",2);
    var lat = parseFloat(latlngStr[0]);
    var lng = parseFloat(latlngStr[1]);
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[1]) {
          map.setZoom(11);
          marker = new google.maps.Marker({
              position: latlng, 
              map: map
          }); 
          infowindow.setContent(results[1].formatted_address);
          infowindow.open(map, marker);
        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }