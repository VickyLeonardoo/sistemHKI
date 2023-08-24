@extends('bph.partials.header')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/bph/surat-keterangan-jemaat-word" method="post">
                            @csrf
                            <input type="hidden" name="jenissk" value="skkematian">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama: </label>
                                <select name="nama" id="select-state" class="form-control selectpicker"
                                data-live-search="true">
                                    <option value="">Pilih Jemaat...</option>
                                    @foreach ($jemaat as $data)
                                        <option value="{{ $data->id }}">{{ $data->nik }} - {{ $data->nama }}</option>
                                    @endforeach
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="">Tanggal Meninggal:</label>
                                <input type="date" class="form-control" name="tglMeninggal" placeholder="Masukkan Tanggal...">
                              </div>
                              <input type="submit" class="btn btn-primary form-control" value="Cetak">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
