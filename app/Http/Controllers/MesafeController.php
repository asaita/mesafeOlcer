<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class MesafeController extends Controller
{
    function index()
    {

        return View('mesafe');
    }

    function secili_adres(Request $request)
    {

        $adres = $request->input('adres');
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        // Adres doğrulama işlemleri yapılır ve sonuçlar döndürülür

        return response()->json([
            'success' => true,
            'message' => 'Adres doğrulama işlemi tamamlandı',
            'data' => [
                'adres' => $adres,
                'lat' => $lat,
                'lng' => $lng
            ]
        ]);
    }

    public function collect_zone(Request $request)
    {
       $bolgeler = $request->get('bolgeler');

                    
        return response()->json($bolgeler);
    }

    public function kaydet_zone(Request $request){
        $bolgeler = $request->get('bolgeler');
        dd($bolgeler);

        //$response = $this->collect_zone($bolgeler);
        //$bolgeler2 = json_decode($response->getContent(), true);
    
        // $bolgeler2 değişkenini kullanarak istediğiniz işlemleri yapabilirsiniz
    
        //return response()->json(['result' => 'success']);

        //$bolgeler = $this->bolgeler;
    
        //dd($bolgeler);

        //$bolgeler = $response->get('bolgeler');
        // $bolgeler = [
        //     ["mesafe" => 100, "alan" => 50],
        //     ["mesafe" => 200, "alan" => 80],
        //     ["mesafe" => 300, "alan" => 120]
        // ];
        //return view('mesafe',compact('bolgeler'));

    }
}
