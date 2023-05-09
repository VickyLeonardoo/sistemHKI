@extends('partial.header')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/surat-keterangan-jemaat-word" method="post">
                    @csrf
                    <input type="hidden" name="jenissk" value="skjemaat">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama: </label>
                        <select name="nama" id="select-state" placeholder="Ketik NIK...">
                            <option value="">Pilih Alamat...</option>
                            @foreach ($jemaat as $data)
                                <option value="{{ $data->id }}">{{ $data->nik }} - {{ $data->nama }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="">Keperluan</label>
                        <input type="text" class="form-control" name="keperluan" placeholder="Masukkan Keperluan...">
                      </div>
                      <input type="submit" class="btn btn-primary form-control" value="Cetak">
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
