@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
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
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Jumlah Warga</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $warga }}</h3>
                <div class="d-flex align-items-baseline">
                  <h5>
                      Jiwa
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Jumlah Remaja</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $remaja }}</h3>
                <div class="d-flex align-items-baseline">
                  <h5>
                      Jiwa
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Jumlah Ibu Hamil</h6>
              <div class="dropdown mb-2">
                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                  <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">{{ $bumil }}</h3>
                <div class="d-flex align-items-baseline">
                  <h5>
                      Jiwa
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