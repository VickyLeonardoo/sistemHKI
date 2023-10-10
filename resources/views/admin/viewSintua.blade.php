@extends('partial.header')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="/tambah-data-sintua" class="btn btn-primary">Tambah</a><br><br>
                    </div>
                    <div class="table-responsive p-0">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Wijk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                @foreach ($sintuas as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->wijk->nama }}</td>
                                        <td>
                                            {{-- <a href="ubah-data-wijk-{{ $data->id }}" class="btn btn-primary"></a> --}}
                                            <!-- Button trigger modal -->

                                            <a href="/data-sintua-{{ $data->slug }}" class="btn btn-primary">Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#modal-danger{{ $data->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Wijk</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($sintuas as $data)
        <div class="modal fade" id="modal-danger{{ $data->id }}">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="/hapus-data-{{ $data->id }}">
                        @csrf
                        <div class="modal-body">
                            <p>ingin Menghapus Sintua {{ $data->nama }}, Dari Wijk {{ $data->wijk->nama }} ?</p>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-outline-light" value="Hapus"></input>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach
@endsection
