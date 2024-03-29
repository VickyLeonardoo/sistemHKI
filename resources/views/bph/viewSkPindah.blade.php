@extends('bph.partials.header')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="">
                            <div class="form-group">
                                <label for="">Gereja Tujuan:</label>
                                <input type="text" class="form-control" name="gerejaTujuan" placeholder="Masukkan Gereja Tujuan...">
                            </div>
                            <div class="form-group">
                                <label for="">Sintua Bertugas</label>
                                <select name="nama" id="select-state" class="form-control selectpicker"
                                data-live-search="true">
                                    <option value="">Pilih Sintua...</option>
                                    @foreach ($sintua as $data)
                                        <option value="{{ $data->id }}">{{ $data->wijk->nama }} - {{ $data->nama }}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                            <h5 style="text-align:center">Pindah Perorangan</h5>
                        <form action="/bph/surat-keterangan-jemaat-word" method="post">
                            @csrf
                            <input type="hidden" name="jenissk" value="skpindah">
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
                              <input type="submit" class="btn btn-primary form-control" value="Cetak">
                        </form>
                    </div>
                        <div class="col-md-6">
                            <h5 style="text-align: center">Pindah Satu KK</h5>
                            <form action="/bph/surat-keterangan-pindah-satu-keluarga" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Masukkan Nomor KK</label>
                                    <select name="nomorKk" id="select-state" class="form-control selectpicker"
                                    data-live-search="true">
                                        <option value="">Pilih Nomor KK...</option>
                                        @foreach ($kk as $item)
                                            <option value="{{ $item->id }}">{{ $item->nomorKk }} - {{ $item->alamat }}</option>
                                        @endforeach
                                        </select>
                                    </select>
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
