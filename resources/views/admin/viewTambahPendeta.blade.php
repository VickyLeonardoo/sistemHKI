@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="text-right">
            <a href="{{ route('admin.pendeta.home') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-body px-0 pt-0 pb-2">
                    <form method="POST" action="/simpan-pendeta">
                        @csrf
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Nama: </label>
                          <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                          @error('nama')
                              <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="exampleFormControlInput2">Tempat Lahir</label>
                                <input type="text" name="tempatLahir" class="form-control form-control-alternative {{ $errors->has('tempatLahir') ? 'is-invalid':'' }}" id="exampleFormControlInput1" placeholder="Masukkan Tempat Lahir" >
                                @error('tempatLahir')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                              </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">Tanggal Lahir</label>
                                    <input type="text" name="tglLahir" class="form-control form-control-alternative {{ $errors->has('tglLahir') ? 'is-invalid':'' }}" placeholder="Masukkan Tanggal Lahir"
                                    onfocus="(this.type='date')"
                                    onblur="(this.type='text')">
                                  </div>
                                  @error('tglLahir')
                                      <p class="text-danger">{{ $message }}</p>
                                  @enderror
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Status:</label>
                                <select name="status" class="form-control form-control-alternative {{ $errors->has('tglLahir') ? 'is-invalid':''}}">
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="Pendeta Resort">Pendeta Resort</option>
                                    <option value="Diakones">Diakones</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Tanggal Masuk:</label>
                                <input type="text" name="tglMasuk" class="form-control form-control-alternative {{ $errors->has('tglLahir') ? 'is-invalid':''}}" placeholder="Masukkan Tanggal Masuk"
                                    onfocus="(this.type='date')"
                                    onblur="(this.type='text')"/>
                                @error('tglMasuk')
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
    </div>
</div>
@endsection
