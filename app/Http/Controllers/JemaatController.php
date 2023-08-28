<?php

namespace App\Http\Controllers;

use App\Url;
use App\Models\Kk;
use Carbon\Carbon;
use App\Models\Jemaat;
use App\Models\Sintua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class JemaatController extends Controller
{
    public function index(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.viewDataJemaat',[
                "title" => "Data Jemaat",
                "jemaat" => Jemaat::all(),
                'sintua' => Sintua::first(),

            ]);
        }else{
            return view('bph.viewDataJemaat',[
                "title" => "Data Jemaat",
                "jemaat" => Jemaat::all(),
                'sintua' => Sintua::first(),

            ]);
        }

    }

    public function viewTambah($id){
        return view('admin.viewTambahAnggotaKk',[
            "title" => "Tambah Anggota KK",
            "kk" => KK::where('id',$id)->first(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function simpanJemaat(Request $request, $id){
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tempatLahir' => 'required',
            'tglLahir' => 'required',
            'jenisKelamin' => 'required',
            'pekerjaan' => 'required',
            'statusKeluarga' => 'required',
            'noHp' => 'required',
            'sidi' => 'required',
        ],[
            'nik.required' => 'NIK Wajib Diisi',
            'nama.required' => 'Nama Wajib Diisi',
            'tempatLahir.required' => 'Tempat LahirWajib Diisi',
            'tglLahir.required' => 'Tanggal Lahir Wajib Diisi',
            'jenisKelamin.required' => 'Jenis Kelamin Wajib Diisi',
            'pekerjaan.required' => 'PekerjaanWajib Diisi',
            'statusKeluarga.required' => 'Status Wajib Diisi',
            'noHp.required' => 'Nomor HP Wajib Diisi',
            'sidi.required' => 'Sidi Wajib Diisi',
        ]);
        $noKk = Kk::where('id',$id)->first();
        $getKk = $noKk->nomorKk;

        $image = null;

        if($files = $request->file('image')){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($files->GetClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'fotoJemaat/';
                $image_url = $upload_path.$image_full_name;
                $files->move($upload_path, $image_full_name);
                $image = $image_url;
        }
        $data = [
            'kk_id' => $id,
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'tempatLahir' => Request()->tempatLahir,
            'tglLahir' => Request()->tglLahir,
            'jenisKelamin' => Request()->jk,
            'golDarah' => Request()->golDar,
            'pekerjaan' => Request()->pekerjaan,
            'statusKeluarga' => Request()->statusKeluarga,
            'nomorHp' => Request()->noHp,
            'sidi' => Request()->sidi,
            'foto' => $image,
        ];

        Jemaat::create($data);
        return redirect('/anggota-kartu-keluarga-'.$getKk)->withToastSuccess('Anggota Keluarga Berhasil Ditambahkan!');
    }

    public function viewEdit(Request $request, $idk, $id){
        return view('admin.viewEditAnggota',[
            "title" => "Edit Anggota Keluarga",
            "id" => $id,
            "jemaat" => Jemaat::where('id', $idk)->first(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function ubahJemaat($id,$idk, Request $request){
        $data = [
                    'nik' => Request()->nik,
                    'nama' => Request()->nama,
                    'tempatLahir' => Request()->tempatLahir,
                    'tglLahir' => Request()->tglLahir,
                    'jenisKelamin' => Request()->jk,
                    'golDarah' => Request()->golDar,
                    'pekerjaan' => Request()->pekerjaan,
                    'statusKeluarga' => Request()->statusKeluarga,
                    'nomorHp' => Request()->noHp,
                    'sidi' => Request()->sidi,
                    'is_alive' => Request()->status,
        ];
        Jemaat::where('id',$id)->update($data);
        return redirect()->back()->withToastSuccess('Sukses Ubah Data');
        // return Redirect('/anggota-keluarga-'.$idk)->withToastSuccess('Anggota Keluarga'. ' ' .Request()->nama . ' ' .'Berhasil Diubah');
    }

    public function viewUltah(){
        $now = Carbon::now();

        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d');


        return view('admin.viewJemaatUltah',[
            'title' => "Ulang Tahun Jemaat",
            'jemaat' => Jemaat::whereRaw("MONTH(tglLahir) = MONTH(CURDATE())")
            ->whereRaw("DAY(tglLahir) BETWEEN DAY('$weekStartDate') AND DAY('$weekEndDate')")
            ->get(),
            'sintua' => Sintua::first(),
        ]);
    }
}
