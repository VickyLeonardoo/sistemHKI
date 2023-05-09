<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jemaat;
use App\Models\Kk;
use App\Models\Sintua;
class SuratController extends Controller
{
    public function viewSKJemaat(){
        return view('admin.viewSkJemaat',[
            'title' => "Surat Keterangan Jemaat",
            'jemaat' => Jemaat::get(),
        ]);
    }
    public function viewSKPindah(){
        return view('admin.viewSkPindah',[
            'title' => "Surat Keterangan Pindah Gereja",
            'jemaat' => Jemaat::get(),
            'kk' => Kk::get(),
            'sintua' => Sintua::get(),
        ]);
    }
    public function viewSKKematian(){
        return view('admin.viewSkKematian',[
            'title' => "Surat Keterangan Kematian",
            'jemaat' => Jemaat::get(),
        ]);
    }
    public function viewSKNikah(){
        return view('admin.viewSkNikah',[
            'title' => "Surat Keterangan Pernikahan",
            'jemaatPria' => Jemaat::where('jenisKelamin','Pria')->get(),
            'jemaatWanita' => Jemaat::where('jenisKelamin','Wanita')->get(),
        ]);
    }
}
