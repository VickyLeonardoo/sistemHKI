@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nomor Kk</th>
                            <th>Anggota Keluarga</th>
                        </tr>
                    </thead>
                    <?php $i = 1 ?>
                    <tbody>
                        @foreach ($kk as $data)
                        <tr>
                            <td>{{ $data->nomorKk }}</td>
                            <td>
                                {{-- <a href="ubah-data-wijk-{{ $data->id }}" class="btn btn-primary"></a> --}}
                                <!-- Button trigger modal -->
                                <a href="/anggota-keluarga-{{ $data->id }}" class="btn btn-gradient-info" style="color: blue">Lihat Anggota Wijk</a>
                                {{-- <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $data->id }}"> --}}
                                    {{-- Edit --}}
                                  {{-- </button> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Wijk</th>
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
