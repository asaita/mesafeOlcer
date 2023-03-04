<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <!-- Google Maps JavaScript API anahtarınızı burada ekleyin -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLfZOn6YbHsddmKW7UrsRlYv8QciBbQZE&callback=initMap&libraries=geometry" async defer></script>


<!-- Harita gösterimi için bir alan oluşturun -->
<div id="map" style="height: 400px;"></div>

<div>
    Konum: <span id="konum"></span>
</div>

<div>
    Mesafe: <span id="distance"></span>
</div>

<!-- Adres seçim formu -->
<form action="{{ route('secili_adresR') }}" method="POST">
    @csrf
    <div>
        <label for="adres">Adres:</label>
        <input type="text" id="adres" name="adres" placeholder="Adresinizi girin">
    </div>
    <input type="hidden" id="lat" name="lat">
    <input type="hidden" id="lng" name="lng">
    <button type="submit">Gönder</button>
</form>

<!-- JavaScript dosyasını yükleyin -->
<script src="{{ asset('js/harita.js') }}"></script>
    
</body>
</html>

<script>

$(document).ready(function() {
    // Form submit edildiğinde AJAX çağrısı yapalım
    $('form').on('submit', function(event) {
        event.preventDefault();

        // Form verilerini alalım
        var formData = {
            adres: $('input[name=adres]').val(),
            lat: $('input[name=lat]').val(),
            lng: $('input[name=lng]').val(),
            _token: $('input[name=_token]').val()
        };

        // AJAX çağrısı yapalım
        $.ajax({
            url: '/mesafe,
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                // AJAX çağrısı başarılı oldu, dönen verileri ekrana yazdıralım
                $('#response').html(response.message);
            },
            error: function(response) {
                // AJAX çağrısı başarısız oldu, hatayı ekrana yazdıralım
                $('#response').html('Bir hata oluştu.');
            }
        });
    });
});


</script>