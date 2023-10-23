@extends('bph.partials.header')

@section('content')
<div class="col-md-12">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Data Master Pemasukan</h3>

                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/bph/master-data-pendapatan" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Data Master Pengeluaran</h3>

                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/bph/master-data-pengeluaran" class="small-box-footer">More
                            info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
