<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\PendetaController;
use App\Http\Controllers\SintuaController;
use App\Http\Controllers\WijkController;
use App\Http\Controllers\KkController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BphController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CetakdataController;

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

//login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/proses_login',[Authcontroller::class,'prosesLogin']);
Route::get('/logout',[AuthController::class,'logout']);

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => ['auth:user']],function(){
    Route::group(['middleware' => ['cek_login:1']],function(){
        Route::get('/home',[HomeController::class,'index']);
        //Pendeta
        Route::get('/data-pendeta',[PendetaController::class,'index'])->name('dataPendeta');
        Route::get('/tambah-data-pendeta',[PendetaController::class,'viewTambah']);
        Route::post('/simpan-pendeta',[PendetaController::class,'simpanPendeta']);
        Route::get('/edit-data-pendeta-{id}',[PendetaController::class,'viewEdit']);
        Route::post('/ubah-pendeta-{id}',[PendetaController::class,'ubahPendeta']);

        //Wijk
        route::get('/data-wijk',[WijkController::class,'index'])->name('dataWijk');
        Route::get('/tambah-data-wijk',[WijkController::class,'viewTambah']);
        Route::post('/simpan-wijk',[WijkController::class,'simpanWijk']);
        Route::post('/ubah-wijk-{id}',[WijkController::class,'ubahWijk']);
        Route::get('/data-wijk-anggota-wijk-{slug}',[WijkController::class,'viewAnggota']);

        //Sintua
        Route::get('/data-sintua',[SintuaController::class,'index'])->name('dataSintua');
        route::get('/tambah-data-sintua',[SintuaController::class,'viewTambah']);
        route::post('/simpan-sintua',[SintuaController::class,'simpanSintua']);
        Route::post('/ubah-sintua-{id}',[SintuaController::class,'ubahSintua']);

        //KK
        Route::get('/data-kartu-keluarga',[KkController::class,'index'])->name('dataKk');
        Route::get('/tambah-data-kartu-keluarga',[KkController::class,'viewTambah']);
        route::post('/simpan-kk',[KkController::class,'simpanKk']);
        Route::get('/edit-data-kk-{id}',[KkController::class,'viewEdit']);
        Route::post('/ubah-kk-{id}',[KkController::class,'ubahKk']);
        Route::get('/anggota-keluarga-{id}',[KkController::class,'viewAnggota']);

        //Anggota Keluarga/Jemaat Gereja
        Route::get('/data-jemaat',[JemaatController::class,'index'])->name('dataJemaat');
        Route::get('/tambah-data-anggota-kartu-keluarga-{id}',[JemaatController::class,'viewTambah']);
        Route::post('/simpan-anggota-kk-{id}',[JemaatController::class,'simpanJemaat']);
        Route::get('/edit-anggota-keluarga-{idk}-kk-{id}',[JemaatController::class,'viewEdit']);
        Route::post('/ubah-anggota-{idk}-kk-{id}',[JemaatController::class,'ubahJemaat']);
        Route::get('/ulang-tahun-jemaat',[JemaatController::class,'viewUltah']);


        //Cetak Data
        Route::get('/cetak-data',[CetakdataController::class,'index'])->name('cetakData');
        Route::get('/cetak-data-jemaat',[CetakdataController::class,'exportJemaat']);
        Route::get('/cetak-data-wijk',[CetakdataController::class,'exportWijk']);
        Route::get('/cetak-data-sintua',[CetakdataController::class,'exportSintua']);
        Route::get('/cetak-data-pendeta',[CetakdataController::class,'exportPendeta']);
        Route::get('/cetak-data-kk',[CetakdataController::class,'exportKk']);



    });
});

Route::group(['middleware' => ['auth:user']],function(){
    Route::group(['middleware' => ['cek_login:2']],function(){
        Route::get('/bph',[BphController::class,'index']);
        //Pendeta

    });
});
