@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" action="/simpan-kk">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nomor KK</label>
                  <input type="text" name="nomor" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Momor KK">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Alamat Lengkap">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Wijk</label>
                    <select name="wijk" class="form-control" id="">
                        @foreach ($wijk as $data)
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Status Rumah</label>
                    <select name="status" class="form-control">
                        <option value="Rumah Sendiri">Rumah Sendiri</option>
                        <option value="Kontrak">Kontrak</option>
                    </select>
                  </div>
                <div class="form-group">
                </div>
                <input type="submit" class="btn-info btn" value="Simpan">
              </form>
          </div>
      </div>
    </div>
@endsection
