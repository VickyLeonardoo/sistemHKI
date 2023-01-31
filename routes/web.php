<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PendetaController;
use App\Http\Controllers\SintuaController;
use App\Http\Controllers\WijkController;
use App\Http\Controllers\KkController;
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

