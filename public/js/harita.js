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
}
