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
  <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
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
@endpush