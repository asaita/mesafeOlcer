function initMap() {
    // Harita oluşturun
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: {lat: 38.99657673036982, lng: 29.388147810525282}
    });
  
    var startLocation = new google.maps.LatLng(38.99657673036982, 29.388147810525282);
  
    // Yer işaretleyiciyi (marker) oluşturun
    var marker = new google.maps.Marker({
      position: {lat: 38.99657673036982, lng: 29.388147810525282},
      map: map,
      draggable: true
    });
  
    // Form alanlarını alın
    var latInput = document.getElementById('lat');
    var lngInput = document.getElementById('lng');
  
    marker.addListener('dragend', function() {
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();
  
      latInput.value = lat;
      lngInput.value = lng;
    });
  
    var cizimAktif = false;
  
    var cizer = new google.maps.Polyline({
      strokeColor: '#FF0000',
      strokeOpacity: 1.0,
      strokeWeight: 2,
      editable: false,
      map: map
    });
  
    var bolum = [];
  
    var bolumCiz = new google.maps.Polygon({
      paths: bolum,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35
    });
  
    bolumCiz.setMap(map);
  
    map.addListener('click', function(event) {
      if (!cizimAktif) {
        cizimAktif = true;
        bolum = [];
        bolum.push(event.latLng);
        cizer.setPath(bolum);
        bolumCiz.setMap(null);
      } else {
        bolum.push(event.latLng);
        cizer.setPath(bolum);
      }
  
      var path = cizer.getPath();
      bolumCiz.setPath(path);
      bolumCiz.setMap(map);
  
      var area = google.maps.geometry.spherical.computeArea(path);
      var distanceElement = document.getElementById('alan');
      distanceElement.innerHTML = (area/1000).toFixed(2) + ' km²';
  
      var bounds = new google.maps.LatLngBounds();
      bolum.forEach(function(latLng) {
          bounds.extend(latLng);
      });
      var alanMerkezi = bounds.getCenter();
  
      // geometry kütüphanesini yükleyin
      var distance = google.maps.geometry.spherical.computeDistanceBetween(startLocation, alanMerkezi);
  
      var mesafeElement = document.getElementById('mesafe');
      mesafeElement.innerHTML = (distance/1000).toFixed(2) + ' km';
    });
  }
  