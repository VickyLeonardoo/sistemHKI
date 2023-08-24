@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="/simpan-sintua">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama:</label>
                      <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                      @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Wijk:</label>
                            <select name="wijk" class="form-control form-control-alternative">
                                <option value="" disabled selected>Pilih Wijk</option>
                                @foreach ($wijk as $data)
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                            @error('wijk')
                            <p class="text-danger">{{ $message }}</p>
                      @enderror
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
                          @error('tglMulai')
                            <p class="text-danger">{{ $message }}</p>
                      @enderror
                    <div class="form-group">
                    </div>
                    <input type="submit" class="btn-info btn" value="Simpan">
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection
