@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="row">
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
                <div class="form-group d-flex justify-content-end">
                </div>
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
                <div class="form-group d-flex justify-content-end">
                </div>
            </div>
        </div>

        <a href="/tambah-data-kartu-keluarga" class="btn btn-info">Tambah Data KK</a>
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor KK</th>
                            <th>Nama</th>
                            <th>Wijk</th>
                            <th>Status Rumah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php $i = 1 ?>
                    <tbody>
                            <tr>
                                <td>{{ $kk->nomorKk }}</td>
                                <td>{{ $kk->alamat }}</td>
                                <td>{{ $kk->wijk->nama }}</td>
                                <td>{{ $kk->statusRumah }}</td>
                                <td>
                                    <a href="/edit-data-kk-{{ $kk->id }}" class="btn btn-primary">Edit</a>
                                    <a href="/anggota-keluarga-{{ $kk->id }}" class="btn btn-info">Anggota Keluarga</a>

                                </td>
                            </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Wijk</th>
                            <th>Status Rumah</th>
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
