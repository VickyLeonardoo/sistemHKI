<?php

namespace App\Charts;

use App\Models\Jemaat;
use Illuminate\Support\Carbon;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class JemaatChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $jemaat = Jemaat::where('is_alive','0')->where('is_deleted','0')->where('is_alive','0')->get();

        $anakCount = 0;
        $remajaCount = 0;
        $dewasaCount = 0;
        $lansiaCount = 0;

        foreach ($jemaat as $person) {
            $umur = Carbon::parse($person->tglLahir)->age;

            if ($umur >= 1 && $umur <= 13) {
                $anakCount++;
            } elseif ($umur >= 14 && $umur <= 19) {
                $remajaCount++;
            } elseif ($umur >= 20 && $umur <= 49) {
                $dewasaCount++;
            } else {
                $lansiaCount++;
            }
        }

        return $this->chart->pieChart()
            ->setTitle('Grafik Jemaat')
            ->setSubtitle('Gereja HKI Resort Mangsang')
            ->addData([$dewasaCount, $anakCount, $remajaCount, $lansiaCount])
            ->setHeight(300)
            ->setLabels(['Dewasa', 'Anak', 'Remaja', 'Lansia']);
    }

}
