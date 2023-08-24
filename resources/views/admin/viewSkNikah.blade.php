@extends('partial.header')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="/surat-keterangan-jemaat-word" method="post">
                    @csrf
                    <input type="hidden" name="jenissk" value="sknikah">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Pria: </label>
                        <select required name="pria" id="selects-state" class="form-control selectpicker" data-live-search="true" placeholder="Ketik NIK...">
                            <option value="">Pilih Jemaat...</option>
                            @foreach ($jemaatPria as $data)
                                <option value="{{ $data->id }}">{{ $data->nik }} - {{ $data->nama }}</option>
                            @endforeach
                          </select>
                      </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Wanita: </label>
                        <select required name="wanita" id="selects-state" class="form-control selectpicker" data-live-search="true"  placeholder="Ketik NIK...">
                            <option value="">Pilih Jemaat...</option>
                            @foreach ($jemaatWanita as $data)
                                <option value="{{ $data->id }}">{{ $data->nik }} - {{ $data->nama }}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput2">Tanggal Pemberkatan:</label>
                        <input type="text" name="tglPernikahan" class="form-control form-control-alternative" placeholder="Masukkan Tanggal Kegiatan"
                         onfocus="(this.type='date')"
                         onblur="(this.type='text')">
                    </div>
                      <div class="form-group">
                        <label for="">Keperluan</label>
                        <input type="text" class="form-control" name="keperluan" placeholder="Masukkan Keperluan...">
                      </div>
                      <input type="submit" class="btn btn-primary form-control" value="Cetak">
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
