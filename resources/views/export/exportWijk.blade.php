<table border="1" style="border-collapse: collapse;">
    <thead>
    <tr>
        <th>Nomor</th>
        <th>Nama Wijk</th>
    </tr>
    </thead>
    <tbody>
        <?php $i =1 ?>
    @foreach($wijk as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->nama }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
