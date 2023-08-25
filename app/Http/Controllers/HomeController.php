<?php

namespace App\Http\Controllers;

use App\Charts\GenderChart;
use App\Charts\JemaatChart;
use App\Models\Kk;
use Carbon\Carbon;
use App\Models\Wijk;
use App\Models\Jemaat;
use App\Models\Sintua;
use App\Models\Deposit;
use App\Models\Pembayaran;
use App\Charts\KkWijkChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\KeuanganBulananChart;
use App\Models\Pendeta;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(KkWijkChart $kkWijkChart, KeuanganBulananChart $keuanganBulananChart, JemaatChart $jemaatChart, GenderChart $genderChart){
        $currentYear = date('Y'); // Tahun sekarang (format: YYYY)
        $currentMonth = date('m'); // Bulan sekarang (format: MM)
        $months = []; // Menyimpan label bulan untuk sumbu X
        $pendapatanData = []; // Menyimpan data pendapatan untuk setiap bulan
        $pengeluaranData = []; // Menyimpan data pengeluaran untuk setiap bulan
        $totalData = []; // Menyimpan data total keuangan (pendapatan - pengeluaran) untuk setiap bulan

        // Mengambil data perbulan dari awal tahun sampai bulan sekarang
        for ($month = 1; $month <= $currentMonth; $month++) {
            $months[] = date('F', mktime(0, 0, 0, $month, 1)); // Menambahkan label bulan ke array

            // Mengambil data pendapatan dari table deposits untuk bulan dan tahun sekarang
            $pendapatan = DB::table('deposits')
                ->whereYear('tglDeposit', $currentYear)
                ->whereMonth('tglDeposit', $month)
                ->sum('nominalPendapatan');
            $pendapatanData[] = $pendapatan;

            // Mengambil data pengeluaran dari table pembayarans untuk bulan dan tahun sekarang
            $pengeluaran = DB::table('pembayarans')
                ->whereYear('tglDeposit', $currentYear)
                ->whereMonth('tglDeposit', $month)
                ->sum('nominalPengeluaran');
            $pengeluaranData[] = $pengeluaran;

            // Menghitung total keuangan (pendapatan - pengeluaran) untuk bulan dan tahun sekarang
            $total = $pendapatan - $pengeluaran;
            $totalData[] = $total;
        }

        $wijkData = Wijk::all();
        $kkData = Kk::all();
        $wijkKKCount = [];
        foreach ($kkData as $kk) {
            $wijkId = $kk->wijk_id;
            $wijkKKCount[$wijkId] = ($wijkKKCount[$wijkId] ?? 0) + 1;
        }
        $chartData = [['Wijk', 'Jumlah KK']];
        foreach ($wijkData as $wijk) {
            $jumlahKK = $wijkKKCount[$wijk->id] ?? 0;
            $chartData[] = [$wijk->nama, $jumlahKK];
        }
        $chartDataJson = json_encode($chartData);
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
        $pendetaCount = Pendeta::count();
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
                'chartDataJson' => $chartDataJson,
                'chartData' => $chartData,
                'kkWijkChart' => $kkWijkChart->build(),
                'chart' => $keuanganBulananChart->build(),
                'bulan' => $months,
                'pendapatan' => $pendapatanData,
                'pengeluaran' => $pengeluaranData,
                'total' => $totalData,
                'pendeta' => $pendetaCount,
                'jemaatChart' => $jemaatChart->build(),
                'chartGender' => $genderChart->build(),
            ]);
        }else{
            return view('bph.index',[
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
                'chartDataJson' => $chartDataJson,
                'chartData' => $chartData,
                'kkWijkChart' => $kkWijkChart->build(),
                'chart' => $keuanganBulananChart->build(),
                'bulan' => $months,
                'pendapatan' => $pendapatanData,
                'pengeluaran' => $pengeluaranData,
                'total' => $totalData,
                'pendeta' => $pendetaCount,
                'jemaatChart' => $jemaatChart->build(),
                'chartGender' => $genderChart->build(),

            ]);
        }
    }
}
