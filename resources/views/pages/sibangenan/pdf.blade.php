<!DOCTYPE html>
<html>
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="{{ asset('css/fonts.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <style>
    body {
        font-family : "Roboto", Helvetica, sans-serif;
    }

    .main-wrapper {
        background-color : #fff!important;
    }

    .f400 {
        font-weight : 300;
        font-size : 16px;
    }

    .mb-1 {
        margin-bottom : 20px!important;
    }

    td {
        font-size : 14px!important;
        margin-bottom : 10px!important;
    }
  </style>
</head>
<body>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="wrap-head text-center">
                                    <img src="{{asset('assets/images/logobaru.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text">
                                    <p class="text-center" style="font-weight:300;">Data Pengajuan Pembangunan Tahun 2023</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                    @foreach ($sibangenan as $d)
                        <div class="pdf-item mb-4">
                            <strong>Tanggal Pengajuan:</strong> {{ \Carbon\Carbon::parse($d->created_at)->format('d M Y') }}<br>
                            <strong>Nama Pemohon:</strong> {{ $d->namapemohon }}<br>
                            <strong>Asal RW:</strong> {{ $d->rw }}<br>
                            <strong>Permasalahan:</strong> {{ $d->permasalahan }}<br>
                            <strong>Indikasi / Gagasan:</strong> {{ $d->indikasi_gagasan }}<br>
                            <strong>Lokasi:</strong> {{ $d->lokasi }}<br>
                            <strong>Bidang:</strong> {{ $d->usul_ke }}
                        </div>
                    @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
</body>
</html>