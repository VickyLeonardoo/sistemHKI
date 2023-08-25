<?php

namespace App\Charts;

use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\PieChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KeuanganBulananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
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

        return $this->chart->lineChart()
            ->setTitle('Grafik Keuangan Bulanan.')
            ->setSubtitle('Grafik Keuangan.')
            ->addData('Pendapatan', $pendapatanData)
            ->addData('Pengeluaran', $pengeluaranData)
            ->addData('Total', $totalData)
            ->setHeight(386)
            ->setXAxis($months); // Menggunakan label bulan yang telah dikumpulkan
    }

}
