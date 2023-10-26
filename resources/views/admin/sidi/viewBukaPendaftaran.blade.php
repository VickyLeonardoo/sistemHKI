@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if ($tahun > 0)
                    <h2 style="text-align: center">Pendaftaran Telah Dibuka, Silahkan Periksa Status Pendaftaran</h2>
                    <a class="form-control btn-primary btn" href="/periksa-status-pendaftaran-pelajar-sidi">Periksa Status Pendaftaran</a>
                @else
                    <a class="form-control btn-primary btn" href="/simpan-pendaftaran-pembelajaran-sidi">Buka Pendaftaran</a>
                @endif

        </div>
    </div>
</div>
@endsection
