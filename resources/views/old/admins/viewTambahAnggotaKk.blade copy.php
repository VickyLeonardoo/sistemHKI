@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
          <div class="card-header pb-0">
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form method="POST" action="/simpan-anggota-kk-{{ $kk->id }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">NIK:</label>
                  <input type="text" name="nik" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nik">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama:</label>
                  <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                </div>
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlInput2">Tempat Lahir:</label>
                        <input type="text" name="tempatLahir" class="form-control form-control-alternative" id="exampleFormControlInput1" placeholder="Masukkan Tempat Lahir" >
                      </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Tanggal Lahir</label>
                            <input type="text" name="tglLahir" class="form-control form-control-alternative" placeholder="Masukkan Tanggal Lahir"
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
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleFormControlInput2">Status Keluarga</label>
                        <select name="statusKeluarga" class="form-control form-control-alternative" id="">
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                            <option value="Anak">Anak</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Golongan Darah</label>
                            <select name="golDar" class="form-control form-control-alternative" id="">
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                            </select>
                          </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Pekerjaan">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nomor HP</label>
                    <input type="text" name="noHp" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nomor HP">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Sidi</label>
                    <select name="sidi" class="form-control form-control-alternative" id="">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Foto</label>
                    <input type="file" name="image" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nomor HP">
                </div>
                <div class="form-group">
                </div>
                <input type="submit" class="btn-info btn" value="Simpan">
              </form>
          </div>
      </div>
</div>
@endsection
