@extends('partial.header')
@section('js')
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        @if(isset($chartData))
            var chartData = {!! json_encode($chartData) !!};

            if (Array.isArray(chartData) && chartData.length > 0) {
                var data = new google.visualization.arrayToDataTable(chartData);

                var options = {
                    title: 'Jumlah KK Per Wijk'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        @endif
    }
</script>
@endsection
@section('chart')
<script src="{{ $kkWijkChart->cdn() }}"></script>
{{ $kkWijkChart->script() }}

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

<script src="{{ $jemaatChart->cdn() }}"></script>
{{ $jemaatChart->script() }}

<script src="{{ $chartGender->cdn() }}"></script>
{{ $chartGender->script() }}
<script>
    var options = {
        series: [{
            name: "Pendapatan",
            data: @json($pendapatan)
        },{
            name: "Pengeluaran",
            data: @json($pengeluaran)
        },{
            name: "Total Keuangan",
            data: @json($total)
        }],
        chart: {
            height: 386,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'straight'
        },
        title: {
            text: 'Total Keuangan',
            align: 'center'
        },
        subtitle: {
            text: new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 }).format(@json($totalNominal)),
            align: 'center',
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: @json($bulan),
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR", minimumFractionDigits: 0 }).format(value);
                }
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

</script>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h3>Total Saldo Akhir Gereja @currency($totalNominal)</h3>
                                        <p>@currency($totalNominal)</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-solid fa-rupiah-sign"></i>
                                    </div>
                                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-12">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        {!! $kkWijkChart->container() !!}
                                    </div>
                                    {{-- <div id="piechart" style="width:auto; height: 400px;"></div> --}}
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div id="chart"></div>
                                        {{-- {!! $chart->container() !!} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{ $pendeta }}</h3>

                                            <p>Pendeta</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="/data-kartu-keluarga" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>{{ $wijk }}</h3>
                                            <p>Wijk</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="/data-wijk" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
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
                                        <a href="/data-jemaat" class="small-box-footer">More info
                                            <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3>{{ $kk }}</h3>

                                            <p>KK</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="/data-kartu-keluarga" class="small-box-footer">More info <i
                                                class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-6">
                                    <!-- small box -->
                                    <div class="card">
                                        {!! $jemaatChart->container() !!}
                                    </div>
                                </div>

                                <!-- ./col -->

                                <!-- ./col -->
                            </div>
                            <div class="row">
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->

                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    {{-- <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3>99</h3>

                                            <p>Pelajar Sidi</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="adminsitrator-daftar-petugas-admin" class="small-box-footer">More info
                                            <i class="fas fa-arrow-circle-right"></i></a>
                                    </div> --}}
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->

                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->

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
                                    <div class="card">
                                        {!! $chartGender->container() !!}
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="small-box ">
                                        <div class="inner">
                                            <h3>Ulang Tahun Jemaat</h3>
                                            <p>Jemaat yang berulang tahun pada minggu tanggal {{ $start }} sampai
                                                tanggal {{ $end }}</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="/ulang-tahun-jemaat" class="small-box-footer bg-secondary">More
                                            info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @endsection
