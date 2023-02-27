@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" action="/simpan-sintua">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama:</label>
                  <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Wijk:</label>
                        <select name="wijk" class="form-control form-control-alternative">
                            <option value="" disabled selected>Pilih Wijk</option>
                            @foreach ($wijk as $data)
                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Bertugas:</label>
                        <input type="text" name="tglMulai" class="form-control form-control-alternative" placeholder="Masukkan Tanggal Masuk"
                            onfocus="(this.type='date')"
                            onblur="(this.type='text')">
                      {{-- <div class="form-group">
                        <label for="exampleFormControlInput1">Foto:</label>
                        <input type="textarea" name="foto" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                      </div> --}}
                <div class="form-group">
                </div>
                <input type="submit" class="btn-info btn" value="Simpan">
              </form>
          </div>
      </div>
    </div>
@endsection