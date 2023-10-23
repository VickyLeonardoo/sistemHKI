@extends('bph.partials.header')
@section('content')
<div class="content">
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-md-12">
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>TGL Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Status</th>
                                <th>Pekerjaan</th>
                                <th>Nomor HP</th>
                                <th>Sidi</th>
                                {{-- <th>Foto</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            @foreach ($jemaat as $data)
                            <tr>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->tempatLahir}}</td>
                                <td>{{ $data->tglLahir }}</td>
                                <td>{{ $data->jenisKelamin }}</td>
                                <td>{{ $data->statusKeluarga }}</td>
                                <td>{{ $data->pekerjaan }}</td>
                                <td>{{ $data->nomorHp }}</td>
                                <td>{{ $data->sidi }}</td>
                                <td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>TGL Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Pekerjaan</th>
                                <th>Status</th>
                                <th>Nomor HP</th>
                                <th>Sidi</th>
                                {{-- <th>Foto</th> --}}
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>



  <!-- Modal -->


@endsection
