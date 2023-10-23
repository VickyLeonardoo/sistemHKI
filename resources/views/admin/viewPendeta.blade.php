@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                    <a href="/tambah-data-pendeta" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a><br><br>
                </div>
                <div class="table-responsive p-0">
                    <table id="viewPendeta" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Status</th>
                                <th>Tahun Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendeta as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tglLahir)->isoFormat('D MMMM Y')}}</td>
                                <td>{{ $data->status}}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tglMasuk)->isoFormat('D MMMM Y')}}</td>
                                <td>
                                    <a href="edit-data-{{$data->slug}}" class="btn btn-info">Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{ $data->id }}">
                                        <i class="fas fa-trash"></i>
                                      </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

@include('modal.modalPendeta')

@endsection
