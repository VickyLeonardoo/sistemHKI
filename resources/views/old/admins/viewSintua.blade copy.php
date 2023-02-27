@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <a href="/tambah-data-sintua" class="btn btn-info">Tambah Data Sintua</a>
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
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
                    <?php $i = 1 ?>
                    <tbody>
                        @foreach ($sintua as $data)
                        <tr>
                            <td>{{ $data->id}}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->wijk->nama }}</td>
                            <td>
                                {{-- <a href="ubah-data-wijk-{{ $data->id }}" class="btn btn-primary"></a> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}">
                                    Edit
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
</div>

@foreach ($sintua as $data)
<div class="modal fade lg" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Wijk {{ $data->nama }}</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/ubah-sintua-{{ $data->id }}">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama:</label>
                  <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="{{ $data->nama }}">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama:</label>
                  <select name="wijk" class="form-control" id="">
                    <option value="{{ $data->wijk_id }}" selected>{{ $data->wijk->nama }}</option>
                    <option value="" disabled>----------</option>

                    @foreach ($wijk as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                  </select>
                </div>
          <input type="submit" class="btn bg-gradient-primary" value="Simpan"></input>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
@endforeach

  <!-- Modal -->


@endsection