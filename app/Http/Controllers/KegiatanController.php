<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
class KegiatanController extends Controller
{
    public function simpanKegiatan(Request $request){
        $data = [
            'sintua_id' => Request()->sintua,
            'wijk_id' => Request()->wijk,
            'kk_id' => Request()->kk,
            'tglKegiatan' => Request()->tglKegiatan,
        ];

        Kegiatan::create($data);
        return redirect()->back()->withToastSuccess('Data Kegiatan Berhasil Ditambahkan');
    }

    public function ubahKegiatan(Request $request, $id){
        $data = [
            'kk_id' => Request()->kk,
            'sintua_id' => Request()->sintua,
            'tglKegiatan' => Request()->tglKegiatan,
        ];

        Kegiatan::where('id',$id)->update($data);
        return redirect()->back()->withToastSuccess('Data Berhasil Diubah');
    }

    public function hapusKegiatan($id){
        Kegiatan::where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Data Kegiatan Berhasil Dihapus');
    }
}
