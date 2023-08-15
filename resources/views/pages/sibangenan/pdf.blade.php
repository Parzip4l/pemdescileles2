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
                        <div class="col-lg-12 d-flex justify-content-between">
                            <div class="wrap-head">
                                <img src="{{asset('assets/images/logobaru.png')}}" alt="">
                            </div>
                            <div class="text">
                                <p class="text-center" style="font-weight:300;">Data Pengajuan Pembangunan Tahun 2023</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="container-fluid mt-5 w-100">
                        <div class="row">
                            <div class="col-md-12 ms-auto">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Nama Pemohon</th>
                                                <th>Asal RW</th>
                                                <th>Permasalahan</th>
                                                <th>Indikasi / Gagasan</th>
                                                <th>Lokasi</th>
                                                <th>Usul Ke</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sibangenan as $d)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($d->created_at)->format('d M Y') }}</td>
                                                <td>{{ $d->namapemohon}}</td>
                                                <td>{{ $d->rw}}</td>
                                                <td>{{ $d->permasalahan}}</td>
                                                <td>{{ $d->lokasi}}</td>
                                                <td>{{ $d->usulan}}</td>
                                                <td>{{ $d->nama_urusan}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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