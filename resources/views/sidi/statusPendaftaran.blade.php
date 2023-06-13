@extends('partial.header')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if ($pendaftaran->status == 'open')
                        <label for="">Status Pendaftaran</label>
                        <input type="text" value="Dibuka" class="form-control" readonly>
                        <br>
                        <a class="btn-info btn" href="/ubah-status-pendaftaran-pelajar-sidi">Tutup Pendaftaran</a>
                    @else
                    <label for="">Status Pendaftaran</label>
                    <input type="text" value="Ditutup" class="form-control" readonly>
                    <br>
                    <a class="btn-info btn" href="ubah-status-pendaftaran-pelajar-sidi">Buka Pendaftaran</a>
                    @endif

                    <hr>
                    <label for="">Link Pendaftaran</label>
                    <h2><a href="http://127.0.0.1:8000/pendaftaran-pelajar-sidi">http://127.0.0.1:8000/pendaftaran-pelajar-sidi</a></h2>
                    <hr>
                    <label for="">Lihat Pendaftar</label><br>
                    <a class="btn-info btn" href="pendaftar-pembelajaran-sidi">Pendaftar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
