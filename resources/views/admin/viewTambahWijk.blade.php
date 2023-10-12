@extends('partial.header')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="text-right">
            <a href="/data-wijk" class="btn btn-primary">Kembali</a><br><br>
        </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" action="/simpan-wijk">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama:</label>
                  <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                    @error('nama')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                </div>
                <input type="submit" class="btn-info btn" value="Simpan">
              </form>
          </div>
      </div>
    </div>
@endsection
