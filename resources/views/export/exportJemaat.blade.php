<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            font-family: sans-serif;
            background-color: white;
        }
        .company{
            font-size: 15px;
            margin-left: 17px;
            margin-top: 25px;
            margin-bottom: 25px;
            font-weight: bold;
        }
        .name{
            text-align: center;
            margin-bottom:25px;
            font-size: 18px;
            font-weight: bold;
        }

        .period{
            margin-left: 17px;
        }

        .table-all{
            border: 1px;
            margin: 20px auto;
            border-collapse: collapse;
            margin-top: 50px;
        }

        .tablehead{
            font-size: 12px;
        height:20px;
            width: 100px;
            border: 1px solid #3c3c3c;
            padding: 1px 8px;
        }
        table td{
            font-size: 13px;
            height:30px;
            border: 0px solid #3c3c3c;
            padding: 2px 8px;

        }
        a{
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
        caption{
            font-size: 15px;
            font-weight: bold;
            text-align: left;
            margin-bottom: 17px;
        }
        </style>
</head>
<body>
    <table class="table-all">
        <thead>
            <tr>
                <th colspan="9">Data Jemaat Gereja</th>
            </tr>
        <tr>
            <th>Nik</th>
            <th>Nama</th>
            <th>Tempat</th>
            <td>Tanggal Lahir</td>
            <td>Jenis Kelamin</td>
            <td>Golongan Darah</td>
            <td>Pekerjaan</td>
            <td>Status</td>
            <td>Nomor HP</td>

        </tr>
        </thead>
        <tbody>
        @foreach($jemaat as $data)
            <tr>
                <td>{{ $data->nik }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->tempatLahir }}</td>
                <td>{{ $data->tglLahir }}</td>
                <td>{{ $data->jenisKelamin }}</td>
                <td>{{ $data->golDarah }}</td>
                <td>{{ $data->pekerjaan }}</td>
                <td>{{ $data->statusKeluarga }}</td>
                <td>{{ $data->nomorHp }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>

