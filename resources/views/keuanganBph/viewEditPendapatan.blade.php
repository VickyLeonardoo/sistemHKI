@extends('bph.partials.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" action="/ubah-pendapatan-{{ $pend->id }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">KODE:</label>
                  <input type="text" name="kode" class="form-control" id="exampleFormControlInput1" value="{{ $pend->kode }}">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama:</label>
                  <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"value="{{ $pend->nama }}">
                </div>
                <div class="form-group">
                </div>
                <input type="submit" class="btn-info btn" value="Simpan">
              </form>
          </div>
      </div>
</div>
@endsection
