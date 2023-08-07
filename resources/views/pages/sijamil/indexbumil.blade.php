@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Sijamil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Remaja</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title align-self-center mb-0">Semua Data Ibu Hamil</h6>
        </div>
      <div class="card-body">
        <div class="row pb-4">
            <div class="col-md-12">
                
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
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Usia</th>
                            @if(Auth::check() && Auth::user()->level == 1)
                            <th>More Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $nomor = 1;
                            @endphp
                            @foreach ($bumil as $data)
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->usia }} Tahun</td>
                            @if(Auth::check() && Auth::user()->level == 1)
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item d-flex align-items-center" href="{{ route('sijamil.edit', $data->id) }}" ><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                                <form action="{{ route('sijamil.destroy', $data->id) }}" method="POST" id="delete_kategori" class="hapusremaja">
                                                @csrf
                                                @method('DELETE')
                                            <a class="dropdown-item d-flex align-items-center" href="#" onClick="DeleteDataRemaja()"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                                </form>
                                        </div>
                                </div>
                            </td>
                            @endif
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
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
  <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
  <script>
    function DeleteDataRemaja() {
        Swal.fire({
            title: 'Hapus Data',
            text: 'Anda Yakin Akan Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
            // Perform the delete action here (e.g., send a request to delete the data)
                document.getElementById("delete_kategori").submit();
            }
        });
    }
</script>
@endpush