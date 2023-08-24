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
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Status</th>
                                <th>Tahun Masuk</th>
                                <th>Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendeta as $data)
                            <tr>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->tglLahir}}</td>
                                <td>{{ $data->status}}</td>
                                <td>{{ $data->tglMasuk}}</td>
                                <td>{{ $data->foto}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Status</th>
                                <th>Tahun Masuk</th>
                                <th>Foto</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
