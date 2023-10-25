@extends('partial.header')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <a href="/data-sintua" class="btn btn-primary">Kembali</a>
                    </div>
                    <form method="POST" action="/simpan-sintua">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama:</label>
                            <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan Nama">
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
                            <input type="submit" class="btn-info btn" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
