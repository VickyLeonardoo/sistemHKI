<?php

namespace App\Http\Controllers;

use App\Models\Kk;
use App\Models\Wijk;
use App\Models\Sintua;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WijkController extends Controller
{
    public function index(){
        if (Auth::guard('user')->user()->role == 1){
            return view('admin.wijk.viewWijk',[
                "title" => 'Data Wijk',
                "wijk" => Wijk::all(),

            ]);
        }else{
            return view('bph.viewWijk',[
                "title" => 'Data Wijk',
                "wijk" => Wijk::all(),

            ]);
        }

    }

    public function viewTambah(){
        return view('admin.wijk.viewTambahWijk',[
            "title" => 'Tambah Data Wijk',
            'sintua' => Sintua::first(),
        ]);
    }

    public function simpanWijk(Request $request){
        $request->validate([
            'nama' => 'required',
        ],[
            'nama.required' => 'Nama Wajib Diisi',
        ]);
        $str = strtolower(Request()->nama);
        $data = [
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];

        Wijk::create($data);
        return redirect()->route('admin.wijk.home')->withToastSuccess('Wijk Berhasil Ditambahkan!');
    }

    public function ubahWijk(Request $request, $id){
        $request->validate([
            'nama' => 'required',
        ],[
            'nama' => 'Nama Wajib Diisi'
        ]);

        $str = strtolower(Request()->nama);

        $data = [
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),

        ];
        Wijk::where('id',$id)->update($data);
        return redirect()->route('admin.wijk.home')->withToastSuccess('Wijk Berhasil Diubah!');
    }

    public function viewAnggota($slug){
        // $wijk = Wijk::where('slug',$slug)->first()->kk;
        // $kk = Kk::first()->wijk->nama;
        // echo($wijk);

        return view('admin.wijk.viewAnggotaWijk',[
            "slug" => $slug,
            "title" => "Anggota Wijk",
            "kk"    =>  Wijk::where('slug',$slug)->first()->kk,
            'sintua' => Sintua::first(),

        ]);
    }

    public function viewKegiatan(Request $request, $slug){
        $wijk = Wijk::where('slug',$slug)->first();
        $wijkId = $wijk->id;
        return view('admin.wijk.viewKegiatanWijk',[
            'title' => "Kegiatan Wijk",
            'sintua' => Sintua::all(),
            'kk' => Kk::where('wijk_id',$wijkId)->get(),
            'wijk_id' => $wijkId,
            'kegiatan' => Kegiatan::where('wijk_id',$wijkId)->get(),
        ]);
    }
}
