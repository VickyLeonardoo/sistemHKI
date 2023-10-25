@extends('partial.header')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="/tambah-data-kartu-keluarga" class="btn btn-primary">Tambah Data KK</a><br><br>
                    </div>
                    <div class="table-responsive p-0">
                        <table id="tableKk" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor KK</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Wijk</th>
                                    <th>Status Rumah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                @foreach ($kk as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nomorKk }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->kelurahan }}</td>
                                        <td>{{ $data->kecamatan }}</td>
                                        <td>{{ $data->wijk->nama }}</td>
                                        <td>{{ $data->statusRumah }}</td>
                                        <td>
                                            <a href="/kartu-keluarga-edit-{{ $data->nomorKk }}"
                                                class="btn btn-primary">Edit</a>
                                            {{-- <a href="/anggota-keluarga-{{ $data->id }}" class="btn btn-info">Anggota Keluarga</a> --}}
                                            <a href="/anggota-kartu-keluarga-{{ $data->nomorKk }}"
                                                class="btn btn-info">Anggota Keluarga</a>
                                            <a href="{{ Route('hapus-data-kk', $data->id) }}"
                                                onclick="return confirm('Yakin ingin menhapus Data?')"
                                                class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Alamat</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>Wijk</th>
                                    <th>Status Rumah</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endsection
