<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Kk;
use Carbon\Carbon;
use App\Models\Surat;
use App\Models\Jemaat;
use PDF;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Shared\ZipArchive;
class WordController extends Controller
{
    public function wordJemaat(Request $request){


        if (Request()->jenissk == 'skjemaat') {
            $id = Request()->nama;
            $select = Jemaat::where('id',$id)->first();
            $data = [
                'jemaat_id' => $id,
                'jenisSk' => 'Surat Jemaat',
            ];
            $wijk = $select->kk->wijk->nama;
            $nama = $select->nama;
            $tempatLahir = $select->tempatLahir;
            $tglLahir = date('d-m-Y', strtotime($select->tglLahir));
            $alamat = $select->kk->alamat;
            $jk = $select->jenisKelamin;
            $currentTime = Carbon::now();
            $currentTimes = date('d-m-Y', strtotime($currentTime));
            $year = $currentTime->format('Y');
            $keperluan = Request()->keperluan;
            $surat = Surat::create($data);

            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('skJemaats.docx');

            $phpWord->setValues([
                'id' => $surat->id,
                'tglSekarang' => $currentTimes,
                'tahun' => $year,
                'nama' => $nama,
                'wijk' => $wijk,
                'tempatLahir' => $tempatLahir,
                'tglLahir' => $tglLahir,
                'alamat' => $alamat,
                'jenisKelamin' => $jk,
                'keperluan' => $keperluan,
            ]);

            // Saving the document as Docx file...
            $phpWord->saveAs('tmp/SKJemaat'.' '.$nama.'.docx');
            $file = 'tmp/SKJemaat'.' '.$nama.'.docx';
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }
        return redirect()->back();
        }elseif(Request()->jenissk == 'sknikah'){
            $idPria = Request()->pria;
            $idWanita = Request()->wanita;
            $tglPernikahan = Request()->tglPernikahan;
            $selectPria = Jemaat::where('id',$idPria)->first();
            $selectWanita = Jemaat::where('id',$idWanita)->first();
            $arr = [$idPria,$idWanita];

            $data = [
                'jemaat_id' => $idPria,
                'jenisSk' => 'Surat Pernikahan',
            ];

            $pria = $selectPria->nama;
            $wanita = $selectWanita->nama;

            $tempatLahirPria = $selectPria->tempatLahir;
            $tempatLahirWanita = $selectWanita->tempatLahir;

            $tglLahirPria = date('d-m-Y', strtotime($selectPria->tglLahir));
            $tglLahirWanita = date('d-m-Y', strtotime($selectWanita->tglLahir));

            $currentTime = Carbon::now();
            $currentTimes = date('d-m-Y', strtotime($currentTime));
            $year = $currentTime->format('Y');
            $keperluan = Request()->keperluan;
            $surat = Surat::create($data);
            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('skPernikahan.docx');

            $phpWord->setValues([
                'id' => $surat->id,
                'tglSekarang' => $currentTimes,
                'tahun' => $year,
                'pria' => $pria,
                'wanita' => $wanita,
                'tempatPria' => $tempatLahirPria,
                'tempatWanita' => $tempatLahirWanita,
                'tglLahirPria' => $tglLahirPria,
                'tglLahirWanita' => $tglLahirWanita,
                'keperluan' => $keperluan,
                'tglPernikahan' =>  date('d-m-Y', strtotime($tglPernikahan)),
            ]);

            // Saving the document as Docx file...
            $phpWord->saveAs('tmp/SKNikah'.' '.$pria.'.docx');
            $file = 'tmp/SKNikah'.' '.$pria.'.docx';
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }
        return redirect()->back();
        }elseif(Request()->jenissk == 'skkematian'){
            $id = Request()->nama;
            $select = Jemaat::where('id',$id)->first();
            $data = [
                'jemaat_id' => $id,
                'jenisSk' => 'Surat Jemaat',
            ];

            $wijk = $select->kk->wijk->nama;
            $nama = $select->nama;
            $tempatLahir = $select->tempatLahir;
            $tglLahir = date('d-m-Y', strtotime($select->tglLahir));
            $tglLahir = Carbon::parse($tglLahir);
            $tglLahir = $tglLahir->isoFormat('D MMMM Y');
            $alamat = $select->kk->alamat;
            $jk = $select->jenisKelamin;
            $currentTime = Carbon::now();
            $currentTimes = date('d-m-Y', strtotime($currentTime));
            $year = $currentTime->format('Y');
            $keperluan = Request()->keperluan;
            $surat = Surat::create($data);
            $tglMeninggal = Request()->tglMeninggal;
            $tglMeninggal = Carbon::parse($tglMeninggal);
            $tglMeninggal = $tglMeninggal->isoFormat('dddd, D MMMM Y');

            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('skKematian.docx');

            $phpWord->setValues([
                'id' => $surat->id,
                'tglSekarang' => $currentTimes,
                'tahun' => $year,
                'nama' => $nama,
                'wijk' => $wijk,
                'tempatLahir' => $tempatLahir,
                'tglLahir' => $tglLahir,
                'alamat' => $alamat,
                'jenisKelamin' => $jk,
                'keperluan' => $keperluan,
                'tglMeninggal' => $tglMeninggal,
            ]);
            $phpWord->saveAs('tmp/SKKematian'.' '.$nama.'.docx');
            $file = 'tmp/SKKematian'.' '.$nama.'.docx';
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }
        }else{
            $id = Request()->nama;
            $select = Jemaat::where('id',$id)->first();
            $data = [
                'jemaat_id' => $id,
                'jenisSk' => 'Surat Pindah',
            ];
            $wijk = $select->kk->wijk->nama;
            $nama = $select->nama;
            $tempatLahir = $select->tempatLahir;
            $tglLahir = date('d-m-Y', strtotime($select->tglLahir));
            $tglLahir = Carbon::parse($tglLahir);
            $tglLahir = $tglLahir->isoFormat('D MMMM Y');
            $alamat = $select->kk->alamat;
            $jk = $select->jenisKelamin;
            $currentTime = Carbon::now();
            $currentTimes = date('d-m-Y', strtotime($currentTime));
            $year = $currentTime->format('Y');
            $surat = Surat::create($data);
            $keperluan = NULL;
            if ($request->gerejaTujuan) {
                $keperluan = Request()->gerejaTujuan;
            }else{
                $keperluan = 'lain';
            }

            $phpWord = new \PhpOffice\PhpWord\TemplateProcessor('skPindahPerorang.docx');

            $phpWord->setValues([
                'id' => $surat->id,
                'tglSekarang' => $currentTimes,
                'tahun' => $year,
                'nama' => $nama,
                'wijk' => $wijk,
                'tempatLahir' => $tempatLahir,
                'tglLahir' => $tglLahir,
                'alamat' => $alamat,
                'jenisKelamin' => $jk,
                'keperluan' => $keperluan,
            ]);

            // Saving the document as Docx file...
            $phpWord->saveAs('tmp/SKPindah'.' '.$nama.'.docx');
            $file = 'tmp/SKPindah'.' '.$nama.'.docx';
            if (file_exists($file)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                readfile($file);
                exit;
            }
        }
    }


    public function wordPindahKeluarga(Request $request){
        $request->validate([
            'nomorKk' => 'required'
        ],[
            'nomorKk.required' => 'Nomor Kk Wajib Diisi'
        ]);
        $idKk = Request()->nomorKk;
        $jemaatKk = Jemaat::where('kk_id', $idKk)->orderBy('statusKeluarga','desc')->get();
        $gerejaTujuan = Request()->gerejaTujuan;
        $currentTime = Carbon::now();
        $year = $currentTime->format('Y');
        $headers = array(
            'Content-Disposition' => 'attatchement;Filename=mydoc.pdf'
        );

        // view()->share('admin.cetakSkPindah',[
        //     'title' => 'Cetak',
        //     'jemaat' => $jemaatKk,
        // ]);
        $surat = Surat::create([
            'jemaat_id' => $jemaatKk[0]->id,
            'jenisSk' => 'Surat Pindah Keluarga',
        ]);

        $data = [
            'title' => 'Cetak',
            'jemaat' => $jemaatKk,
            'tujuan' => $gerejaTujuan,
            'id' => $surat->id,
            'tahun' => $year,
        ];

        $pdf = PDF::loadView('admin.cetakSkPindah',$data);
        return $pdf->download('pdf_file.pdf');

        return view('admin.cetakSkPindah',[
            'title' => 'Cetak',
            'jemaat' => $jemaatKk,
        ]);
        return $jemaatKk;
        $selectKk = Kk::where('id',$idKk)->first();



    }


}
