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
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#EditPengajuan{{ $d->id}}">
                                            <i data-feather="eye" class="icon-sm me-2"></i>
                                            <span class="">Lihat Data</span>
                                        </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#EditPengajuan{{ $d->id}}">
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
    function showDeleteDataDialog(id) {
        Swal.fire({
            title: 'Hapus Data',
            text: 'Anda Yakin Akan Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform the delete action here (e.g., send a request to delete the data)
                // Menggunakan ID yang diteruskan sebagai parameter ke dalam URL delete route
                const deleteUrl = "{{ route('sibangenan.destroy', ':id') }}".replace(':id', id);
                fetch(deleteUrl, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                }).then((response) => {
                    // Handle the response as needed (e.g., show alert if data is deleted successfully)
                    if (response.ok) {
                        Swal.fire({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                        }).then(() => {
                            window.location.reload(); // Refresh halaman setelah menutup alert
                        });
                    } else {
                        // Handle error response if needed
                        Swal.fire({
                            title: 'Gagal Menghapus Data',
                            text: 'Terjadi kesalahan saat menghapus data.',
                            icon: 'error',
                        });
                    }
                }).catch((error) => {
                    // Handle fetch error if needed
                    Swal.fire({
                        title: 'Gagal Menghapus Data',
                        text: 'Terjadi kesalahan saat menghapus data.',
                        icon: 'error',
                    });
                });
            }
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#category').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $('#subcategory').prop('disabled', false);
                $.ajax({
                    url: '{{ route("subcategories.get") }}',
                    type: 'GET',
                    data: { category_id: category_id },
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategory').html('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory').append('<option value="' + value.name + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory').prop('disabled', true);
                $('#subcategory').html('<option value="">Select Category First</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#categoryedit').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $('#subcategoryedit').prop('disabled', false);
                $.ajax({
                    url: '{{ route("subcategories.get") }}',
                    type: 'GET',
                    data: { category_id: category_id },
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategoryedit').html('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subcategoryedit').append('<option value="' + value.name + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory').prop('disabled', true);
                $('#subcategory').html('<option value="">Select Category First</option>');
            }
        });
    });
</script>
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