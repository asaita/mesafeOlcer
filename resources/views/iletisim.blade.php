<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
<form action="" method="GET">
    @csrf
   
    <button type="submit" name="button_ismi" id="buton_id">Gönder</button>


</form>

<div>
    Alan: <span id="alan"></span>

</div>
    
    
</body>
</html>

<script>
    $(document).ready(function(){

        $('#alan').text("alanalanlan");

        $('#buton_id').on('click',function(e){

            e.preventDefault();

            veri=$('#alan').text();

            alert(veri);
            $.ajax({
                type: "GET",
                url: "{{ route('iletisimYazdir') }}", // İsteğin gönderileceği route ismi
                data: {deger:"ahmet", deger2:veri},
                success: function(response) {
            
                console.log(response);
                }
            });
            


        });






    });

</script>
