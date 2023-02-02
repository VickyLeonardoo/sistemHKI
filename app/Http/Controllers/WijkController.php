<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wijk;
use App\Models\Kk;
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
        $str = strtolower(Request()->nama);
        $data = [
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),
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

    public function viewAnggota($slug){
        // $wijk = Wijk::where('slug',$slug)->first()->kk;
        // $kk = Kk::first()->wijk->nama;
        // echo($wijk);

        return view('admin.viewAnggotaWijk',[
            "slug" => $slug,
            "title" => "Anggota Wijk",
            "kk"    =>  Wijk::where('slug',$slug)->first()->kk,
        ]);
    }

}
