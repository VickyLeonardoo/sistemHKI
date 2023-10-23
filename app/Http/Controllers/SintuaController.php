<?php

namespace App\Http\Controllers;

use App\Models\Wijk;
use App\Models\Sintua;
use App\Models\Pendeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SintuaController extends Controller
{
    public function index(){
        if (Auth::guard('user')->user()->role == 1){
            return view('admin.viewSintua',[
                "title" => 'Data Sintua',
                "sintuas" => Sintua::all(),
                "wijk" => Wijk::all(),
                'sintua' => Sintua::first(),
                'pendeta' => Pendeta::first(),
            ]);
        }else{
            return view('bph.viewSintua',[
                "title" => 'Data Sintua',
                "sintuas" => Sintua::all(),
                "wijk" => Wijk::all(),
                'sintua' => Sintua::first(),
                'pendeta' => Pendeta::first(),
            ]);
        }

    }

    public function viewTambah(){

        return view('admin.viewTambahSintua',[
            "title" => 'Tambah Data Sintua',
            "wijk" => Wijk::all(),

        ]);
    }

    public function simpanSintua(Request $request){
        $request->validate([
            'nama' => 'required',
            'wijk' => 'required',
            'tglMulai' => 'required',
        ],[
            'nama.required' => 'Nama Wajib Diisi',
            'wijk.required' => 'Wijk Wajib Diisi',
            'tglMulai.required' => 'Tanggal Wajib Diisi'
        ]);

        $wijkName = Wijk::where('id',Request()->wijk)->first();
        $str = strtolower(Request()->nama.'-'.'wijk'.'-'.$wijkName->nama);
        $data = [
            'nama' => Request()->nama,
            'wijk_id' => Request()->wijk,
            'tglMulai' => Request()->tglMulai,
            'slug' => preg_replace('/\s+/', '-', $str),

        ];

        Sintua::create($data);
        return redirect()->route('admin.sintua.home')->withToastSuccess('Data Sintua Berhasil Ditambahkan!');
    }

    public function editSintua($slug){
        $sin =  Sintua::where('slug',$slug)->first();

        return view('admin.viewEditSintua',[
            'title' => 'Edit Sintua'.' '.$sin->nama,
            'sintua' => Sintua::where('slug',$slug)->first(),
            'wijk' => Wijk::all(),
            'pendeta' => Pendeta::first(),

        ]);
    }

    public function ubahSintua(Request $request, $id){
        $request->validate([
            'nama' => 'required',
            'wijk_id' => 'required',
        ],[
            'nama.required' => 'Nama Wajib Diisi',
            'wijk_id.required' => 'Wijk Wajib Diisi',
        ]);

        $wijkName = Wijk::where('id',Request()->wijk_id)->first();
        $str = strtolower(Request()->nama.'-'.'wijk'.'-'.$wijkName->nama);

        $data = [
            'nama' => Request()->nama,
            'wijk_id' => Request()->wijk_id,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];

        Sintua::where('id',$id)->update($data);
        return redirect('data-sintua')->withToastSuccess('Data Sintua Berhasil Diubah!');
    }

    public function hapusSintua($id){
        Sintua::where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Data Sintua berhasil dihapus');
    }
}
