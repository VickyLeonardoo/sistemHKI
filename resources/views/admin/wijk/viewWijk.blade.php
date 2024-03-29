@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text-right">
                    <a href="/tambah-data-wijk" class="btn btn-primary">Tambah Wijk</a><br><br>
                </div>
                <div class="table-responsive p-0">
                    <table id="viewWijk" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Wijk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            @foreach ($wijk as $data)
                            <tr>
                                <td>{{ $data->id}}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                    {{-- <a href="ubah-data-wijk-{{ $data->id }}" class="btn btn-primary"></a> --}}
                                    <!-- Button trigger modal -->
                                    <a href="/data-wijk-anggota-wijk-{{ $data->slug }}" class="btn btn-info" >Lihat Anggota Wijk</a>
                                    <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#exampleModal{{ $data->id }}">
                                        Edit
                                      </button>
                                    <a href="/data-wijk-kegiatan-wijk-{{ $data->slug }}" class="btn btn-success">Kegiatan</a>
                                    <a href="/hapus-data-wijk-{{ $data->id }}" onclick="return confirm('Kamu Yakin Ingin Menghapus Data {{ $data->nama }}?');" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><br><br>
            </div>
        </div>
    </div>
</div>


  <!-- Modal -->
@foreach ($wijk as $data)
<div class="modal fade lg" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Wijk {{ $data->nama }}</h5>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/ubah-wijk-{{ $data->id }}">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama:</label>
                  <input type="text" name="nama" required class="form-control" id="exampleFormControlInput1" value="{{ $data->nama }}">
                @error('nama')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
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

@foreach ($wijk as $data)

@endforeach
@endsection
