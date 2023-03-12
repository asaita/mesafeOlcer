function initMap() {
    // Harita oluşturun
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        //center: {lat: 38.99657673036982, lng: 29.388147810525282}
        center: {lat: 41.0082, lng: 28.9784}
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
    
        var markerPosition = marker.getPosition();

        // geometry kütüphanesini yükleyin
        var distance = google.maps.geometry.spherical.computeDistanceBetween(startLocation, markerPosition);

        var distanceElement = document.getElementById('distance');
        distanceElement.innerHTML = distance + ' km';

        // Konum div'inin içeriğini güncelleyin
        var konumDiv = document.getElementById('konum');
        konumDiv.innerText = lat + ', ' + lng;
    });

    map.addListener('click', function(event) {
        marker.setPosition(event.latLng);
    
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
    
        latInput.value = lat;
        lngInput.value = lng;
    
        // Konum div'inin içeriğini güncelleyin
        var konumDiv = document.getElementById('konum');
        konumDiv.innerText = lat + ', ' + lng;

        // Başlangıç noktası ve işaretleyici arasındaki mesafeyi hesaplayın
        var markerPosition = marker.getPosition();
        var distance = google.maps.geometry.spherical.computeDistanceBetween(startLocation, markerPosition);
        
        var distanceElement = document.getElementById('distance');
        distanceElement.innerHTML = distance/1000 + ' km';
    });

    

    var bolum = [
        {lat: 41.0145, lng: 28.9799},
        {lat: 41.0133, lng: 28.9743},
        {lat: 41.0069, lng: 28.9728},
        {lat: 41.0071, lng: 28.9803}
      ];
    
      var bolumCiz = new google.maps.Polygon({
        paths: bolum,
        strokeColor: '#FF0000',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#FF0000',
        fillOpacity: 0.35
      });
    
      bolumCiz.setMap(map);
}
