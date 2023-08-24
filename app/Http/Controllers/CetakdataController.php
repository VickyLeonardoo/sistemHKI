<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Jemaat;
use DateTime;
use App\Exports\JemaatExport;
use App\Exports\PendetaExport;
use App\Exports\SintuaExport;
use App\Exports\WijkExport;
use App\Exports\KkExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
class CetakdataController extends Controller
{
    public function index(){
        if(Auth::guard('user')->user()->role == 1){
            return view('admin.viewCetakData',[
                "title" => "Cetak Data",
            ]);
        }else{
            return view('bph.viewCetakData',[
                "title" => "Cetak Data",
            ]);
        }

    }

    public function exportJemaat(){
        // return Jemaat::all();
        return Excel::download(new JemaatExport, 'daftarJemaat.xlsx');
    }

    public function exportWijk(){
        // return Jemaat::all();
        return Excel::download(new WijkExport, 'daftarWijk.xlsx');
    }

    public function exportSintua(){
        // return Jemaat::all();
        return Excel::download(new SintuaExport, 'daftarSintua.xlsx');
    }

    public function exportPendeta(){
        // return Jemaat::all();
        return Excel::download(new PendetaExport, 'daftarPendeta.xlsx');
    }

    public function exportKk(){
        // return Jemaat::all();
        return Excel::download(new KkExport, 'daftarKk.xlsx');
    }

        // $now = Carbon::now();
        // $weekStartDate = $now->startOfWeek();
        // $weekEndDate = $now->endOfWeek();

        // $date = now();
        // $dt = $date->addDays(7);
        // $dats = Carbon::now();
        // $dates = $dats->addDays(5);


        // return Jemaat::whereMonth('tglLahir', $weekStartDate->month)->whereDay('tglLahir', '<-', $weekEndDate->day)
        //    ->orWhere(function ($query) use ($weekStartDate,$weekEndDate) {
        //        $query->whereMonth('tglLahir', '=', $weekStartDate->month)
        //            ->whereDay('tglLahir', '<=', $weekEndDate->day);
        //    })->count();
}

