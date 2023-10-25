@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
              <div class="card-header pb-0">
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <form method="POST" action="/ubah-anggota-{{ $jemaat->id }}-kk-{{ $id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">NIK: {{ $id }}</label>
                      <input type="text" name="nik" class="form-control" id="exampleFormControlInput1" value="{{ $jemaat->nik }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama:</label>
                      <input type="text" name="nama" class="form-control" id="exampleFormControlInput1"value="{{ $jemaat->nama }}">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleFormControlInput2">Tempat Lahir:</label>
                            <input type="text" name="tempatLahir" class="form-control form-control-alternative" id="exampleFormControlInput1" value="{{ $jemaat->tempatLahir }}">
                          </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleFormControlInput2">Tanggal Lahir</label>
                                <input type="text" name="tglLahir" class="form-control form-control-alternative" value="{{ $jemaat->tglLahir }}"
                                onfocus="(this.type='date')"
                                onblur="(this.type='text')">
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleFormControlInput2">Jenis Kelamin</label>
                            <select name="jk" class="form-control form-control-alternative" id="">
                                <option value="Laki-Laki" {{ $jemaat->jenisKelamin == 'Laki-Laki' ? 'selected':'' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ $jemaat->jenisKelamin == 'Perempuan' ? 'selected':'' }}>Perempuan</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="exampleFormControlInput2">Status Keluarga</label>
                            <select name="statusKeluarga" class="form-control form-control-alternative" id="">
                                <option value="{{ $jemaat->statusKeluarga }}" selected>{{ $jemaat->statusKeluarga }}</option>
                                <option value="" disabled>-----------</option>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                <option value="Anak">Anak</option>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" id="exampleFormControlInput1" value="{{ $jemaat->pekerjaan }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor HP</label>
                        <input type="text" name="noHp" class="form-control" id="exampleFormControlInput1"value="{{ $jemaat->nomorHp }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Sidi</label>
                        <select name="sidi" class="form-control form-control-alternative" id="">
                            <option value="{{ $jemaat->sidi }}" selected>{{ $jemaat->sidi }}</option>
                            <option value="" disabled>----------</option>
                            <option value=""></option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-control form-control-alternative">
                            <option value="0" {{ $jemaat->is_alive == 0 ? 'selected' : '' }}>Hidup</option>
                            <option value="1" {{ $jemaat->is_alive == 1 ? 'selected' : ''}}>Meninggal</option>
                        </select>
                    </div>
                    <div class="form-group">
                    </div>
                    <input type="submit" class="btn-info btn" value="Simpan">
                  </form>
              </div>
          </div>
    </div>
</div>
@endsection
