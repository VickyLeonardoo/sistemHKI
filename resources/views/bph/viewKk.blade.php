@extends('bph.partials.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive p-0">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor KK</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Wijk</th>
                                <th>Status Rumah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            @foreach ($kk as $data)
                                <tr>
                                    <td>{{ $data->nomorKk }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>{{ $data->kelurahan }}</td>
                                    <td>{{ $data->kecamatan }}</td>
                                    <td>{{ $data->wijk->nama }}</td>
                                    <td>{{ $data->statusRumah }}</td>
                                    <td>
                                        <a href="/bph/anggota-kartu-keluarga-{{ $data->nomorKk }}" class="btn btn-info">Anggota Keluarga</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>Kecamatan</th>
                                <th>Wijk</th>
                                <th>Status Rumah</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
