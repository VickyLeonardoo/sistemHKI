<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KkController;
use App\Http\Controllers\BphController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SidiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WijkController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\SintuaController;
use App\Http\Controllers\DepositController;
<<<<<<< HEAD
use App\Http\Controllers\ProfileController;

=======
use App\Http\Controllers\PendetaController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\CetakdataController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\PengeluaranController;
>>>>>>> 976630182181a075f33b750b2ef8accdf87ed61a
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
Route::get('/tesword', function () {
    return view('tesword');
});

Route::get('/pendaftaran-pelajar-sidi',[SidiController::class,'viewPendaftaran'])->name('viewPendaftaranSidi');
Route::post('simpan-pendaftaran-peserta-sidi',[SidiController::class,'simpanPendaftaran']);
Route::group(['middleware' => ['auth:user']],function(){
    Route::group(['middleware' => ['cek_login:1']],function(){
        Route::get('/home',[HomeController::class,'index']);
        //Pendeta
        Route::get('/data-pendeta',[PendetaController::class,'index'])->name('admin.pendeta.home');
        Route::get('/tambah-data-pendeta',[PendetaController::class,'viewTambah'])->name('admin.pendeta.tambah');
        Route::post('/simpan-pendeta',[PendetaController::class,'simpanPendeta']);
        // Route::get('/data-{slug}',[PendetaController::class,'viewEdit']);
        Route::get('/edit-data-{slug}',[PendetaController::class,'viewEditPendeta'])->name('admin.pendeta.edit');
        Route::post('/ubah-pendeta-{id}',[PendetaController::class,'ubahPendeta']);
        Route::post('/hapus-data-pendeta-{id}',[PendetaController::class,'hapusPendeta']);

        //Wijk
        route::get('/data-wijk',[WijkController::class,'index'])->name('admin.wijk.home');
        Route::get('/tambah-data-wijk',[WijkController::class,'viewTambah'])->name('admin.wijk.tambah');
        Route::post('/simpan-wijk',[WijkController::class,'simpanWijk']);
        Route::get('/hapus-data-wijk-{id}',[WijkController::class,'hapusWijk'])->name('admin.wijk.hapus');
        Route::post('/ubah-wijk-{id}',[WijkController::class,'ubahWijk'])->name('admin.wijk.edit');
        Route::get('/data-wijk-anggota-wijk-{slug}',[WijkController::class,'viewAnggota'])->name('admin.wijk.anggota-wijk');
        Route::get('/data-wijk-kegiatan-wijk-{slug}',[WijkController::class,'viewKegiatan'])->name('admin.wijk.kegiatan');
        Route::post('/tambah-data-kegiatan',[KegiatanController::class,'simpanKegiatan'])->name('admin.wijk.kehadiran');
        Route::get('/data-kehadiran-tanggal-{tgl}/wijk-{slug}',[KehadiranController::class,'viewKehadiran'])->name('admin.wijk.kehadiran-tanggal');
        Route::post('/ubah-data-kegiatan-{id}',[KegiatanController::class,'ubahKegiatan'])->name('admin.wijk.kegiatan-wijk');
        Route::post('/hapus-kegiatan-kegiatan-{id}',[KegiatanController::class,'hapusKegiatan']);
        Route::post('/tambah-data-kehadiran',[KehadiranController::class,'simpanKehadiran'])->name('admin.wijk.tambah-data-kehadiran');

        //Sintua
        Route::get('/data-sintua',[SintuaController::class,'index'])->name('admin.sintua.home');
        route::get('/tambah-data-sintua',[SintuaController::class,'viewTambah'])->name('admin.sintua.tambah');
        route::post('/simpan-sintua',[SintuaController::class,'simpanSintua']);
        Route::post('/ubah-sintua-{id}',[SintuaController::class,'ubahSintua']);
        Route::get('/data-sintua-{slug}',[SintuaController::class,'editSintua'])->name('admin.sintua.edit');
        Route::post('/hapus-data-{id}',[SintuaController::class,'hapusSintua']);

        //KK
        Route::get('/data-kartu-keluarga',[KkController::class,'index'])->name('admin.kk.home');
        Route::get('/tambah-data-kartu-keluarga',[KkController::class,'viewTambah'])->name('admin.kk.tambah');
        route::post('/simpan-kk',[KkController::class,'simpanKk']);
        Route::get('/kartu-keluarga-edit-{id}',[KkController::class,'viewEdit'])->name('admin.kk.edit');
        Route::post('/ubah-kk-{id}',[KkController::class,'ubahKk']);
        Route::get('/anggota-keluarga-{id}',[KkController::class,'viewAnggota'])->name('admin.kk.anggota');
        Route::get('/anggota-kartu-keluarga-{noKk}',[KkController::class,'viewAnggotaKk'])->name('admin.kk.home-keluarga');
        Route::get('/hapus-anggota-keluarga-{id}-kk-{idKk}',[KkController::class,'hapusAnggotaKk']);
        Route::get('/hapus-kartu-keluarga-{id}',[KkController::class,'hapusKk'])->name('hapus-data-kk');

        //Anggota Keluarga/Jemaat Gereja
        Route::get('/data-jemaat',[JemaatController::class,'index'])->name('admin.jemaat.home');
        Route::get('/tambah-data-anggota-kartu-keluarga-{id}',[JemaatController::class,'viewTambah'])->name('admin.jemaat.tambah');
        Route::post('/simpan-anggota-kk-{id}',[JemaatController::class,'simpanJemaat']);
        Route::get('/edit-anggota-keluarga-{idk}-kk-{id}',[JemaatController::class,'viewEdit'])->name('admin.jemaat.edit');
        Route::post('/ubah-anggota-{id}-kk-{idk}',[JemaatController::class,'ubahJemaat']);
        Route::get('/ulang-tahun-jemaat',[JemaatController::class,'viewUltah'])->name('admin.jemaat.ultah');

        //Cetak Data
        Route::get('/cetak-data',[CetakdataController::class,'index'])->name('cetakData');
        Route::get('/cetak-data-jemaat',[CetakdataController::class,'exportJemaat']);
        Route::get('/cetak-data-wijk',[CetakdataController::class,'exportWijk']);
        Route::get('/cetak-data-sintua',[CetakdataController::class,'exportSintua']);
        Route::get('/cetak-data-pendeta',[CetakdataController::class,'exportPendeta']);
        Route::get('/cetak-data-kk',[CetakdataController::class,'exportKk']);

        //Keuangan
        Route::get('/master-data-keuangan',[KeuanganController::class,'viewKeuangan']);
        Route::get('/master-data-pengeluaran',[PengeluaranController::class,'viewPengeluaran'])->name('viewPengeluaran');
        Route::get('/master-data-pendapatan',[KeuanganController::class,'viewMasterPendapatan'])->name('viewPendapatan');
        Route::get('/tambah-data-master-pendapatan',[KeuanganController::class,'viewTambahMasterPendapatan']);
        Route::get('/tambah-data-master-pengeluaran',[PengeluaranController::class,'viewTambahMasterPengeluaran']);
        Route::post('/simpan-master-pendapatan',[KeuanganController::class,'simpanMasterPendapatan']);
        Route::post('/simpan-master-pengeluaran',[PengeluaranController::class,'simpanMasterPengeluaran']);
        Route::get('/edit-{slug}',[KeuanganController::class,'editPendapatan']);
        Route::get('/edit/pengeluaran/{slug}',[PengeluaranController::class,'editPengeluaran']);
        Route::post('/ubah-pendapatan-{id}',[KeuanganController::class,'updatePendapatan']);
        Route::post('/ubah-pengeluaran-{id}',[PengeluaranController::class,'updatePengeluaran']);
        Route::get('/hapus-pendapatan-{id}',[KeuanganController::class,'hapusPendapatan']);
        Route::get('/hapus-pengeluaran-{id}',[PengeluaranController::class,'hapusPengeluaran']);
        Route::get('/pendapatan-gereja',[KeuanganController::class,'viewPendapatanGereja']);
        Route::get('/deposit',[DepositController::class,'viewDeposit']);
        Route::post('/simpan-deposit',[DepositController::class,'simpanDeposit']);
        Route::get('/pengeluaran-gereja',[PengeluaranController::class,'viewPembayaran']);
        Route::post('/simpan-pembayaran',[PengeluaranController::class,'simpanPembayaran']);
        Route::get('/hapus-data-deposit-{id}',[DepositController::class,'hapusDeposit']);
        Route::get('/hapus-data-pembayaran-{id}',[PengeluaranController::class,'hapusPembayaran']);

        // Surat Keterangan
        Route::get('/surat-keterangan-jemaat',[SuratController::class,'viewSKJemaat'])->name('sk.jemaat');
        Route::get('/surat-keterangan-pindah',[SuratController::class,'viewSKPindah'])->name('sk.SKPindah');
        Route::get('/surat-keterangan-pernikahan',[SuratController::class,'viewSKNikah'])->name('sk.SKNikah');
        Route::get('/surat-keterangan-kematian',[SuratController::class,'viewSKKematian'])->name('sk.SKKematian');

        Route::post('/surat-keterangan-jemaat-word',[WordController::class,'wordJemaat'])->name('sk.Jemaat');
        Route::post('/surat-keterangan-pindah-satu-keluarga',[WordController::class,'wordPindahKeluarga']);

        //Pembelajaran Sidi
        Route::get('/buka-pendaftaran-pembelajaran-sidi',[SidiController::class,'viewBukaPendaftaran']);
        Route::get('/ubah-status-pendaftaran-pelajar-sidi',[SidiController::class,'viewUbahStatusPendaftaran']);
        Route::get('/periksa-status-pendaftaran-pelajar-sidi',[SidiController::class,'viewStatusPendaftaran']);
        Route::get('/data-pelajar-sidi',[SidiController::class,'viewTahunDataPelajarSidi']);
        Route::get('/pendaftar-pembelajaran-sidi',[SidiController::class,'viewPendaftarPelajar']);
        Route::get('/validasi-pendaftar-sidi-{nik}',[SidiController::class,'viewValidasi']);
        Route::get('/konfirmasi-pendaftaran-sidi-{nik}',[SidiController::class,'konfirmasiPendaftaran']);
        Route::get('/tolak-pendaftaran-sidi-{nik}',[SidiController::class,'tolakPendaftaran']);
        Route::get('/data-pelajar-sidi-tahun-{tahun}',[SidiController::class,'viewDataSidiTahun'])->name('sidi.tahun');
        Route::get('/simpan-pendaftaran-pembelajaran-sidi',[SidiController::class,'simpanPendaftaranPelajarSidi']);

<<<<<<< HEAD
        Route::get('/admin/profile',[ProfileController::class,'index'])->name('admin.profile');
        Route::post('/admin/update/profile',[ProfileController::class,'updateProfile']);
        Route::post('/admin/update/password',[ProfileController::class,'updatePassword']);
=======
        //User
        Route::get('/user',[UserController::class,'viewUser'])->name('admin.user.home');
        Route::get('/tambah-data-user',[UserController::class,'viewTambahData'])->name('admin.user.tambah');

>>>>>>> 976630182181a075f33b750b2ef8accdf87ed61a
    });
});

Route::group(['middleware' => ['auth:user']],function(){
    Route::group(['middleware' => ['cek_login:2']],function(){
        Route::get('/bph',[HomeController::class,'index']);
        //pendeta
        Route::get('/bph/data-pendeta',[PendetaController::class,'index'])->name('bphDataPendeta');
        route::get('/bph/data-wijk',[WijkController::class,'index'])->name('bphDataWijk');
        Route::get('/bph/data-sintua',[SintuaController::class,'index'])->name('bphDataSintua');
        Route::get('/bph/data-kartu-keluarga',[KkController::class,'index'])->name('bphDataKk');
        Route::get('/bph/data-jemaat',[JemaatController::class,'index'])->name('bphDataJemaat');
        Route::get('bph/anggota-kartu-keluarga-{noKk}',[KkController::class,'viewAnggotaKk']);

        //Cetak Data
        //Cetak Data
        Route::get('/bph/cetak-data',[CetakdataController::class,'index'])->name('bphCetakData');
        Route::get('/bph/cetak-data-jemaat',[CetakdataController::class,'exportJemaat']);
        Route::get('/bph/cetak-data-wijk',[CetakdataController::class,'exportWijk']);
        Route::get('/bph/cetak-data-sintua',[CetakdataController::class,'exportSintua']);
        Route::get('/bph/cetak-data-pendeta',[CetakdataController::class,'exportPendeta']);
        Route::get('/bph/cetak-data-kk',[CetakdataController::class,'exportKk']);

        // Keuangan
        Route::get('/bph/master-data-keuangan',[KeuanganController::class,'viewKeuangan']);
        Route::get('/bph/master-data-pendapatan',[KeuanganController::class,'viewMasterPendapatan'])->name('bphViewPendapatan');
        Route::get('/bph/master-data-pengeluaran',[PengeluaranController::class,'viewPengeluaran'])->name('bphViewPengeluaran');
        Route::get('/bph/tambah-data-master-pendapatan',[KeuanganController::class,'viewTambahMasterPendapatan']);
        Route::get('/bph/tambah-data-master-pengeluaran',[PengeluaranController::class,'viewTambahMasterPengeluaran']);
        Route::post('/bph/simpan-master-pendapatan',[KeuanganController::class,'simpanMasterPendapatan'])->name('bph.simpan.master.pendapatan');
        Route::post('/bph/simpan-master-pengeluaran',[PengeluaranController::class,'simpanMasterPengeluaran'])->name('bph.simpan.master.pengeluaran');

        Route::get('/bph/edit-{slug}',[KeuanganController::class,'editPendapatan'])->name('bph.edit.master.pendapatan');
        Route::post('/bph/ubah-pendapatan-{id}',[KeuanganController::class,'updatePendapatan']);
        Route::post('/bph/ubah-pengeluaran-{id}',[PengeluaranController::class,'updatePengeluaran'])->name('bph.update.master.pengeluaran');
        Route::get('/bph/hapus-pendapatan-{id}',[KeuanganController::class,'hapusPendapatan'])->name('bph.hapus.master.pendapatan');
        Route::get('/bph/deposit',[DepositController::class,'viewDeposit']);
        Route::post('/bph/simpan-deposit',[DepositController::class,'simpanDeposit']);
        Route::get('/bph/hapus-data-deposit-{id}',[DepositController::class,'hapusDeposit']);
        Route::get('/bph/pengeluaran-gereja',[PengeluaranController::class,'viewPembayaran']);
        Route::post('/bph/simpan-pembayaran',[PengeluaranController::class,'simpanPembayaran']);
        Route::get('/bph/hapus-data-pembayaran-{id}',[PengeluaranController::class,'hapusPembayaran']);

        Route::get('/bph/edit/pengeluaran/{slug}',[PengeluaranController::class,'editPengeluaran'])->name('bph.edit.master.pengeluaran');
        Route::get('/bph/hapus-pengeluaran-{id}',[PengeluaranController::class,'hapusPengeluaran'])->name('bph.hapus.master.pengeluaran');


        Route::get('/bph/surat-keterangan-jemaat',[SuratController::class,'viewSKJemaat']);
        Route::get('/bph/surat-keterangan-pindah',[SuratController::class,'viewSKPindah']);
        Route::get('/bph/surat-keterangan-pernikahan',[SuratController::class,'viewSKNikah']);
        Route::get('/bph/surat-keterangan-kematian',[SuratController::class,'viewSKKematian']);

        Route::post('/bph/surat-keterangan-jemaat-word',[WordController::class,'wordJemaat']);
        Route::post('/bph/surat-keterangan-pindah-satu-keluarga',[WordController::class,'wordPindahKeluarga']);
        Route::post('/bph/surat-keterangan-pindah-perorangan',[WordController::class,'wordJemaat']);

        Route::get('/bph/profile',[ProfileController::class,'index'])->name('bph.profile');
        Route::post('/bph/update/profile',[ProfileController::class,'updateProfile']);
        Route::post('/bph/update/password',[ProfileController::class,'updatePassword']);

    });
});
