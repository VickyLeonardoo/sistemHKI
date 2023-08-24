@extends('bph.partials.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" action="/bph/simpan-master-pengeluaran">
                @csrf

                <div class="form-group">
                  <label for="exampleFormControlInput1">Kode:</label>
                  <input type="text" name="kode" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Kode">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama:</label>
                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                  </div>
                <div class="form-group">
                </div>
                <input type="submit" class="btn-info btn" value="Simpan">
              </form>
          </div>
      </div>
    </div>
@endsection
