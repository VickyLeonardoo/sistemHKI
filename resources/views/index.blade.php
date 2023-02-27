@extends('partial.header')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <section class="content">
                    <div class="container-fluid">
                      <!-- Small boxes (Stat box) -->
                      <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-warning">
                            <div class="inner">
                              <h3>{{ $wijk }}</h3>

                              <p>Wijk</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/adminsitrator-daftar-petugas-unit" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-primary">
                            <div class="inner">
                              <h3>{{ $kk }}</h3>

                              <p>KK</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="adminsitrator-daftar-petugas-admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h3>{{ $jemaat }}</h3>

                              <p>Jemaat</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="adminsitrator-daftar-petugas-manajemen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <h3>{{ $pria }}</h3>

                              <p>Pria</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/adminsitrator-daftar-petugas-administrator" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
                      </div>
                      <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-warning">
                            <div class="inner">
                              <h3>{{ $wanita }}</h3>

                              <p>Wanita</p></p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/adminsitrator-daftar-petugas-unit" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-primary">
                            <div class="inner">
                              <h3>99</h3>

                              <p>Pelajar Sidi</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="adminsitrator-daftar-petugas-admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              <h3>99</h3>

                              <p>Baptis</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="adminsitrator-daftar-petugas-manajemen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                            <div class="inner">
                              <h3>99</h3>

                              <p>Pernikahan</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/adminsitrator-daftar-petugas-administrator" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
                      </div>
                      <!-- /.row -->
                      <!-- Main row -->

                      <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                  </section>
            </div>
            <div class="col-md-12">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('soft/assets/img/ivancik.jpg');">
                                  <span class="mask bg-gradient-dark"></span>
                                  <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Ulang Tahun Jemaat</h5>
                                <h6 class="text-white" >{{ $ultah }}</h6>
                                    <p class="text-white">Jemaat yang berulang tahun pada minggu tanggal {{ $start }} sampai tanggal {{ $end }}</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/ulang-tahun-jemaat">
                                      Lihat Selengkapnya..
                                      <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                  </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('soft/assets/img/ivancik.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Ulang Tahun Pernikahan</h5>
                                    <p class="text-white">Jemaat yang berulang tahun pada minggu tanggal {{ $start }} sampai tanggal {{ $end }}.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                                    Lihat Selengkapnya..
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
