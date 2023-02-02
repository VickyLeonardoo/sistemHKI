<?php

namespace App\Exports;

use App\Models\Sintua;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class SintuaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('export.exportSintua', [
            'sintua' => Sintua::all()
        ]);
    }
}
