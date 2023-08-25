<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jemaat;
use App\Models\Kk;
use App\Models\Sintua;
use Auth;
class SuratController extends Controller
{
    public function viewSKJemaat(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.viewSkJemaat',[
                'title' => "Surat Keterangan Jemaat",
                'jemaat' => Jemaat::get(),
            ]);
        }else{
            return view('bph.viewSkJemaat',[
                'title' => "Surat Keterangan Jemaat",
                'jemaat' => Jemaat::get(),
            ]);
        }

    }
    public function viewSKPindah(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.viewSkPindah',[
                'title' => "Surat Keterangan Pindah Gereja",
                'jemaat' => Jemaat::get(),
                'kk' => Kk::get(),
                'sintua' => Sintua::get(),
            ]);
        }else{
            return view('bph.viewSkPindah',[
                'title' => "Surat Keterangan Pindah Gereja",
                'jemaat' => Jemaat::get(),
                'kk' => Kk::get(),
                'sintua' => Sintua::get(),
            ]);
        }

    }
    public function viewSKKematian(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.viewSkKematian',[
                'title' => "Surat Keterangan Kematian",
                'jemaat' => Jemaat::get(),
            ]);
        }else{
            return view('bph.viewSkKematian',[
                'title' => "Surat Keterangan Kematian",
                'jemaat' => Jemaat::get(),
            ]);
        }

    }
    public function viewSKNikah(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.viewSkNikah',[
                'title' => "Surat Keterangan Pernikahan",
                'jemaatPria' => Jemaat::where('jenisKelamin','Pria')->get(),
                'jemaatWanita' => Jemaat::where('jenisKelamin','Wanita')->get(),
            ]);
        }else{
            return view('bph.viewSkNikah',[
                'title' => "Surat Keterangan Pernikahan",
                'jemaatPria' => Jemaat::where('jenisKelamin','Pria')->get(),
                'jemaatWanita' => Jemaat::where('jenisKelamin','Wanita')->get(),
            ]);
        }

    }
}