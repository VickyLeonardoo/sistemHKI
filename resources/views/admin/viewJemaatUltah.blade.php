@extends('partial.header')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table id="tableUltah" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>TGL Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status</th>
                                        <th>Gol Darah</th>
                                        <th>Pekerjaan</th>
                                        <th>Nomor HP</th>
                                        <th>Sidi</th>
                                        <th>Umur</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tbody>
                                    @foreach ($jemaat as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->tempatLahir }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->tglLahir)->isoFormat('D MMMM Y')}}</td>
                                            <td>{{ $data->jenisKelamin }}</td>
                                            <td>{{ $data->statusKeluarga }}</td>
                                            <td>{{ $data->golDarah }}</td>
                                            <td>{{ $data->pekerjaan }}</td>
                                            <td>{{ $data->nomorHp }}</td>
                                            <td>{{ $data->sidi }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->tglLahir)->age}}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Tempat Lahir</th>
                                        <th>TGL Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Gol Darah</th>
                                        <th>Pekerjaan</th>
                                        <th>Status</th>
                                        <th>Nomor HP</th>
                                        <th>Sidi</th>
                                        <th>Umur</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
@endsection
