@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">User Setting</a></li>
    <li class="breadcrumb-item active" aria-current="page">User Level</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row pb-4">
            <div class="col-md-4">
                <h6 class="card-title align-self-center">Tambah Level User</h6>
                <form action="{{ route('user-level.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="namakategori" autocomplete="off" name="nama" placeholder="Nama Level Hak Akses">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Level</label>
                            <select name="level" class="form-control" id="">
                                <option value="1">Admin</option>
                                <option value="2">PKK</option>
                                <option value="2">Karang Taruna</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Tambah User Level</button>
                </form>
            </div>
            <div class="col-md-8">
                <h6 class="card-title align-self-center">Data Level User</h6>
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
                            <th>More Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @foreach ($leveluser as $data)
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#editkategori{{ $data->id}}"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                                <form action="{{ route('user-level.destroy', $data->id) }}" method="POST" id="delete_kategori" class="hapusremaja">
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
<!-- Edit Data Kategori -->
@foreach ($leveluser as $data)
<div class="modal fade bd-example-modal-lg remajaview" id="editkategori{{ $data->id }}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
        <div class="modal-header mb-2">
            <h4>Edit Level User {{ $data->nama }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <form action="{{ route('user-level.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="px-2">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Nama Level</label>
                    <input type="text" class="form-control" id="namakategori" autocomplete="off" value="{{$data->nama}}" name="nama" placeholder="Nama kategori">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Level</label>
                    <select name="level" class="form-control" id="">
                        <option value="1" {{ $data->level == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $data->level == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $data->level == '3' ? 'selected' : '' }}>3</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary me-2">Edit Level</button>
        </form>
    </div>
  </div>
</div>
@endforeach
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