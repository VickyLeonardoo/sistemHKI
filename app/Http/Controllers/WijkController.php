<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\Wijk;
use App\Models\Kk;
use App\Models\Sintua;
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
            'sintua' => Sintua::first(),
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
        $str = strtolower(Request()->nama);

        $data = [
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),

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
            'sintua' => Sintua::first(),

        ]);
    }

    public function viewKegiatan(Request $request){

        if($request->ajax()) {

            $data = Kegiatan::whereDate('start', '>=', $request->start)
                      ->whereDate('end',   '<=', $request->end)
                      ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
       }

       return view('admin.viewKegiatanWijk',[
        'title' => "Kegiatan Wijk"

       ]);
        // return view('admin.viewKegiatanWijk',[

        // ]);

    }

    public function ajax(Request $request)
    {

        switch ($request->type) {
           case 'add':
              $event = Kegiatan::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           case 'update':
              $event = Kegiatan::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);

              return response()->json($event);
             break;

           case 'delete':
              $event = Kegiatan::find($request->id)->delete();

              return response()->json($event);
             break;

           default:
             # code...
             break;
        }
    }

}
