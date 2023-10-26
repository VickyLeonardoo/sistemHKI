@extends('bph.partials.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <a href="/bph/tambah-data-master-pengeluaran" class="btn btn-info">Tambah Data</a>
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Pengeluaran</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php $i = 1 ?>
                    <tbody>
                        @foreach ($pengeluaran as $data)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>
                                <a href="{{ route('bph.edit.master.pengeluaran',$data->slug) }}" class="btn btn-warning">Edit</a>
                                <a href="/bph/hapus-pengeluaran-{{ $data->id }}" onclick="return confirm('Kamu Yakin Ingin Menghapus Data {{ $data->nama }}?');" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Pendapatn</th>
                            <th>Nama</th>
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
