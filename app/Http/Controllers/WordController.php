<?php

namespace App\Http\Controllers;

use App\Models\Jemaat;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Shared\ZipArchive;
use Carbon\Carbon;
use App\Models\Kk;
use PDF;
use App\Models\Surat;
use Response;
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
            return 'skkematian';
        }else{
            return 'skpindah';
        }
    }


    public function wordPindahKeluarga(Request $request){
        $idKk = Request()->nomorKk;
        $jemaatKk = Jemaat::where('kk_id', $idKk)->orderBy('statusKeluarga','desc')->get();

        $headers = array(
            'Content-Disposition' => 'attatchement;Filename=mydoc.pdf'
        );

        // view()->share('admin.cetakSkPindah',[
        //     'title' => 'Cetak',
        //     'jemaat' => $jemaatKk,
        // ]);

        $data = [
            'title' => 'Cetak',
            'jemaat' => $jemaatKk,
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
