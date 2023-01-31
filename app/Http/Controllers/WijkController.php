<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wijk;

class WijkController extends Controller
{
    public function index(){
        return view('admin.viewWijk',[
            "title" => 'Data Wijk',
            "wijk" => Wijk::all(),
        ]);
    }

    public function viewTambah(){
        return view('admin.viewTambahWijk',[
            "title" => 'Tambah Data Wijk',
        ]);
    }

    public function simpanWijk(Request $request){
        $data = [
            'nama' => Request()->nama,
        ];

        Wijk::create($data);
        return redirect()->route('dataWijk')->withToastSuccess('Wijk Berhasil Ditambahkan!');
    }

    public function ubahWijk(Request $request, $id){
        $data = [
            'nama' => Request()->nama,
        ];
        Wijk::where('id',$id)->update($data);
        return redirect()->route('dataWijk')->withToastSuccess('Wijk Berhasil Diubah!');
    }

}
