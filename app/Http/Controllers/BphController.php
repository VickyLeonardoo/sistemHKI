<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jemaat;
use App\Models\Wijk;

class BphController extends Controller
{
    public function index(){
        return view('index',[
            "title" => 'Home',
            'wijk' => Wijk::all()->count(),
            'jemaat' => Jemaat::all()->count(),
            'pria' => Jemaat::where('jenisKelamin','Pria')->count(),
            'wanita' => Jemaat::where('jenisKelamin','Wanita')->count(),
        ]);
    }
}
