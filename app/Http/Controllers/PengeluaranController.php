<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    public function viewPengeluaran(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('keuangan.viewMasterPengeluaran',[
                'title' => 'Master Data Pengeluaran',
                'pengeluaran' => Pengeluaran::all(),
            ]);
        }else{
            return view('keuanganBph.viewMasterPengeluaran',[
                'title' => 'Master Data Pengeluaran',
                'pengeluaran' => Pengeluaran::all(),
            ]);
        }

    }

    public function viewTambahMasterPengeluaran(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('keuangan.viewTambahMasterPengeluaran',[
                'title' => "Tambah Data Master Pengeluaran",
            ]);
        }else{
            return view('keuanganBph.viewTambahMasterPengeluaran',[
                'title' => "Tambah Data Master Pengeluaran",
            ]);
        }

    }

    public function simpanMasterPengeluaran(){
        $str = strtolower(Request()->nama);
        $data = [
            'kode' => Request()->kode,
            'nama' => Request()->nama,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];
        Pengeluaran::create($data);
        return redirect()->back()->withToastSuccess('Data Berhasil DItambahkan');
    }

    public function editPengeluaran(){

    }

    public function viewPembayaran(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.keuangan.viewPengeluaran',[
                'title' => 'Pengeluaran',
                'pengeluaran' => Pengeluaran::all(),
                'pembayaran' => Pembayaran::all(),
                'totalNominal' => Pembayaran::sum('nominalPengeluaran'),
            ]);
        }else{
            return view('keuanganBph.viewPengeluaran',[
                'title' => 'Pengeluaran',
                'pengeluaran' => Pengeluaran::all(),
                'pembayaran' => Pembayaran::all(),
                'totalNominal' => Pembayaran::sum('nominalPengeluaran'),
            ]);
        }
    }

    public function simpanPembayaran(Request $request){
        $data = [
            'pengeluaran_id' => $request->pendapatan_id,
            'nominalPengeluaran' => $request->nominal,
            'catatan' => $request->catatan,
            'tglDeposit' => $request->tglDeposit,
        ];
        Pembayaran::create($data);
        return redirect()->back()->withToastSuccess('Data Pengeluaran Berhasil di Tambahkan');
    }

    public function hapusPembayaran($id){
        Pembayaran::where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Data Pengeluaran Berhasil Dihapus');
    }
}
