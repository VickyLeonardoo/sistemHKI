@extends('bph.partials.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive p-0">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Wijk</th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            @foreach ($sintuas as $data)
                            <tr>
                                <td>{{ $data->id}}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->wijk->nama }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Wijk</th>
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
