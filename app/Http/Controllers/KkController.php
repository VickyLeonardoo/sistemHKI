<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Kk;
use App\Models\Wijk;
use App\Models\Jemaat;
use App\Models\Sintua;
class KkController extends Controller
{
    public function index(){
        return view('admin.viewKk',[
            "title" => "Data Kartu Keluarga",
            "kk" => Kk::all(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function viewTambah(Request $request){
        return view('admin.viewTambahKk',[
            "title" => "Tambah Data KK",
            "wijk" => Wijk::all(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function simpanKk(Request $request){
        $data = [
            'nomorKk' => Request()->nomor,
            'alamat' => Request()->alamat,
            'kecamatan' => Request()->kecamatan,
            'kelurahan' => Request()->kelurahan,
            'wijk_id' => Request()->wijk,
            'statusRumah' => Request()->status,
        ];

        Kk::create($data);
        return redirect()->route('dataKk')->withToastSuccess('Data KK Berhasil Ditambahkan!');
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
        $data = [
            'nomorKk' => Request()->nomor,
            'alamat' => Request()->alamat,
            'kecamatan' => Request()->kecamatan,
            'kelurahan' => Request()->kelurahan,
            'wijk_id' => Request()->wijk,
            'statusRumah' => Request()->status,
        ];


        Kk::where('id',$id)->update($data);
        return redirect()->route('dataKk')->withToastSuccess('Data KK Berhasil Diubah!');
    }

    public function viewAnggotaKk($noKk){
        $data = Kk::where('nomorKk', $noKk)->first();
        return view('admin.viewAnggotaKartuKeluarga',[
            "title" => "Anggota Keluarga",
            "kk" => Kk::where('nomorKk',$noKk)->first(),
            "jemaat" => Jemaat::where('kk_id',$data->id)->get(),
            'sintua' => Sintua::first(),

        ]);
    }
}
