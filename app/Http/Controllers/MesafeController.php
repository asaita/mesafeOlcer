<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class MesafeController extends Controller
{
    function index(){

        return View('mesafe');

    }

    function secili_adres(Request $request){

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
}
