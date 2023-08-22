@extends('layout.masteruser2')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  
@endpush

@section('content')
<section class="page-title">
    <div class="auto-container">
        <div class="content">
            <h2>Dashboard Publik<br>SIBANGENAN</h2>
        </div>
    </div>
</section>
<!-- Informasi Urusan -->
<section class="urusan-sibangenan-wrap">
    <div class="auto-container">
        <div class="title">
            <h5 style="font-family: 'Poppins', sans-serif!important; text-align:center;" >Daftar Urusan Sibangenan Yang Tersedia Untuk Tahun 2023</h5>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Urusan</th>
                <th>Sub Urusan</th>
                <th>Peruntukan</th>
              </tr>
            </thead>
            <tbody>
              @php 
              $nomor = 1;
              @endphp
              @foreach($urusan as $data)
              <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->name }}</td>
                <td>@if ($data->level == 3)
                    Warga
                @elseif ($data->level == 2)
                    BPD
                @endif</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
</section>
<section class="informasi-publik">
    <div class="auto-container">
        <div class="row">
            <div class="col-xl-8 grid-margin stretch-card mb-4">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:14px!important;">Total Pengajuan Berdasarkan Tahun</h6>
                        <div id="apexBar"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 grid-margin stretch-card mb-4">
                <div class="card">
                <div class="card-body">
                    <h6 class="card-title" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:14px!important;">Total Berdasarkan Status Pengajuan</h6>
                    <p class="text-muted">Data Tahun 2023</p>
                    <div id="apexPie"></div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:14px!important;">Total Berdasarkan Jenis Urusan Pengajuan</h6>
                        <p class="text-muted">Data Tahun 2023</p>
                        <div id="apexBar2"></div>
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
        series: <?php echo json_encode($totals); ?>,
        labels: <?php echo json_encode($statuses); ?>
    };

    var chart = new ApexCharts(document.querySelector("#apexPie"), options);
    chart.render();
</script>
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
            name: 'Pengajuan',
            data: <?php echo json_encode($totalss); ?>
        }],
        
        xaxis: {
            type: 'date',
            categories: <?php echo json_encode($years); ?>,
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

    var apexBarChart = new ApexCharts(document.querySelector("#apexBar"), options);
    apexBarChart.render();
</script>
<style>
    div#dataTableExample_filter {
        float : right!important;
    }
    div#dataTableExample_paginate {
        float : right!important;
    }

    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #132047;
        border-color: #132047;
    }

    section.informasi-publik {
        padding : 100px 0 ;
    }
    @media(max-width:678px){
        div#dataTableExample_filter {
            float : left!important;
            width: 100%;
            margin-bottom: 10px;
        }

        div#dataTableExample_filter label {
            width : 100%!important;
        }

        div#dataTableExample_length label {
            width : 100%;
        }
    }
  </style>
<script>
$(document).ready(function() {
    $('#dataTableExample').DataTable();
});
</script>
<script>
    var colors = {
        primary: '#038091',
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
            name: 'Pengajuan',
            data: <?php echo json_encode($urusan2); ?>
        }],
        
        xaxis: {
            type: 'text',
            categories: <?php echo json_encode($urusan1); ?>,
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

    var apexBarChart = new ApexCharts(document.querySelector("#apexBar2"), options);
    apexBarChart.render();
</script>
@endpush

