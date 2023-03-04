let map;
let sabitAdres = "İstanbul, Türkiye"; // Sabit adres

function initMap() {
  // Harita oluştur
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 41.015137, lng: 28.979530 },
    zoom: 8,
  });

  // Adres arama alanını oluştur
  let input = document.getElementById("adres");
  let autocomplete = new google.maps.places.Autocomplete(input);

  // Adres seçildiğinde koordinatları al
  autocomplete.addListener("place_changed", function () {
    let place = autocomplete.getPlace();
    let lat = place.geometry.location.lat();
    let lng = place.geometry.location.lng();

    // Seçilen adresin koordinatları
    console.log("Seçilen adresin koordinatları:");
    console.log(lat, lng);

    // Sabit adresin koordinatları
    let geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address: sabitAdres }, function (results, status) {
      if (status == "OK") {
        let sabitLat = results[0].geometry.location.lat();
        let sabitLng = results[0].geometry.location.lng();

        // Sabit adresin koordinatları
        console.log("Sabit adresin koordinatları:");
        console.log(sabitLat, sabitLng);

        // Aralarındaki mesafeyi hesapla
        let distance = google.maps.geometry.spherical.computeDistanceBetween(
          new google.maps.LatLng(lat, lng),
          new google.maps.LatLng(sabitLat, sabitLng)
        );

        // Mesafeyi ekrana yazdır
        let distanceText = "Aralarındaki mesafe: " + (distance / 1000).toFixed(2) + " km";
        console.log(distanceText);
        document.getElementById("mesafe").innerHTML = distanceText;

        // Koordinatları form elemanlarına ekle
        document.getElementById("lat").value = lat;
        document.getElementById("lng").value = lng;
      } else {
        console.log("Sabit adres bulunamadı");
      }
    });
  });
}
