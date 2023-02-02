<table border="1" style="border-collapse: collapse;">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nomor KK</th>
        <th>Alamat</th>
        <th>Kecamatan</th>
        <th>Kelurahan</th>
        <th>Status Rumah</th>
    </tr>
    </thead>
    <tbody>
        <?php $i =1 ?>
    @foreach($kk as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->nomorKk }}</td>
            <td>{{ $data->alamat }}</td>
            <td>{{ $data->kecamatan }}</td>
            <td>{{ $data->kelurahan }}</td>
            <td>{{ $data->statusRumah }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
