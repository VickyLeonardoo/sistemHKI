<?php

namespace App\Exports;

use App\Models\Kk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class KkExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('export.exportKk', [
            'kk' => Kk::all()
        ]);
    }
}
