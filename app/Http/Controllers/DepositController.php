<?php

namespace App\Http\Controllers;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Pendapatan;
use Auth;
class DepositController extends Controller
{
    public function viewDeposit(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('keuangan.viewDeposit',[
                'title' => 'Deposit',
                'deposit' => Deposit::all(),
                'pendapatan' => Pendapatan::all(),
                'totalNominal' => Deposit::sum('nominalPendapatan'),
            ]);
        }else{
            return view('keuanganBph.viewDeposit',[
                'title' => 'Deposit',
                'deposit' => Deposit::all(),
                'pendapatan' => Pendapatan::all(),
                'totalNominal' => Deposit::sum('nominalPendapatan'),
            ]);
        }
    }

    public function simpanDeposit(Request $request){
        $data = [
            'pendapatan_id' => $request->pendapatan_id,
            'nominalPendapatan' => $request->nominal,
            'catatan' => $request->catatan,
            'tglDeposit' => $request->tglDeposit,
            'user_id' => auth()->user()->id
        ];
        Deposit::create($data);
        return redirect()->back()->withToastSuccess('Data Pendapatan Berhasil di Tambahkan');
    }

    public function hapusDeposit($id){
        Deposit::where('id',$id)->delete();
        return redirect()->back()->withToastSuccess('Deposit Berhasil Dihapus');
    }
}
