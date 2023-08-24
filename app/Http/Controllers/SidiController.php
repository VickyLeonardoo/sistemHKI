<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\StatusPendaftaran;
use App\Models\PendaftaranSidi;
use App\Models\Jemaat;
class SidiController extends Controller
{
    public function viewPendaftarPelajar(){
        $tahun = Carbon::now()->year;
        $idTahun = StatusPendaftaran::where('tahunSidi', $tahun)->first();
        if ($idTahun == '') {
            return redirect()->back()->withToastError('Belum ada data pelajar sidi');
        }
        $id = $idTahun->id;
        return view('sidi.viewPendaftar',[
            'title' => 'Pendaftar Pelajar Sidi',
            'pendaftar' => PendaftaranSidi::where('status_pendaftaran_id', $id)->where('status','1')->get(),

        ]);
    }
    public function viewPendaftaran(){
        $tahun = Carbon::now()->year;
        $tglSekarang = Carbon::now();
        $pendaftaran = StatusPendaftaran::where('tahunSidi',$tahun)->first();

        if ($pendaftaran == '') {
            return 'Anda Belum Membuat Data';
        }else{
            return view('sidi.viewPendaftaran',[
                'title' => 'Pendaftaran Pelajar Sidi',
                'pendaftaran' => StatusPendaftaran::where('tahunSidi',$tahun)->first(),
                'tglSekarang' => $tglSekarang,
                'tahun' => $tahun,
            ]);
        }
    }

    public function simpanPendaftaran(Request $request){
        $request->validate([
            'nik' => 'required|numeric',
        ],[
            'nik.required' => 'NIK Wajib Diisi!',
            'nik.numeric' => 'NIK Hanya Boleh Angka!',
            // 'nik.digits' => 'NIK Minimal 16 Digit Angka'
        ]);

        $jemaat = Jemaat::where('nik',$request->nik)->first();
        $idJemaat = $jemaat->id;
        $data = [
            'nik' => Request()->nik,
            'jemaat_id' => $idJemaat,
            'status_pendaftaran_id' => Request()->idStatus
        ];

        PendaftaranSidi::create($data);
        return redirect()->back()->withToastSuccess('Kamu Berhasil Mendaftar');
    }

    public function viewValidasi($nik){
        $jemaat = Jemaat::where('nik',$nik)->first();

        if ($jemaat == '') {
            return 'Jemaat Tidak Terdaftar';
        }else{
            return view('sidi.viewValidasi',[
                'title' => 'Validasi Pendaftar',
                'jemaat' => $jemaat,
            ]);
        }
    }

    public function konfirmasiPendaftaran($nik){
        PendaftaranSidi::where('nik',$nik)->update(['status'=> '2']);
        return redirect()->back()->withToastSuccess('Pendaftaran Telah Dikonfirmasi');
    }

    public function tolakPendaftaran($nik){
        PendaftaranSidi::where('nik',$nik)->update(['status'=> '3']);
        return redirect()->back()->withToastSuccess('Pendaftaran Berhasil Ditolak');
    }

    public function viewTahunDataPelajarSidi(){
        $tahun = Carbon::now()->year;
        $idTahun = StatusPendaftaran::all();

        return view('sidi.viewSemuaPendaftaranSidi',[
            'title' => 'Pendaftar Pelajar Sidi',
            'pendaftar' => $idTahun,
        ]);

    }

    public function viewDataSidiTahun($tahun){
        $idTahun = StatusPendaftaran::where('tahunSidi',$tahun)->first();
        $id = $idTahun->id;
        // return PendaftaranSidi::where('status_pendaftaran_id',$id)->where('status','2')->get();

        return view('sidi.viewPelajarSidi',[
            'title' => 'Pelajar Sidi Tahun'.$tahun,
            'pelajar' => PendaftaranSidi::where('status_pendaftaran_id',$id)->where('status','2')->get(),
        ]);
    }

    // public function viewDataPelajarSidi(){
    //     $tahun = Carbon::now()->year;
    //     $idTahun = StatusPendaftaran::where('tahunSidi', $tahun)->first();
    //     $id = $idTahun->id;

    //     return view('sidi.viewPendaftar',[
    //         'title' => 'Pendaftar Pelajar Sidi',
    //         'pendaftar' => PendaftaranSidi::where('status_pendaftaran_id', $id)->where('status','2')->get(),

    //     ]);
    // }

    public function viewBukaPendaftaran(){
        $tahun = Carbon::now()->year;
        $idTahun = StatusPendaftaran::where('tahunSidi', $tahun)->count();

        return view('sidi.viewBukaPendaftaran',[
            'title' => 'Buka Pendaftaran Sidi',
            'pendaftaran' => StatusPendaftaran::where('tahunSidi',$tahun)->first(),
            'tahun' => $idTahun,
        ]);
    }

    public function simpanPendaftaranPelajarSidi(Request $request){
        $tahun = Carbon::now()->year;
        $data = [
            'tahunSidi' => $tahun,
            'status' => 'open',
        ];
        StatusPendaftaran::create($data);
        return redirect()->back()->withToastSuccess('Pendaftaran Berhasil Dibuka');

    }

    public function viewStatusPendaftaran(){
        $tahun = Carbon::now()->year;
        $idTahun = StatusPendaftaran::where('tahunSidi', $tahun)->first();

        return view('sidi.statusPendaftaran',[
            'title' => 'Status Pendaftaran Pembelajaran Sidi Tahun'.$tahun,
            'pendaftaran' => $idTahun,
        ]);
    }

    public function viewUbahStatusPendaftaran(){
        $tahun = Carbon::now()->year;
        $idTahun = StatusPendaftaran::where('tahunSidi', $tahun)->first();

        if ($idTahun->status == 'open') {
            StatusPendaftaran::where('tahunSidi',$tahun)->update(['status' => 'close']);
            return redirect()->back()->withToastSuccess('Pendaftaran Berhasil Ditutup');
        }else{
            StatusPendaftaran::where('tahunSidi',$tahun)->update(['status' => 'open']);
            return redirect()->back()->withToastSuccess('Pendaftaran Berhasil Dibuka');

        }
    }


}
