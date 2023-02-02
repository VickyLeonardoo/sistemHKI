@extends('partial.header')
@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-3">
            <div class="card h-100 p-3">
              <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('soft/assets/img/ivancik.jpg');">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                  <h5 class="text-white font-weight-bolder mb-4 pt-2">Cetak Data Pendeta</h5>
                  <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/cetak-data-pendeta">
                    Cetak
                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-3">
            <div class="card h-100 p-3">
              <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('soft/assets/img/ivancik.jpg');">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                  <h5 class="text-white font-weight-bolder mb-4 pt-2">Cetak Data Wijk</h5>
                  <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/cetak-data-wijk">
                    Cetak
                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-3">
            <div class="card h-100 p-3">
              <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('soft/assets/img/ivancik.jpg');">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                  <h5 class="text-white font-weight-bolder mb-4 pt-2">Cetak Data Sintua</h5>
                  <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/cetak-data-sintua">
                    Cetak
                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-3">
            <div class="card h-100 p-3">
              <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('soft/assets/img/ivancik.jpg');">
                <span class="mask bg-gradient-dark"></span>
                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                  <h5 class="text-white font-weight-bolder mb-4 pt-2">Cetak Data KK</h5>
                  <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/cetak-data-kk">
                    Cetak
                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-3">
                <div class="card h-100 p-3">
                  <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('soft/assets/img/ivancik.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                      <h5 class="text-white font-weight-bolder mb-4 pt-2">Cetak Data Jemaat</h5>
                      <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/cetak-data-jemaat">
                        Cetak
                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>
@endsection
