<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendeta;
use Illuminate\Support\Facades\Redis;
use PDO;

class PendetaController extends Controller
{
    public function index(){
        return view('admin.viewPendeta',[
            "title" => "Data Pendeta",
            "pendeta" => Pendeta::all()
        ]);
    }

    public function viewTambah(){
        return view('admin.viewTambahPendeta',[
            "title" => 'Tambah Data Pendeta',
        ]);
    }

    public function simpanPendeta(Request $request){
        $data = [
            "nama" => Request()->nama,
            'tempatLahir' => Request()->tempatLahir,
            'tglLahir' => Request()->tglLahir,
            'status' => Request()-> status,
            'tglMasuk' => Request()->tglMasuk,
        ];

        Pendeta::create($data);
        return redirect()->route('dataPendeta')->withToastSuccess('Data Pendeta Berhasil Ditambahkan!');
    }

    public function viewEdit($id){
        return view('admin.viewEditPendeta',[
            "title" => 'Edit Data Pendeta',
            "data" => Pendeta::where('id',$id)->first(),
        ]);
    }

    public function ubahPendeta(Request $request, $id){
        $data = [
            "nama" => Request()->nama,
            'tempatLahir' => Request()->tempatLahir,
            'tglLahir' => Request()->tglLahir,
            'status' => Request()->status,
            'tglMasuk' => Request()->tglMasuk,
        ];

        Pendeta::where('id',$id)->update($data);
        return redirect()->route('dataPendeta')->withToastSuccess('Data Pendeta Berhasil Diubah!');
    }
}
