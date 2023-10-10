<?php

namespace App\Http\Controllers;

use App\Models\Wijk;
Use App\Models\Kk;
use App\Models\Jemaat;
use App\Models\Sintua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class KkController extends Controller
{
    public function index(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.viewKk',[
                "title" => "Data Kartu Keluarga",
                "kk" => Kk::where('is_deleted','0')->get(),
                'sintua' => Sintua::first(),

            ]);
        }else{
            return view('bph.viewKk',[
                "title" => "Data Kartu Keluarga",
                "kk" => Kk::where('is_deleted','0')->get(),
                'sintua' => Sintua::first(),

            ]);
        }

    }

    public function viewTambah(Request $request){
        return view('admin.viewTambahKk',[
            "title" => "Tambah Data KK",
            "wijk" => Wijk::all(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function simpanKk(Request $request){
        $request->validate([
            'nomor' => 'required|unique:kks,nomorKk',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'wijk' => 'required',
            'status' => 'required',
        ],[
            'nomor.required' => 'Nomor Kk Wajib Diisi',
            'alamat.required' => 'AlamatWajib Diisi',
            'kecamatan.required' => 'KecamatanWajib Diisi',
            'kelurahan.required' => 'KelurahanWajib Diisi',
            'wijk.required' => 'Wijk Wajib Diisi',
            'status.required' => 'Status Wajib Diisi',
            'nomor.unique' => 'Nomor KK Sudah ada, periksa kembali nomor kk',
        ]);
        $data = [
            'nomorKk' => Request()->nomor,
            'alamat' => Request()->alamat,
            'kecamatan' => Request()->kecamatan,
            'kelurahan' => Request()->kelurahan,
            'wijk_id' => Request()->wijk,
            'statusRumah' => Request()->status,
        ];

        Kk::create($data);
        return redirect()->route('admin.kk.home')->withToastSuccess('Data KK Berhasil Ditambahkan!');
    }

    public function viewEdit($id){
        return view('admin.viewEditKk',[
            "title" => "Edit Data KK",
            "wijk" => Wijk::all(),
            "kk" => Kk::where('nomorKk',$id)->first(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function ubahKk(Request $request, $id){
        $request->validate([
            'nomor' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'wijk' => 'required',
            'status' => 'required',
        ],[
            'nomor.required' => 'Nomor Kk Wajib Diisi',
            'alamat.required' => 'AlamatWajib Diisi',
            'kecamatan.required' => 'KecamatanWajib Diisi',
            'kelurahan.required' => 'KelurahanWajib Diisi',
            'wijk.required' => 'Wijk Wajib Diisi',
            'status.required' => 'Status Wajib Diisi',
        ]);
        $data = [
            'nomorKk' => Request()->nomor,
            'alamat' => Request()->alamat,
            'kecamatan' => Request()->kecamatan,
            'kelurahan' => Request()->kelurahan,
            'wijk_id' => Request()->wijk,
            'statusRumah' => Request()->status,
        ];


        Kk::where('id',$id)->update($data);
        return redirect()->route('admin.kk.home')->withToastSuccess('Data KK Berhasil Diubah!');
    }

    public function hapusKk($id){
        $kk = Kk::findOrFail($id);
        $kk->update(['is_deleted' => '1']);

        Jemaat::where('kk_id', $id)->update(['is_deleted' => '1']);

        return redirect()->back()->withToastSuccess('Data KK Berhasil Dihapus');
    }

    public function viewAnggotaKk($noKk){

        $data = Kk::where('nomorKk', $noKk)->first();
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.viewAnggotaKartuKeluarga',[
                "title" => "Anggota Keluarga",
                "kk" => Kk::where('nomorKk',$noKk)->first(),
                "jemaat" => Jemaat::where('kk_id',$data->id)->get(),
                'sintua' => Sintua::first(),

            ]);
        }else{
            return view('bph.viewAnggotaKartuKeluarga',[
                "title" => "Anggota Keluarga",
                "kk" => Kk::where('nomorKk',$noKk)->first(),
                "jemaat" => Jemaat::where('kk_id',$data->id)->get(),
                'sintua' => Sintua::first(),

            ]);
        }
    }

    public function hapusAnggotaKk($id, $idKk){
        Jemaat::where('kk_id',$idKk)->where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Data Berhasil Dihapus');
    }
}
