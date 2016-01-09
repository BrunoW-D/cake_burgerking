var listeAdresse = <?php echo $listeAdresse;?>;
      var listeCp = <?php echo $listeCp;?>;
      var listeVille = <?php echo $listeVille;?>;
      var listeLat = <?php echo $listeLat;?>;
      var listeLng = <?php echo $listeLng;?>;
      var listeId = <?php echo $listeId; ?>;
      
      var listeLatLng = new Array();
      for(var j=0; j < listeId.length; j++){
        listeLatLng[j] = [parseFloat(listeLat[j]), parseFloat(listeLng[j])];
      }
      var infowindow = null;
      var infoWindow = null;

      var myLatLng;

      alert(listeAdresse);

function initMap() {
  var centerLatLng = {lat: 48.8606, lng: 2.33764};


  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: centerLatLng
  });

  setMarkers(map);

  
  infoWindow = new google.maps.InfoWindow;
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      var marker = new google.maps.Marker({
        position: pos,
        map: map
      });

      google.maps.event.addListener(marker,'click', (function(marker,infoWindow){ 
        return function() {
           infoWindow.setContent("Ma position");
           infoWindow.open(map,marker);
        };
      })(marker,infoWindow));
      
      map.setCenter(pos);
    
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}
  
  function setMarkers(map){
    for(var i = 0; i < listeLatLng.length; i++){
      myLatLng = listeLatLng[i];
      
      var description = "<html>" + listeAdresse[i] + '/ ' + listeCp[i] + '/ ' + listeVille[i] + "/ <a href='../../meals/index?id=" + listeId[i] + "' >Sélectionner</a></html>";
      
      var marker = new google.maps.Marker({
        position: {lat: myLatLng[0], lng: myLatLng[1]},
        map: map
      });

      infowindow = new google.maps.InfoWindow;

      google.maps.event.addListener(marker,'click', (function(marker,description,infowindow){ 
        return function() {
           infowindow.setContent(description);
           infowindow.open(map,marker);
        };
      })(marker,description,infowindow));
    }
  }