<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kehadiran;
use App\Models\Kegiatan;
class KehadiranController extends Controller
{
    public function viewKehadiran($tgl, $slug){
        $kegiatan = Kegiatan::where('tglKegiatan', $tgl)->first();
        $id = $kegiatan->id;
        // return $kegiatan->id;

        return view('admin.wijk.viewKehadiran',[
            'title' => "Rekap Kehadiran",
            'kehadiran' => Kehadiran::where('kegiatan_id',$id)->get(),
            'id' => $id,
            // 'kehadiran' => Kehadiran::where('tglKeg')
        ]);
    }

    public function simpanKehadiran(Request $request){

        $data = [
            'priaDewasa' => Request()->pria,
            'wanitaDewasa' => Request()->wanita,
            'remaja' => Request()->remaja,
            'anak' => Request()->anak,
            'kegiatan_id' => Request()->kegiatan,
        ];

        Kehadiran::create($data);
        return redirect()->back()->withToastSuccess('Data Kehadiran Berhasil Ditambahkan');
    }
}
