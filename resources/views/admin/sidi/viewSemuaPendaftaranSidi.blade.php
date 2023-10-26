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
                                    <th>Tahun Sidi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                @foreach ($pendaftar as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->tahunSidi }}</td>
                                        <td>
                                            <a href="/data-pelajar-sidi-tahun-{{ $data->tahunSidi }}" class="btn btn-info">Periksa</a>
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
