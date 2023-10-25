@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-danger">Tambah Data</button><br><br>
                <div class="table-responsive p-0">
                    <table id="example" class="display" width="100%">
                        <thead>
                            <tr>
                                <th>Pria Dewasa</th>
                                <th>Wanita Dewasa</th>
                                <th>Remaja</th>
                                <th>Anak</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kehadiran as $data)
                            <tr>
                                <td>{{ $data->priaDewasa }}</td>
                                <td>{{ $data->wanitaDewasa }}</td>
                                <td>{{ $data->remaja }}</td>
                                <td>{{ $data->anak }}</td>
                                <td>{{ $data->priaDewasa + $data->wanitaDewasa + $data->remaja + $data->anak }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Pria Dewasa</th>
                                <th>Wanita Dewasa</th>
                                <th>Remaja</th>
                                <th>Anak</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
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
        <form method="POST" action="/tambah-data-kehadiran">
            @csrf
            <input type="hidden" value="{{ $id }}" name="kegiatan">
            <div class="form-group">
                <label for="">Pria Dewasa</label>
                <input type="text" class="form-control form-control-alternative" value="" name="pria">
            </div>
            <div class="form-group">
                <label for="">Wanita Dewasa</label>
                <input type="text" class="form-control form-control-alternative" value="" name="wanita">
            </div>
            <div class="form-group">
                <label for="">Remaja</label>
                <input type="text" class="form-control form-control-alternative" value="" name="remaja">
            </div>
            <div class="form-group">
                <label for="">Anak</label>
                <input type="text" class="form-control form-control-alternative" value="" name="anak">
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
@endsection
