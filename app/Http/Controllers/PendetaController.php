<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendeta;
use Illuminate\Support\Facades\Redis;
use PDO;
use App\Models\Sintua;
class PendetaController extends Controller
{

    public function index(){
        return view('admin.viewPendeta',[
            "title" => "Data Pendeta",
            "pendeta" => Pendeta::all(),

        ]);
    }

    public function viewTambah(){
        $data = [
            'slug' => 'REs'
        ];

        return view('admin.viewTambahPendeta',[
            "title" => 'Tambah Data Pendeta',
            'pendeta' => Pendeta::first(),
            'data' => ['slug' => 'data'],

        ]);
    }

    public function simpanPendeta(Request $request){
        $str = strtolower(Request()->status.'-'.Request()->nama);
        $data = [
            "nama" => Request()->nama,
            'tempatLahir' => Request()->tempatLahir,
            'tglLahir' => Request()->tglLahir,
            'status' => Request()-> status,
            'tglMasuk' => Request()->tglMasuk,
            'slug' => preg_replace('/\s+/', '-', $str),

        ];

        Pendeta::create($data);
        return redirect()->route('dataPendeta')->withToastSuccess('Data Pendeta Berhasil Ditambahkan!');
    }

    public function viewEdit($slug){
        $str = strtolower(Request()->status.'-'.Request()->nama);

        return view('admin.viewEditPendeta',[
            "title" => 'Edit Data Pendeta',
            "data" => Pendeta::where('slug',$slug)->first(),

        ]);
    }

    public function viewEditPendeta($slug){

        return view('admin.viewEditPendeta',[
            'title' => 'Edit Data Pendeta',
            'data' => Pendeta::where('slug',$slug)->first(),
            'pendeta' => Pendeta::first(),
        ]);
    }

    public function ubahPendeta(Request $request, $id){
        $str = strtolower(Request()->status.'-'.Request()->nama);
        $data = [
            "nama" => Request()->nama,
            'tempatLahir' => Request()->tempatLahir,
            'tglLahir' => Request()->tglLahir,
            'status' => Request()->status,
            'tglMasuk' => Request()->tglMasuk,
            'slug' => preg_replace('/\s+/', '-', $str),

        ];

        Pendeta::where('id',$id)->update($data);
        return redirect()->route('dataPendeta')->withToastSuccess('Data Pendeta Berhasil Diubah!');
    }

    public function hapusPendeta($id){
        Pendeta::where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Data Pendeta berhasil Dihapus!');
    }
}