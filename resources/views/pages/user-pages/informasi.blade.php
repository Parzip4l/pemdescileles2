@extends('layout.masteruser2')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  
@endpush

@section('content')
<section class="page-title">
    <div class="auto-container">
        <div class="content">
            <h2>Download Informasi Publik</h2>
        </div>
    </div>
</section>
<section class="informasi-publik">
    <div class="container">
        <div class="">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Publikasi</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php 
                            $nomer = 1;
                        @endphp
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $nomer++ }}</td>
                                <td>{{ $d->judul }}</td>
                                <td>{{ $d->created_at->format('d M Y')}}</td>
                                <td><a href="{{ route('informasi.download', $d->id) }}" class="btn btn-primary" style="background-color:#132047!important; border-color:#132047!important;"><i class="fa fa-download"></i> Download</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
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
  </style>
<script>
$(document).ready(function() {
    $('#dataTableExample').DataTable();
});
</script>
@endpush

