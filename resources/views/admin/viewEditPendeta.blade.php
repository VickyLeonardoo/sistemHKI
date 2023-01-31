@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" action="/ubah-pendeta-{{ $data->id }}">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama:</label>
                  <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" value="{{$data->nama}}">
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlInput2">Tempat Lahir</label>
                        <input type="text" name="tempatLahir" class="form-control form-control-alternative" id="exampleFormControlInput1" value="{{ $data->tempatLahir }}" >
                      </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Tanggal Lahir</label>
                            <input type="text" name="tglLahir" class="form-control form-control-alternative" value="{{ $data->tglLahir }}"
                            onfocus="(this.type='date')"
                            onblur="(this.type='text')">
                          </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Status:</label>
                        <select name="status" class="form-control form-control-alternative">
                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                            <option value="{{ $data->status }}" disabled >-------</option>

                            <option value="Pendeta Resort">Pendeta Resort</option>
                            <option value="Diakones">Diakones</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Tanggal Masuk:</label>
                        <input type="text" name="tglMasuk" class="form-control form-control-alternative" value="{{ $data->tglMasuk }}"
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
