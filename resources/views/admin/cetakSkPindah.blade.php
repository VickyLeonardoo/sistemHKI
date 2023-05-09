<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
                <h1 style="text-align: center; font-family: Cambria; color: blue;">HURIA KRISTEN INDONESIA</h1>
                <h2 style="text-align: center; font-family: Cambria; color: blue; margin-top: -3%;">RESORT KHUSUS MANGSANG</h2>
                <h2 style="text-align: center; font-family: Cambria; color: blue; margin-top: -3%;">DAERAH X KEPULAUAN RIAU</h2>
                <h4 style="text-align: center; font-family: Cambria; color: blue; margin-top: -1%;">Alamat: Mangsang Permai Tanjung Piayu, Kec. Sei Beduk, Kota Batam, Kepulauan Riau 29433</h5>
        </div>

        <hr color="black">
    </header>
    <p align="center" style="margin-bottom: -2%;">
        <strong><u>SURAT KETERANGAN PINDAH KEANGGOTAAN</u></strong>
    </p>
    <p align="center" >
        <strong>No. 001/SKP/HKI/2023</strong>
    </p>
    <p>
        <strong></strong>
    </p>
    <p style="margin-bottom: -2%">
        Kepada Yth:
    </p>
    <p style="margin-bottom: -2%;">
        Pimpinan Jemaat HKBP Batam
    </p>
    <p style="margin-bottom: -2%;">
        Resort Batam
    </p>
    <p>
        Di:
    </p>
    <p style="margin-left: 4%;">
        Batam
    </p>
    <p style="margin-bottom: -2%;">
        Yang bertanda tangan di bawah ini :
    </p>
    <p style="margin-bottom: -2%;">
        Uluan Jemaat HKI Resort Mangsang Resort Mangsang
    </p>
    <p>
        <br/>
        Menerangkan Bahwa:
    </p>
    <table align="center" border="1" cellspacing="0" cellpadding="0" width="623">
        <tbody>
           <tr>
            <td rowspan="2" style="text-align: center;">NO</td>
            <td rowspan="2" style="text-align: center;">NAMA</td>
            <td rowspan="2" style="text-align: center;">L/P</td>
            <td colspan="2" style="text-align: center;">TEMPAT DAN TANGGAL LAHIR</td>
            <td rowspan="2" style="text-align: center;">STATUS</td>

           </tr>
           <tr>
            <td style="text-align: center;">TEMPAT</td>
            <td style="text-align: center;">TANGGAL</td>
           </tr>
           <?php $i = 1 ?>
           @foreach ($jemaat as $data)
           <tr>
            <td style="text-align: center">{{ $i++ }}</td>
            <td>{{ $data->nama }}</td>
            @if ($data->jenisKelamin == 'Pria')
            <td style="text-align: center">L</td>
            @else
            <td style="text-align: center">P</td>
            @endif
            <td style="text-align: center">{{ $data->tempatLahir }}</td>
            <td style="text-align: center">{{ $data->tglLahir }}</td>
            <td>{{ $data->statusKeluarga }}</td>
           </tr>
           @endforeach
           <tr style="text-align: center">
           </tr>
        </tbody>
    </table>
    <p>
        Alamat: Bengkong Telaga Indah Blk F/19
    </p>
    <p>
        Adalah benar terdaftar sebagai anggota jemaat di Gereja HKI Resort Mangsang
        Resort Mangsang dan ingin pindah keanggotaan jemaat ke HKBP Batam Resort
        Batam
    </p>

    <p>
        Demikian surat keterangan ini dibuat untuk dapat digunakan pindah
        kanggotaan jemaat.
    </p>
    <br>
    <p>
        HKI Batam, 27 Maret 2023
    </p>
    <p><br><br><br>
        Uluan HKI Batam
    </p>
    <p>
        <u>St. M. Sitinjak</u>
    </p>
</body>
</html>
