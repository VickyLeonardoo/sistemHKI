<?php

namespace App\Exports;

use App\Models\Pendeta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class PendetaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('export.exportPendeta', [
            'pendeta' => Pendeta::all()
        ]);
    }
}
