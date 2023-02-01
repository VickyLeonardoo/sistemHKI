<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wijk;
use App\Models\Jemaat;
class HomeController extends Controller
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
