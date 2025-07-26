@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Sibangenen</a></li>
    <li class="breadcrumb-item"><a href="#">Data Realiasi</a></li>
    <li class="breadcrumb-item active" aria-current="page">Semua Data</li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6 class="card-title mb-0 align-self-center">Data Realisasi Sibangenan</h6>
            </div>  
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="year_filter" class="form-label">Filter Berdasarkan Tahun :</label>
                            <select class="form-select" id="year_filter">
                                <option value="">Semua Data</option>
                                @php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 5;
                                    $endYear = $currentYear + 2;
                                @endphp
                                @for ($year = $endYear; $year >= $startYear; $year--)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Nama Pemohon</th>
                            <th>Bidang Urusan</th>
                            <th>Status Realiasi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $nomor = 1;
                                $userLevel = Auth::user()->level;
                            @endphp
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ \Carbon\Carbon::parse($d->created_at)->format('d M Y') }}</td>
                                    <td>{{ $d->namapemohon}}</td>
                                    <td>{{ $d->nama_urusan}}</td>
                                    <td> 
                                        @if($d->realisasi_id)
                                            <span class="badge bg-success">Data Tersedia</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Belum Tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#detailsRealisasi{{ $d->id}}">
                                                    <i data-feather="eye" class="icon-sm me-2"></i>
                                                    <span class="">Lihat Data</span>
                                                </a>
                                                @if($d->realisasi_id)
                                                <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#detailsRealisasi{{ $d->id}}">
                                                    <i data-feather="edit" class="icon-sm me-2"></i>
                                                    <span class="">Edit Data Realisasi</span>
                                                </a>
                                                @endif
                                                <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#UploadDetails{{ $d->id}}">
                                                    <i data-feather="upload" class="icon-sm me-2"></i>
                                                    <span class="">Upload Data Realisasi</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal Upload Data Realisasi -->
        @foreach ($data as $d) 
            <div class="modal fade bd-example-modal-lg bumil" id="UploadDetails{{ $d->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-4">
                        <div class="modal-header">
                            <h4>Upload Data Realisasi</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('realisasi.store')}}" method="POST" enctype="multipart/form-data" class="">
                                @csrf
                                <input type="hidden" name="pengajuan_id" value="{{ $d->id }}">

                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal Realisasi</label>
                                    <input type="number" name="nominal" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Upload Bukti Realisasi (PDF)</label>
                                    <input type="file" name="file" class="form-control" accept="application/pdf" required>
                                </div>

                                <button type="submit" class="btn btn-success">Upload</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div> 
        @endforeach

        <!-- Modal Lihat Realisasi -->
         @foreach ($data as $d) 
            <div class="modal fade bd-example-modal-lg bumil" id="detailsRealisasi{{ $d->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-4">
                        <div class="modal-header">
                            <h4>Data Realisasi {{$d->nama_urusan}}</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            @if($d->realisasi_id)
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Tanggal Pengajuan</label>
                                    <input type="text" name="nominal" class="form-control" required value="{{ \Carbon\Carbon::parse($d->created_at)->format('d M Y') }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Permasalahan</label>
                                    <input type="text" name="nominal" class="form-control" required value="{{ $d->permasalahan}}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Usulan</label>
                                    <textarea name="" class="form-control" id="">{{$d->usulan}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="nominal" class="form-label">Nominal Realisasi</label>
                                    <input type="text" name="nominal" class="form-control" required value="Rp {{ number_format($d->nominal_realisasi, 0, ',', '.') }}" readonly>
                                    <strong class="mt-1"><h5 class="mt-2"><i> {{ terbilang($d->nominal_realisasi) }} Rupiah</h5></strong>
                                </div>

                                @if($d->file_realisasi)
                                    <a href="{{route('realisasi.pdf', $d->realisasi_id)}}" target="_blank" class="btn btn-primary">
                                        Lihat File Realisasi (PDF)
                                    </a>
                                @endif
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div> 
        @endforeach
    </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            var dataTable = $('#dataTableExample').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
            });

            // Tangani perubahan filter tahun
            $('#year_filter').on('change', function() {
                var year = $(this).val();
                dataTable.column(1).search(year, true, false).draw();
            });
        });
    </script>
@endpush