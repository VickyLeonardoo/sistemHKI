<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wijk;

class HomeController extends Controller
{
    public function index(){
        return view('index',[
            "title" => 'Home',
            'wijk' => Wijk::all()->count(),
        ]);
    }
}
