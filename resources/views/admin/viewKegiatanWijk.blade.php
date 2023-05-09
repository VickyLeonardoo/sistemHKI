@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"><br><br> --}}
                <div class="col-md-12">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-danger">Tambah Data</button><br><br>
                <div class="table-responsive p-0">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tanggal Kegiatan</th>
                                <th>Alamat Kegiatan</th>
                                <th>Sintua Bertugas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $data)
                            <tr>
                                <td>{{ date('d-F-Y', strtotime($data->tglKegiatan)) }}</td>
                                <td>{{ $data->wijk->nama }}</td>
                                <td>{{ $data->sintua->nama }}</td>
                                <td>
                                    <a href="data-kehadiran-tanggal-{{$data->tglKegiatan }}/wijk-{{ $data->wijk->slug }}" class="btn btn-primary"><i class="fas fa-info"></i></a>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-ubah{{ $data->id }}"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus{{ $data->id }}"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tanggal Kegiatan</th>
                                <th>Alamat Kegiatan</th>
                                <th>Sintua Bertugas</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="/tambah-data-kegiatan">
            @csrf
            <input type="hidden" value="{{ $wijk_id }}" name="wijk">
            <div class="form-group">
                <label for="exampleFormControlInput2">Tanggal Kegiatan</label>
                <input type="text" name="tglKegiatan" class="form-control form-control-alternative" placeholder="Masukkan Tanggal Kegiatan"
                 onfocus="(this.type='date')"
                 onblur="(this.type='text')">
            </div>
            <div class="form-group">
                <label for="">Alamat Kegiatan</label>
                <select name="kk" id="select-state" placeholder="Pilih Alamat...">
                    <option value="">Pilih Alamat...</option>
                    @foreach ($kk as $kks)
                        <option value="{{ $kks->id }}">{{ $kks->alamat }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label for="">Sintua Bertugas</label>
                <select name="sintua" id="select-state" placeholder="Pilih Sintua...">
                    <option value="">Pilih Sintua...</option>
                    @foreach ($sintua as $sintuas)
                        <option value="{{ $sintuas->id }}">{{ $sintuas->nama }}</option>
                    @endforeach
                  </select>
            </div>
        </div>

        <div class="modal-footer ">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" value="Simpan"></input>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>\

{{-- Modal Ubah --}}
@foreach ($kegiatan as $data)
<div class="modal fade" id="modal-ubah{{ $data->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="/ubah-data-kegiatan-{{ $data->id }}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput2">Tanggal Kegiatan</label>
                <input type="text" name="tglKegiatan" class="form-control form-control-alternative" placeholder="Masukkan Tanggal Kegiatan"
                 onfocus="(this.type='date')"
                 onblur="(this.type='text')">
            </div>
            <div class="form-group">
                <label for="">Alamat Kegiatan</label>
                <select name="kk" id="select-state" placeholder="Pilih Alamat...">
                    <option value="">Pilih Alamat...</option>
                    @foreach ($kk as $kks)
                        <option value="{{ $kks->id }}">{{ $kks->alamat }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group">
                <label for="">Sintua Bertugas</label>
                <select name="sintua" id="select-state" placeholder="Pilih Sintua...">
                    <option value="">Pilih Sintua...</option>
                    @foreach ($sintua as $sintuas)
                        <option value="{{ $sintuas->id }}">{{ $sintuas->nama }}</option>
                    @endforeach
                  </select>
            </div>
        </div>

        <div class="modal-footer ">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-success" value="Simpan"></input>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

{{-- Modal Hapus --}}
@foreach ($kegiatan as $data)
<div class="modal fade" id="modal-hapus{{ $data->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="/hapus-kegiatan-kegiatan-{{ $data->id }}">
            @csrf
           <p>Apakah Kamu yakin ingin menghapus Data?</p>
        </div>

        <div class="modal-footer ">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-danger" value="Hapus"></input>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

@endsection
