@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('setting-page')}}">Pages Seting</a></li>
    <li class="breadcrumb-item active" aria-current="page">Urusan Sibangenan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row pb-4">
            <div class="col-md-4 mb-4">
                <h6 class="card-title align-self-center">Buat Kategori Tujuan Urusan</h6>
                <form action="{{ route('setting-urusan-sibangenan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="namakategori" autocomplete="off" name="nama" placeholder="Nama kategori" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="deskripsi" cols="30" rows="10" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Tambah Kategori Tujuan</button>
                </form>
            </div>
            <div class="col-md-8">
                <h6 class="card-title align-self-center">Data Tujuan Sibangenan</h6>
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
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @foreach ($data as $data)
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->keterangan }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#editkategori{{ $data->id}}"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                                <form action="{{ route('setting-urusan-sibangenan.destroy', $data->id) }}" method="POST" id="delete_kategori" class="hapusremaja">
                                                @csrf
                                                @method('DELETE')
                                                    <a class="dropdown-item d-flex align-items-center" href="#" onClick="DeleteKategoriBerita()"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                                </form>
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
    function DeleteKategoriBerita() {
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