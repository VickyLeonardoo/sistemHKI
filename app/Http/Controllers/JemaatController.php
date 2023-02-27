<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kk;
use App\Models\Jemaat;
use App\Url;
use Carbon\Carbon;
use App\Models\Sintua;
class JemaatController extends Controller
{
    public function index(){
        return view('admin.viewDataJemaat',[
            "title" => "Data Jemaat",
            "jemaat" => Jemaat::all(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function viewTambah($id){
        return view('admin.viewTambahAnggotaKk',[
            "title" => "Tambah Anggota KK",
            "kk" => KK::where('id',$id)->first(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function simpanJemaat(Request $request, $id){

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
        return redirect('/anggota-keluarga-'.$id)->withToastSuccess('Anggota Keluarga Berhasil Ditambahkan!');
    }

    public function viewEdit(Request $request, $idk, $id){
        return view('admin.viewEditAnggota',[
            "title" => "Edit Anggota Keluarga",
            "id" => $id,
            "jemaat" => Jemaat::where('id', $idk)->first(),
            'sintua' => Sintua::first(),

        ]);
    }

    public function ubahJemaat($idk,$id, Request $request){
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
        ];
        Jemaat::where('id',$idk)->update($data);
        return Redirect('/anggota-keluarga-'.$id)->withToastSuccess('Anggota Keluarga'. ' ' .Request()->nama . ' ' .'Berhasil Diubah');
    }

    public function viewUltah(){
        $now = Carbon::now();

        $weekstart = $now->startOfWeek()->format('d-M-y');
        $weekend = $now->endOfWeek()->format('d-M-y');

        $weekStartDate = $now->startOfWeek();
        $weekEndDate = $now->endOfWeek();


        return view('admin.viewJemaatUltah',[
            'title' => "Ulang Tahun Jemaat",
            'jemaat' => Jemaat::whereMonth('tglLahir', $weekStartDate->month)->whereDay('tglLahir', '<-', $weekEndDate->day)
                         ->orWhere(function ($query) use ($weekStartDate,$weekEndDate) {
                         $query->whereMonth('tglLahir', '=', $weekStartDate->month)
                         ->whereDay('tglLahir', '<=', $weekEndDate->day);
                         })->get(),
            'sintua' => Sintua::first(),

        ]);
    }




}
