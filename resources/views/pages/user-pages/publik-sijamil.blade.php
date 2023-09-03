@extends('layout.masteruser2')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  
@endpush

@section('content')
<section class="page-title">
    <div class="auto-container">
        <div class="content">
            <h2>Dashboard Publik SIJAMIL</h2>
        </div>
    </div>
</section>
<section class="sijamil-demografi section-p">
    <div class="auto-container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body centered">
                        <h4>{{ $lakiLakiTotal}}</h4>
                        <h5>Remaja Laki Laki</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body centered">
                        <h4>{{ $PerempuanTotal}}</h4>
                        <h5>Remaja Perempuan</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body centered">
                        <h4>{{ $bumiltotal}}</h4>
                        <h5>Ibu Hamil</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="demografi2 mb-6">
    <div class="auto-container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="card-title custom-demografi centered">
                            <h6>Total Remaja Yang Memiliki Riwayat Penambahan Darah</h6>
                        </div>
                        <div id="RemajaDarah"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="card-title custom-demografi centered">
                            <h6>Total Remaja Yang Memiliki Riwayat Anemia</h6>
                        </div>
                        <div id="RemajaAnemia"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="card-title custom-demografi centered">
                            <h6>Total Ibu Hamil Yang Memiliki Riwayat Penambahan Darah</h6>
                        </div>
                        <div id="BumilDarah"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="card-title custom-demografi centered">
                            <h6>Persentase Ibu Hamil KB Pasca Bersalin</h6>
                        </div>
                        <div id="KBBersalin"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="card mb-5">
                    <div class="card-body">
                        <div class="card-title custom-demografi centered">
                            <h6>Perkiraan Kelahiran Berdasarkan Bulan di Tahun 2023</h6>
                        </div>
                        <div id="PerkiraanLahir"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
<!-- Remaja Penambahan Darah -->
<script>
    var colors = {
        primary: '#132047',
        gridBorder: '#D6D6D6'
    };

    var fontFamily = 'Arial, sans-serif';

    var options = {
        chart: {
            type: 'bar',
            height: '320',
            parentHeightOffset: 0,
            horizontalAlign: 'left',
            toolbar: {
                show: true
            },
        },
        theme: {
            mode: 'light'
        },
        tooltip: {
            theme: 'light'
        },
        colors: [colors.primary],
        grid: {
            padding: {
                bottom: -4
            },
            borderColor: colors.gridBorder,
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        series: [{
            name: 'Remaja',
            data: <?php echo json_encode($remajadarah2); ?>
        }],
        
        xaxis: {
            type: 'date',
            categories: <?php echo json_encode($remajadarah1); ?>,
            axisBorder: {
                color: colors.gridBorder,
            },
            axisTicks: {
                color: colors.gridBorder,
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return Math.floor(val); // Menampilkan nilai tanpa desimal
                }
            }
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: 'center',
            fontFamily: fontFamily,
            itemMargin: {
                horizontal: 8,
                vertical: 0
            },
        },
        stroke: {
            width: 0
        },
        plotOptions: {
            bar: {
                borderRadius: 4
            }
        }
    }

    var apexBarChart = new ApexCharts(document.querySelector("#RemajaDarah"), options);
    apexBarChart.render();
</script>

<!-- Remaja Anemia -->
<script>
    var colors = {
        primary: '#2980b9',
        gridBorder: '#D6D6D6'
    };

    var fontFamily = 'Arial, sans-serif';

    var options = {
        chart: {
            type: 'bar',
            height: '320',
            parentHeightOffset: 0,
            horizontalAlign: 'left',
            toolbar: {
                show: true
            },
        },
        theme: {
            mode: 'light'
        },
        tooltip: {
            theme: 'light'
        },
        colors: [colors.primary],
        grid: {
            padding: {
                bottom: -4
            },
            borderColor: colors.gridBorder,
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        series: [{
            name: 'Remaja',
            data: <?php echo json_encode($anemiaremaja2); ?>
        }],
        
        xaxis: {
            type: 'date',
            categories: <?php echo json_encode($anemiaremaja1); ?>,
            axisBorder: {
                color: colors.gridBorder,
            },
            axisTicks: {
                color: colors.gridBorder,
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return Math.floor(val); // Menampilkan nilai tanpa desimal
                }
            }
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: 'center',
            fontFamily: fontFamily,
            itemMargin: {
                horizontal: 8,
                vertical: 0
            },
        },
        stroke: {
            width: 0
        },
        plotOptions: {
            bar: {
                borderRadius: 4
            }
        }
    }

    var apexBarChart = new ApexCharts(document.querySelector("#RemajaAnemia"), options);
    apexBarChart.render();
</script>

<!-- Bumil Darah -->
<script>
    var colors = {
        primary: '#e74c3c',
        gridBorder: '#D6D6D6'
    };

    var fontFamily = 'Arial, sans-serif';

    var options = {
        chart: {
            type: 'bar',
            height: '320',
            parentHeightOffset: 0,
            horizontalAlign: 'left',
            toolbar: {
                show: true
            },
        },
        theme: {
            mode: 'light'
        },
        tooltip: {
            theme: 'light'
        },
        colors: [colors.primary],
        grid: {
            padding: {
                bottom: -4
            },
            borderColor: colors.gridBorder,
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        series: [{
            name: 'Ibu Hamil',
            data: <?php echo json_encode($bumildarah2); ?>
        }],
        
        xaxis: {
            type: 'date',
            categories: <?php echo json_encode($bumildarah1); ?>,
            axisBorder: {
                color: colors.gridBorder,
            },
            axisTicks: {
                color: colors.gridBorder,
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return Math.floor(val); // Menampilkan nilai tanpa desimal
                }
            }
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: 'center',
            fontFamily: fontFamily,
            itemMargin: {
                horizontal: 8,
                vertical: 0
            },
        },
        stroke: {
            width: 0
        },
        plotOptions: {
            bar: {
                borderRadius: 4
            }
        }
    }

    var apexBarChart = new ApexCharts(document.querySelector("#BumilDarah"), options);
    apexBarChart.render();
</script>

<!-- KB Pasca Bersalin -->
<script>
    var colors = {
        primary: '#008FFB',
        warning: '#FFB64D',
        danger: '#FF5370',
        info: '#00C9E6',
        bodyColor: '#333',
        cardBg: '#fff',
    };

    var fontFamily = 'Arial, sans-serif';

    var options = {
        chart: {
            height: 300,
            type: "pie",
            foreColor: colors.bodyColor,
            background: colors.cardBg,
            toolbar: {
                show: true
            },
        },
        theme: {
            mode: 'light'
        },
        tooltip: {
            theme: 'light'
        },
        colors: [colors.warning, colors.primary, colors.danger, colors.info],
        legend: {
            show: true,
            position: "top",
            horizontalAlign: 'center',
            fontFamily: fontFamily,
            itemMargin: {
                horizontal: 8,
                vertical: 0
            },
        },
        stroke: {
            colors: ['rgba(0,0,0,0)']
        },
        dataLabels: {
            enabled: false
        },
        series: <?php echo json_encode($KBPasca2); ?>,
        labels: <?php echo json_encode($KBPasca1); ?>
    };

    var chart = new ApexCharts(document.querySelector("#KBBersalin"), options);
    chart.render();
</script>

<!-- Perkiraan Lahir -->
<!-- Remaja Anemia -->
<script>
    var colors = {
        primary: '#16a085',
        gridBorder: '#D6D6D6'
    };

    var fontFamily = 'Arial, sans-serif';

    var options = {
        chart: {
            type: 'bar',
            height: '320',
            parentHeightOffset: 0,
            horizontalAlign: 'left',
            toolbar: {
                show: true
            },
        },
        theme: {
            mode: 'light'
        },
        tooltip: {
            theme: 'light'
        },
        colors: [colors.primary],
        grid: {
            padding: {
                bottom: -4
            },
            borderColor: colors.gridBorder,
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        series: [{
            name: 'Kelahiran',
            data: <?php echo json_encode($Kelahiran2); ?>
        }],
        
        xaxis: {
            type: 'date',
            categories: <?php echo json_encode($Kelahiran1); ?>,
            axisBorder: {
                color: colors.gridBorder,
            },
            axisTicks: {
                color: colors.gridBorder,
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return Math.floor(val); // Menampilkan nilai tanpa desimal
                }
            }
        },
        legend: {
            show: true,
            position: "top",
            horizontalAlign: 'center',
            fontFamily: fontFamily,
            itemMargin: {
                horizontal: 8,
                vertical: 0
            },
        },
        stroke: {
            width: 0
        },
        plotOptions: {
            bar: {
                borderRadius: 4
            }
        }
    }

    var apexBarChart = new ApexCharts(document.querySelector("#PerkiraanLahir"), options);
    apexBarChart.render();
</script>
@endpush