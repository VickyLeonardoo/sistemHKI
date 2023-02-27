<?php

namespace App\Http\Controllers;
use App\Models\Pendapatan;
use Illuminate\Http\Request;
use App\Models\Jemaat;

class KeuanganController extends Controller
{
    public function viewKeuangan(){
        return view('keuangan.viewKeuangan',[
            'title' => "Master Data"
        ]);
    }

    public function viewMasterPendapatan(){
        return view('keuangan.viewMasterPendapatans',[
            'title' => "Master Data Pendapatan",
            'pend' => Pendapatan::all(),
        ]);
    }

    public function viewTambahMasterPendapatan(){
        return view('keuangan.viewTambahMasterPenapatan',[
            'title' => "Tambah Data Master Pendapatan",
        ]);
    }

    public function simpanMasterPendapatan(){
        $str = strtolower(Request()->nama);
        $data = [
            'kode' => Request()->kode,
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];
        Pendapatan::create($data);
        return redirect()->route('viewPendapatan')->withToastSuccess('Data Berhasil DItambahkan');
    }

    public function editPendapatan($slug){
            return view('keuangan.viewEditPendapatan',[
            'title' => "Edit Data Pendapatan",
            'pend' => Pendapatan::where('slug',$slug)->first(),
        ]);
    }

    public function updatePendapatan($id){
        $str = strtolower(Request()->nama);
        $data = [
            'kode' => Request()->kode,
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];

        Pendapatan::where('id',$id)->update($data);
        return redirect('master-data-pendapatan')->withToastSuccess('Data Berhasil Diubah!');
    }

    public function hapusPendapatan($id){
        Pendapatan::where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Data Berhasil Dihapus!');
    }

    public function viewPendapatanGereja(){
        return view('keuangan.viewPendapatanGereja',[
            'title' => 'Pendapatan Gereja',
        ]);
    }


}
