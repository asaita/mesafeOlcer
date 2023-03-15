<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Document</title>
</head>

<body>

    <!-- Google Maps JavaScript API anahtarınızı burada ekleyin -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=xxxx&callback=initMap&libraries=geometry"
        async defer></script>

    <div class="container">

        <div class="row">

            <div class="col-sm-8">

                <div id="map" style="height: 600px;"></div>

            </div>
            <div class="col-sm-2">
                <div>
                    Alan: <span id="alan"></span>

                </div>

                <div>
                    Mesafe: <span id="mesafe"></span>
                </div>

                <form action="{{ route('saveZone') }}" method="post">
                    @csrf

                    <button type="submit" name="bitir" id="bitir">Bitir</button>

                </form>



            </div>
            <div class="col-sm-2">




                <form action="{{ route('kaydetZone') }}" method="post">
                    @csrf

                    @if (isset($bolgeler))
                    @foreach ($bolgeler as $bolge)
                <p>Mesafe: {{ $bolge["mesafe"]}}</p>
                <p>Alan: {{ $bolge["alan"] }}</p>
                @endforeach

                @else
                    <p>Mesafe: controlerdan gelen değer boş</p>
                @endif

                    <input type="submit" id="kaydet" value="Kaydet">
                </form>

                







            </div>
        </div>
    </div>




    <!-- Adres seçim formu -->
    <form action="" method="POST">
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
    <script src="{{ asset('js/harita3.js') }}"></script>

</body>

</html>

<script>
    $(document).ready(function() {

        let bolgeler_dizi = [];


        var csrfToken = "{{ csrf_token() }}";

        $('#bitir').on('click', function(e) {

            e.preventDefault();

            let mesafe1 = $('#mesafe').text();
            let alan1 = $('#alan').text();
            let bolge={"mesafe":mesafe1, "alan":alan1};
            bolgeler_dizi.push(bolge);
            //console.log(bolgeler);

            $.ajax({
                url: "{{ route('saveZone') }}",
                method: 'GET',
                data: {
                    bolgeler:bolgeler_dizi
                }, 
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });


        });

        // Form submit edildiğinde AJAX çağrısı yapalım
        // $('form').on('submit', function(event) {
        //     event.preventDefault();

        //     Form verilerini alalım
        //     var formData = {
        //         adres: $('input[name=adres]').val(),
        //         lat: $('input[name=lat]').val(),
        //         lng: $('input[name=lng]').val(),
        //         _token: $('input[name=_token]').val()
        //     };

        //     AJAX çağrısı yapalım
        //     $.ajax({
        //         url: '/mesafe',
        //         method: 'POST',
        //         data: formData,
        //         dataType: 'json',
        //         success: function(response) {
        //             AJAX çağrısı başarılı oldu, dönen verileri ekrana yazdıralım
        //             $('#response').html(response.message);
        //         },
        //         error: function(response) {
        //             AJAX çağrısı başarısız oldu, hatayı ekrana yazdıralım
        //             $('#response').html('Bir hata oluştu.');
        //         }
        //     });
        // });
    });
</script>
