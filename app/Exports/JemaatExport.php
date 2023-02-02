<?php

namespace App\Exports;

use App\Models\Jemaat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class JemaatExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('export.exportJemaat', [
            'jemaat' => Jemaat::all()
        ]);
        // return Jemaat::all(['nik','nama','tempatLahir','tglLahir','jenisKelamin','statusKeluarga','nomorHp']);
    }
}
