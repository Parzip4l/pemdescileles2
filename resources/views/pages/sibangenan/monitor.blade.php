@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Sibangenen</a></li>
    <li class="breadcrumb-item active" aria-current="page">Semua Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title mb-0">Usulan Permasalahan</h6>
        </div>  
        <div class="card-header-button-wrap p-2 pt-2">
            <div class="row">
                <div class="col-md-3">
                    <a href="" class="btn btn-primary btn-md w-100"> Pengajuan</a>
                </div>
                <div class="col-md-3">
                    <a href="" class="btn btn-warning btn-md w-100"> Monitor</a>
                </div>
                <div class="col-md-3">
                    <a href="" class="btn btn-danger btn-md w-100"> Usulan Ditolak</a>
                </div>
                <div class="col-md-3">
                    <a href="" class="btn btn-success btn-md w-100"> Buat Pengajuan</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Dibuat</th>
                        <th>Permasalahan</th>
                        <th>Indikasi / Gagasan</th>
                        <th>Alamat</th>
                        <th>Catatan</th>
                        <th>Status Pengajuan</th>
                        <th>More Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush