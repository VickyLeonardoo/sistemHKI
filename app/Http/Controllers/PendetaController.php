<?php

namespace App\Http\Controllers;

use PDO;
use App\Models\Sintua;
use App\Models\Pendeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
class PendetaController extends Controller

{
    public function index(){
        if (Auth::guard('user')->user()->role == 1){
            return view('admin.pendeta.viewPendeta',[
                "title" => "Data Pendeta",
                "pendeta" => Pendeta::all(),
            ]);
        }else{
            return view('bph.viewPendeta',[
                "title" => "Data Pendeta",
                "pendeta" => Pendeta::all(),
            ]);
        }
    }

    public function viewTambah(){
        $data = [
            'slug' => 'REs'
        ];
        return view('admin.pendeta.viewTambahPendeta',[
            "title" => 'Tambah Data Pendeta',
            'pendeta' => Pendeta::first(),
            'data' => ['slug' => 'data'],
        ]);
    }

    public function simpanPendeta(Request $request){
        $request->validate([
            'nama' => 'required',
            'tempatLahir' => 'required',
            'tglLahir' => 'required',
            'tglMasuk' => 'required',
        ],[
            'nama.required' => 'Nama Wajib Diisi',
            'tempatLahir.required' => 'Tempat Lahir Wajib Diisi',
            'tglLahir.required' => 'Tanggal Lahir Wajib Diisi',
            'tglMasuk.required' => 'Tanggal Masuk Wajib Diisi',
        ]);

        $str = strtolower(Request()->status.'-'.Request()->nama);
        $data = [
            "nama" => Request()->nama,
            'tempatLahir' => Request()->tempatLahir,
            'tglLahir' => Request()->tglLahir,
            'tglMasuk' => Request()->tglMasuk,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];

        Pendeta::create($data);
        return redirect()->route('admin.pendeta.home')->withToastSuccess('Data Pendeta Berhasil Ditambahkan!');
    }

    public function viewEdit($slug){
        $str = strtolower(Request()->status.'-'.Request()->nama);

        return view('admin.viewEditPendeta',[
            "title" => 'Edit Data Pendeta',
            "data" => Pendeta::where('slug',$slug)->first(),

        ]);
    }

    public function viewEditPendeta($slug){
        return view('admin.pendeta.viewEditPendeta',[
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
        return redirect()->route('admin.pendeta.home')->withToastSuccess('Data Pendeta Berhasil Diubah!');
    }

    public function hapusPendeta($id){
        Pendeta::where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Data Pendeta berhasil Dihapus!');
    }
}
