<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jemaat;
use App\Models\Wijk;

class BphController extends Controller
{
    public function index(){
        return view('bph.index',[
            "title" => 'Home',
            'wijk' => Wijk::all()->count(),
            'jemaat' => Jemaat::all()->count(),
            'pria' => Jemaat::where('jenisKelamin','Laki-Laki')->count(),
            'wanita' => Jemaat::where('jenisKelamin','Perempuan')->count(),
        ]);
    }
}
