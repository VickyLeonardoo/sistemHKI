@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <a href="/tambah-data-pendeta" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a><br><br>
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
                                    <a href="edit-data-{{$data->slug}}" class="btn btn-info">Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{ $data->id }}">
                                        <i class="fas fa-trash"></i>
                                      </button>
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

@include('modal.modalPendeta')

@endsection
