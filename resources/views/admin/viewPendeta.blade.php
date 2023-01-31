@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <a href="/tambah-data-pendeta" class="btn btn-info">Tambah Pendeta</a>
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Status</th>
                            <th>Tahun Masuk</th>
                            <th>Foto</th>
                            <th>Aksi</th>
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
                            <td>
                                <a href="edit-data-pendeta-{{$data->id}}" class="btn btn-info">Edit</a>
                            </td>
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
@endsection
