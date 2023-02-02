<?php

namespace App\Exports;

use App\Models\Wijk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class WijkExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.exportWijk', [
            'wijk' => Wijk::all()
        ]);
    }
}
