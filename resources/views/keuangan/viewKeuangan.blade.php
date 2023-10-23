@extends('partial.header')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-rupiah-sign"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pemasukan</span>
                        <a href="/master-data-pendapatan">Selanjutnya</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-rupiah-sign"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengeluaran</span>
                        <a href="/master-data-pengeluaran">Selanjutnya</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    {{-- <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('soft/assets/img/ivancik.jpg');">
          <span class="mask bg-gradient-dark"></span>
          <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-4 pt-2">Data Pendapatan</h5>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/master-data-pendapatan">
              Cetak
              <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
          </div>
        </div>
      </div>
    </div> --}}
