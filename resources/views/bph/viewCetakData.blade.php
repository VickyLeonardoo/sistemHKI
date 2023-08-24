@extends('bph.partials.header')
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
                        <div class="col-lg-2 col-6">
                          <!-- small box -->
                          <div class="small-box bg-warning">
                            <div class="inner">
                              {{-- <h3>{{ $wijk }}</h3> --}}

                              <p>Data Jemaat</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/bph/cetak-data-jemaat" class="small-box-footer">Cetak <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-2 col-6">
                          <!-- small box -->
                          <div class="small-box bg-primary">
                            <div class="inner">
                              {{-- <h3>{{ $kk }}</h3> --}}

                              <p>Data Wijk</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/bph/cetak-data-wijk" class="small-box-footer">Cetak Data <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-2 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              {{-- <h3>{{ $jemaat }}</h3> --}}

                              <p>Data Sintua</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/bph/cetak-data-sintua" class="small-box-footer">Cetak Data <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-2 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                            <div class="inner">
                              {{-- <h3>{{ $pria }}</h3> --}}

                              <p>Data Pendeta</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-person-add"></i>
                            </div>
                            <a href="/bph/cetak-data-pendeta" class="small-box-footer">Cetak Data <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                        <div class="col-lg-2 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                              <div class="inner">
                                {{-- <h3>{{ $pria }}</h3> --}}

                                <p>Data KK</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-person-add"></i>
                              </div>
                              <a href="/bph/cetak-data-kk" class="small-box-footer">Cetak Data <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                          </div>

                      </div>

                    </div>
                  </section>
            </div>
        </div>
    </div>
</div>
@endsection
