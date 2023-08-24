<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wijk;
use App\Models\Kk;
use Carbon\Carbon;
use App\Models\Jemaat;
use App\Models\Sintua;
use App\Models\Deposit;
use App\Models\Pembayaran;
use Auth;
class HomeController extends Controller
{
    public function index(){
        $now = Carbon::now();

        $weekstart = $now->startOfWeek()->format('d-M-y');
        $weekend = $now->endOfWeek()->format('d-M-y');

        $weekStartDate = $now->startOfWeek();
        $weekEndDate = $now->endOfWeek();
        $ultah = Jemaat::whereMonth('tglLahir', $weekStartDate->month)->whereDay('tglLahir', '<-', $weekEndDate->day)
                ->orWhere(function ($query) use ($weekStartDate,$weekEndDate) {
                 $query->whereMonth('tglLahir', '=', $weekStartDate->month)
                ->whereDay('tglLahir', '<=', $weekEndDate->day);
                })->count();
        $totalDeposit = Deposit::sum('nominalPendapatan');
        $totalPembayaran = Pembayaran::sum('nominalPengeluaran');
        $totalNominal = $totalDeposit - $totalPembayaran;
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.index',[
                "title" => 'Home',
                'wijk' => Wijk::all()->count(),
                'jemaat' => Jemaat::all()->count(),
                'kk' => Kk::all()->count(),
                'pria' => Jemaat::where('jenisKelamin','Pria')->count(),
                'wanita' => Jemaat::where('jenisKelamin','Wanita')->count(),
                'start' => $weekstart,
                'end' => $weekend,
                'ultah' => $ultah,
                'sintua' => Sintua::first(),
                'totalNominal' => $totalNominal,

            ]);
        }else{
            return view('bph.index',[
                "title" => 'BPH - Home',
                'wijk' => Wijk::all()->count(),
                'jemaat' => Jemaat::all()->count(),
                'kk' => Kk::all()->count(),
                'pria' => Jemaat::where('jenisKelamin','Pria')->count(),
                'wanita' => Jemaat::where('jenisKelamin','Wanita')->count(),
                'start' => $weekstart,
                'end' => $weekend,
                'ultah' => $ultah,
                'sintua' => Sintua::first(),
                'totalNominal' => $totalNominal,

            ]);
        }


    }
}
