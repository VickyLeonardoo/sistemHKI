@extends('partial.header')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive p-0">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>NIK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                @foreach ($pendaftar as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->nik }}</td>
                                        <td><a href="/validasi-pendaftar-sidi-{{ $data->nik }}" class="btn btn-primary">Validasi</a>
                                            <a href="/konfirmasi-pendaftaran-sidi-{{ $data->nik }}" class="btn btn-success">Konfirmasi</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nomor</th>
                                    <th>NIK</th>
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
