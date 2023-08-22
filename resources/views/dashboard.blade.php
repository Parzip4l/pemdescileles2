@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
  <style>
    .card .card-title {
      font-size: 12px!important;
    }
  </style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Selamat Datang Di Dashboard Cileles Smart</h4>
  </div>
</div>

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-success text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Jumlah Pengajuan</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-white pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="{{ url('sibangenan') }}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $sibangenan }}</h3>
                <div class="d-flex align-items-baseline">
                  <h5>
                      Pengajuan
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Pengajuan Perlu Di Review</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-white pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <a class="dropdown-item d-flex align-items-center" href="{{url('pengajuan-perlu-divalidasi')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $direview }}</h3>
                <div class="d-flex align-items-baseline">
                  <h5>
                      Pengajuan
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Pengajuan Direvisi</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-white pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                  <a class="dropdown-item d-flex align-items-center" href="{{ url('pengajuan-direvisi') }}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $direvisi }}</h3>
                <div class="d-flex align-items-baseline">
                  <h5>
                      Pengajuan
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-danger text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Pengajuan Ditolak</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-white pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                  <a class="dropdown-item d-flex align-items-center" href="{{ url('pengajuan-ditolak') }}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $ditolak }}</h3>
                <div class="d-flex align-items-baseline">
                  <h5>
                      Pengajuan
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->

<!-- sibangenan dashboard -->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:14px!important;">Total Pengajuan Berdasarkan Tahun</h6>
                <div id="apexBar"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:14px!important;">Total Berdasarkan Status Pengajuan</h6>
                <p class="text-muted">Data Tahun 2023</p>
                <div id="apexPie"></div>
            </div>
        </div>
    </div>
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
<div class="row">
  <div class="col-12 col-xl-12 grid-margin stretch-card">
    <div class="card overflow-hidden">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
          <h6 class="card-title mb-0">Data Remaja Tingkat RW</h6>
        </div>
        <div class="row mb-5 d-flex justify-content-between">
          <div class="col-md-6">
            <p class="text-muted tx-13 mb-3 mb-md-0">Data yang ditampilkan dalam chart merupakan data statistik atau hasil dari analisis terhadap data remaja yang telah terkumpul dari berbagai sumber. Data tersebut bisa mencakup berbagai informasi yang relevan dengan remaja, seperti usia, jenis kelamin, tingkat pendidikan, kesehatan, aktivitas sosial, dan lain sebagainya.</p>
          </div>
          <div class="col-md-6 text-right align-self-center">
            <a href="{{url('/sijamil')}}" class="btn btn-primary">Lihat Detail Data</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <canvas id="myChart" class="mb-5"></canvas>
          </div>
        </div>
        <!-- Bumil Chart -->
        <div class="databumilChart mt-2">
          <div class="row mb-5 d-flex justify-content-between">
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                  <h6 class="card-title mb-0">Data Ibu Hamil Tingkat RW</h6>
                </div>
              <p class="text-muted tx-13 mb-3 mb-md-0">Data yang ditampilkan dalam chart merupakan data statistik atau hasil dari analisis terhadap data Ibu Hamil yang telah terkumpul dari berbagai sumber. Data tersebut bisa mencakup berbagai informasi yang relevan dengan Ibu Hamil, seperti usia, jenis kelamin, tingkat pendidikan, kesehatan, aktivitas sosial, dan lain sebagainya.</p>
            </div>
            <div class="col-md-6 text-right align-self-center">
              <a href="{{url('/sijamil')}}" class="btn btn-primary">Lihat Detail Data</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <canvas id="ChartBumil"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/chartjs/chart.umd.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/chartjs.js') }}"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: @json($dataremaja),
    options: {
        // Customize chart options here as needed
    }
});
</script>
<script>
    var ctx = document.getElementById('ChartBumil').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: @json($databumil),
        options: {
            // Customize chart options here as needed
        }
    });
</script>
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

<script>
    var colors = {
        primary: '#008FFB',
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