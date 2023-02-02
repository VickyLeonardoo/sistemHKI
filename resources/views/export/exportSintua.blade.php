<table border="1" style="border-collapse: collapse;">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama</th>
        <th>Wijk</th>
    </tr>
    </thead>
    <tbody>
        <?php $i =1 ?>
    @foreach($sintua as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->wijk->nama }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
