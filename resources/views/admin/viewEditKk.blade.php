@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" action="/ubah-kk-{{ $kk->id }}">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nomor KK</label>
                  <input type="text" name="nomor" class="form-control {{ $errors->has('nomor') ? 'is-invalid':'' }}" id="exampleFormControlInput1" value="{{ $kk->nomorKk }}">
                @error('nomor')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid':'' }}" id="exampleFormControlInput1" value="{{ $kk->alamat }}">
                @error('alamat')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control {{ $errors->has('kelurahan') ? 'is-invalid':'' }}" id="exampleFormControlInput1" value="{{ $kk->kelurahan }}">
                @error('kelurahan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid':'' }}" id="exampleFormControlInput1" value="{{ $kk->kecamatan }}">
                @error('kecamatan')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Wijk</label>
                    <select name="wijk" class="form-control" id="">
                        <option value="{{ $kk->wijk->id }}">{{ $kk->wijk->nama }}</option>
                        <option value="" disabled >----------</option>
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
