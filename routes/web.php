<?php

use App\Http\Controllers\iletisimController;
use App\Http\Controllers\MesafeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mesafe', [MesafeController::class, 'index'])->name('mesafeR');

Route::get('/iletisim', [iletisimController::class, 'index'])->name('iletisimR');

//Route::post('/mesafe', [MesafeController::class, 'secili_adres'])->name('secili_adresR');

Route::get('/save_zone', [MesafeController::class, 'collect_zone'])->name('saveZone');
Route::get('/iletisim_yazdir', [iletisimController::class, 'yazdir'])->name('iletisimYazdir');

Route::post('/kaydet_zone', [MesafeController::class, 'kaydet_zone'])->name('kaydetZone');








