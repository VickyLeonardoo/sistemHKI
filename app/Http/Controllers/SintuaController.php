<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sintua;
use App\Models\Wijk;
class SintuaController extends Controller
{
    public function index(){
        return view('admin.viewSintua',[
            "title" => 'Data Sintua',
            "sintua" => Sintua::all(),
            "wijk" => Wijk::all(),
        ]);
    }

    public function viewTambah(){
        return view('admin.viewTambahSintua',[
            "title" => 'Tambah Data Sintua',
            "wijk" => Wijk::all(),
        ]);
    }

    public function simpanSintua(){
        $data = [
            'nama' => Request()->nama,
            'wijk_id' => Request()->wijk,
            'tglMulai' => Request()->tglMulai,
        ];

        Sintua::create($data);
        return redirect()->route('dataSintua')->withToastSuccess('Data Sintua Berhasil Ditambahkan!');
    }

    public function ubahSintua(Request $request, $id){
        $data = [
            'nama' => Request()->nama,
            'wijk_id' => Request()->wijk_id,
        ];
        Sintua::where('id',$id)->udpdate($data);
        return redirect()->back()->withToastSuccess('Data Sintua Berhasil Diubah!');

    }
}
