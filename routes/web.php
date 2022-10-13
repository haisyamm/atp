<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WhyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterHargaController;
use App\Http\Controllers\ResiController;
use App\Http\Controllers\RequestPickupController;

use App\Models\About;
use App\Models\Service;
use App\Models\Why;
use App\Models\Contact;
use App\Models\Banner;

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
    $about = About::all();
    $service = Service::all();
    $why = Why::all();
    $contact = Contact::all();
    $banner = Banner::first();
    return view('public')->with([
        'about' => $about,
        'service' => $service,
        'why' => $why,
        'contact' => $contact,
        'banner' => $banner
    ]);
})->name('site');
Route::get('/contact/pick-up', [RequestPickupController::class, 'create'])->name('request-pickup');
Route::post('/contact/pick-up', [RequestPickupController::class, 'store'])->name('request-send');

Route::get('provinsi', [MasterHargaController::class, 'searchProvince'])->name('provinsi');
Route::get('city', [MasterHargaController::class, 'searchCity'])->name('city');
Route::get('distric', [MasterHargaController::class, 'searchKecamatan'])->name('distric');
Route::get('village', [MasterHargaController::class, 'searchKelurahan'])->name('village');


Route::get('/tarif', [MasterHargaController::class, 'tarif'])->name('tarif');
Route::get('/searchTarif', [MasterHargaController::class, 'fixTarif'])->name('tarif-fix');
Route::get('/track/stt', [ResiController::class, 'trackSTT'])->name('track-stt');
//Route::get('/tarif/cari', [MasterHargaController::class, 'searchHarga'])->name('cek-tarif');
Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:0'])->prefix("admin")->group(function () {
    Route::get('/', [HomeController::class, 'adminHome'])->name('lm-admin');
    Route::get('/resi-list', [ResiController::class, 'index'])->name('resi-user');
    Route::get('/printResi/{id}', [ResiController::class, 'print'])->name('cetak-resi');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:1'])->prefix("lm-admin")->group(function () {
    
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('why', WhyController::class);
    Route::resource('home', HomeController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('user', UserController::class);

    Route::get('customer', [PelangganController::class, 'searchPelanggan'])->name('search-customer');

    Route::get('/', [HomeController::class, 'adminHome'])->name('lm-admin');
    Route::get('/dashboard-realtime-book', [ResiController::class, 'dBooking'])->name('d-booking');
    Route::get('/feed-resi', [ResiController::class, 'lastBooking'])->name('f-booking');
    Route::get('/price-list', [MasterHargaController::class, 'index'])->name('master-harga');
    Route::get('/price/add', [MasterHargaController::class, 'create'])->name('master-harga-add');
    Route::get('/price/import', [MasterHargaController::class, 'import'])->name('master-harga-import');
    Route::post('/importHarga', [MasterHargaController::class, 'fileImport'])->name('file-import');

    Route::post('/addHarga', [MasterHargaController::class, 'store'])->name('harga-send');
    Route::post('/newHarga', [MasterHargaController::class, 'update'])->name('harga-update');
    Route::post('/price-filter', [MasterHargaController::class, 'filter'])->name('filter-harga');
    Route::get('/editHarga/{id}', [MasterHargaController::class, 'edit'])->name('harga-edit');
    Route::delete('/delHarga/{id}', [MasterHargaController::class, 'destroy'])->name('harga-delete');

    Route::get('/resi-list', [ResiController::class, 'index'])->name('resi');
    Route::get('/detail/{id}', [ResiController::class, 'show'])->name('show-detail');
    Route::get('/resi/add', [ResiController::class, 'create'])->name('resi-add');
    Route::post('/addResi', [ResiController::class, 'store'])->name('resi-send');
    Route::get('/editResi/{id}', [ResiController::class, 'edit'])->name('resi-edit');
    Route::post('/updateResi', [ResiController::class, 'update'])->name('resi-update');
    Route::post('/updateTrack', [ResiController::class, 'updateTracking'])->name('track-update');
    Route::get('/tracking', [ResiController::class, 'tracking'])->name('tracking');
    Route::post('/cancel/{id}', [ResiController::class, 'cancel'])->name('cancel-resi');
    Route::post('/import', [UserController::class, 'import' ])->name('import'); 

    Route::get('/printResi/{id}', [ResiController::class, 'print'])->name('cetak-resi');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:2'])->prefix("lm-dev")->group(function () {

    Route::get('/', [HomeController::class, 'devHome'])->name('dev.home');
});
