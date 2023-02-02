<table border="1" style="border-collapse: collapse;">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Status</th>
        <th>Tanggal Bertugas</th>
    </tr>
    </thead>
    <tbody>
        <?php $i =1 ?>
    @foreach($pendeta as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->tempatLahir }}</td>
            <td>{{ $data->tglLahir }}</td>
            <td>{{ $data->status }}</td>
            <td>{{ $data->tglMasuk }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
