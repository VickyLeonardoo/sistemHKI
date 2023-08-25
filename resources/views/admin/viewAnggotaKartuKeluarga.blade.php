@extends('partial.header')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        {{-- <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <h6>Nomor KK: {{ $kk->nomorKk }}</h6>
              </div>
              <hr color="black">
            </div>
            <div class="col-md-4">
                <div class="form-group d-flex justify-content-end">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <h6>Alamat Lengkap: {{ $kk->alamat }}</h6>
              </div>
              <hr color="black">
            </div>
            <div class="col-md-4">
                <div class="form-group ">
                    <h6 class="d-flex ">Kelurahan: {{ $kk->kelurahan }}</h6>
                </div>
                <hr color="black">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <h6>Wijk: {{ $kk->wijk->nama }}</h6>
              </div>
              <hr color="black">
            </div>
            <div class="col-md-4">
                <h6 class="form-group">Kecamatan: {{ $kk->kecamatan }}</h6>
            <hr color="black">
            </div>
        </div> --}}

        <a href="/tambah-data-anggota-kartu-keluarga-{{ $kk->id }}" class="btn btn-info">Tambah Data KK</a><br><br>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table id="viewAnggotaKk" class="display responsive nowrap" width="100%">
                    <thead>
                        <tr>
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
                            <td>{{ \Carbon\Carbon::parse($data->tglLahir)->isoFormat('D MMMM Y') }}</td>
                            <td>{{ $data->jenisKelamin }}</td>
                            <td>{{ $data->statusKeluarga }}</td>
                            <td>{{ $data->golDarah }}</td>
                            <td>{{ $data->pekerjaan }}</td>
                            <td>{{ $data->nomorHp }}</td>
                            <td>{{ $data->sidi }}</td>
                            {{-- <td>  <img src="{{ asset($data->foto) }}" alt=""  width="100%" height="60px" title=""></a></td> --}}
                            {{-- <td><img src="{{ url::to($data->foto) }}" height="30px" width="30px"></td> --}}
                            <td>
                                <a href="/edit-anggota-keluarga-{{ $data->id }}-kk-{{ $kk->id }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="/hapus-anggota-keluarga-{{ $data->id }}-kk-{{ $kk->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>

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
                            <th>Gol Darah</th>
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


  <!-- Modal -->


@endsection
