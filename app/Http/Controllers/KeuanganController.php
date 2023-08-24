<?php

namespace App\Http\Controllers;
use App\Models\Pendapatan;
use Illuminate\Http\Request;
use App\Models\Jemaat;
use Auth;
class KeuanganController extends Controller
{
    public function viewKeuangan(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('keuangan.viewKeuangan',[
                'title' => "Master Data"
            ]);
        }else{
            return view('keuanganBph.viewKeuangan',[
                'title' => "Master Data"
            ]);
        }
    }

    public function viewMasterPendapatan(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('keuangan.viewMasterPendapatans',[
                'title' => "Master Data Pendapatan",
                'pend' => Pendapatan::all(),
            ]);
        }else{
            return view('keuanganBph.viewMasterPendapatans',[
                'title' => "Master Data Pendapatan",
                'pend' => Pendapatan::all(),
            ]);
        }
    }

    public function viewTambahMasterPendapatan(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('keuangan.viewTambahMasterPenapatan',[
                'title' => "Tambah Data Master Pendapatan",
            ]);
        }else{
            return view('keuanganBph.viewTambahMasterPenapatan',[
                'title' => "Tambah Data Master Pendapatan",
            ]);
        }
    }

    public function simpanMasterPendapatan(){
        $str = strtolower(Request()->nama);
        $data = [
            'kode' => Request()->kode,
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];
        Pendapatan::create($data);
        if (Auth::guard('user')->user()->role == 1) {
            return redirect()->route('viewPendapatan')->withToastSuccess('Data Berhasil DItambahkan');
        }else{
            return redirect()->route('bphViewPendapatan')->withToastSuccess('Data Berhasil DItambahkan');
        }
    }

    public function editPendapatan($slug){
        if (Auth::guard('user')->user()->role == 1) {
            return view('keuangan.viewEditPendapatan',[
                'title' => "Edit Data Pendapatan",
                'pend' => Pendapatan::where('slug',$slug)->first(),
            ]);
        }else{
            return view('keuanganBph.viewEditPendapatan',[
                'title' => "Edit Data Pendapatan",
                'pend' => Pendapatan::where('slug',$slug)->first(),
            ]);
        }
    }

    public function updatePendapatan($id){
        $str = strtolower(Request()->nama);
        $data = [
            'kode' => Request()->kode,
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];

        Pendapatan::where('id',$id)->update($data);
        if (Auth::guard('user')->user()->role == 1) {
            return redirect('master-data-pendapatan')->withToastSuccess('Data Berhasil Diubah!');
        }else{
            return redirect('/bph/master-data-pendapatan')->withToastSuccess('Data Berhasil Diubah!');

        }
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
