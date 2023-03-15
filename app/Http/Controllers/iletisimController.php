<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class iletisimController extends Controller
{
    function index()
    {

        return View('iletisim');
    }

    function yazdir(Request $request){
       $deger= $request->get('deger2');

      
       return response()->json($deger);



    }
}
