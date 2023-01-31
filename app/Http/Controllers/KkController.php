<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Kk;
use App\Models\Wijk;
class KkController extends Controller
{
    public function index(){
        return view('admin.viewKk',[
            "title" => "Data Kartu Keluarga",
            "kk" => Kk::all(),
        ]);
    }

    public function viewTambah(Request $request){
        return view('admin.viewTambahKk',[
            "title" => "Tambah Data KK",
            "wijk" => Wijk::all(),

        ]);
    }

    public function simpanKk(Request $request){
        $data = [
            'nomorKk' => Request()->nomor,
            'alamat' => Request()->alamat,
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
            "kk" => Kk::where('id',$id)->first(),
        ]);
    }

    public function ubahKk(Request $request, $id){
        $data = [
            'nomorKk' => Request()->nomor,
            'alamat' => Request()->alamat,
            'wijk_id' => Request()->wijk,
            'statusRumah' => Request()->status,
        ];

        Kk::where('id',$id)->update($data);
        return redirect()->route('dataKk')->withToastSuccess('Data KK Berhasil Diubah!');
    }

    public function viewAnggota($id){
        return view('admin.viewAnggotaKeluarga',[
            "title" => "Anggota Keluarga",
            "kk" => Kk::where('id',$id)->first(),
        ]);

    }
}
