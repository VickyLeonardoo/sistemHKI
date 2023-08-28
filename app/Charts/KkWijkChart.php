<?php

namespace App\Charts;

use App\Models\Kk;
use App\Models\Wijk;
use ArielMejiaDev\LarapexCharts\PieChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class KkWijkChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $wijks = Wijk::get();
        $kkCounts = []; // Menyimpan jumlah KK untuk masing-masing Wijk
        $wijkLabels = []; // Menyimpan nama Wijk

        foreach ($wijks as $wijk) {
            $kkCount = Kk::where('wijk_id', $wijk->id)->where('is_deleted', '0')->count();
            $kkCounts[] = $kkCount;
            $wijkLabels[] = $wijk->nama;
        }

            $chart = (new PieChart)
            ->setTitle('Jumlah KK Per Wijk')
            ->setLabels($wijkLabels)
            ->setHeight(400)
            ->setDataset($kkCounts);

        return $chart;
    }
}
