<table border="1" style="border-collapse: collapse;">
    <thead>
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
