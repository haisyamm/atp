<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterHargaController;
use App\Http\Controllers\RequestPickupController;

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
    return view('public');
})->name('site');
Route::get('/contact/pick-up', [RequestPickupController::class, 'create'])->name('request-pickup');
Route::post('/contact/pick-up', [RequestPickupController::class, 'store'])->name('request-send');

Route::get('provinsi', [MasterHargaController::class, 'searchProvince'])->name('provinsi');
Route::get('city', [MasterHargaController::class, 'searchCity'])->name('city');
Route::get('distric', [MasterHargaController::class, 'searchKecamatan'])->name('distric');
Route::get('village', [MasterHargaController::class, 'searchKelurahan'])->name('village');


Route::get('/tarif', [MasterHargaController::class, 'tarif'])->name('tarif');
//Route::get('/tarif/cari', [MasterHargaController::class, 'searchHarga'])->name('cek-tarif');
Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:0'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:1'])->prefix("lm-admin")->group(function () {

    Route::get('/', [HomeController::class, 'adminHome'])->name('lm-admin');
    Route::get('/price-list', [MasterHargaController::class, 'index'])->name('master-harga');
    Route::get('/price/add', [MasterHargaController::class, 'create'])->name('master-harga-add');

    Route::post('/addHarga', [MasterHargaController::class, 'store'])->name('harga-send');
    Route::post('/updateHarga', [MasterHargaController::class, 'update'])->name('harga-update');
    Route::get('/editHarga/{id}', [MasterHargaController::class, 'edit'])->name('harga-edit');
    Route::delete('/delHarga/{id}', [MasterHargaController::class, 'destroy'])->name('harga-delete');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:2'])->prefix("lm-dev")->group(function () {

    Route::get('/', [HomeController::class, 'devHome'])->name('dev.home');
});
