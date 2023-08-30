<?php

namespace App\Charts;

use App\Models\Jemaat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class GenderChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $pria = Jemaat::where('jenisKelamin','Pria')->where('is_alive','0')->where('is_deleted','0')->count();
        $wanita = Jemaat::where('jenisKelamin','Wanita')->where('is_alive','0')->where('is_deleted','0')->count();

        return $this->chart->donutChart()
            ->setTitle('Jenis Kelamin Grafik')
            ->setSubtitle('Gereja HKI Resort Mangsang')
            ->addData([$pria, $wanita])
            ->setHeight(300)
            ->setLabels(['Pria', 'Wanita']);
    }
}
