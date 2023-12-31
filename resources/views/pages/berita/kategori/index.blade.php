@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Berita</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kategori Berita</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row pb-4">
            <div class="col-md-4">
                <h6 class="card-title align-self-center">Buat Kategori Berita</h6>
                <form action="{{ route('kategoriberita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="namakategori" autocomplete="off" name="kategori" placeholder="Nama kategori">
                            <input type="hidden" class="form-control" id="namakategori" autocomplete="off" name="parent_kategori" value="Berita" placeholder="Nama kategori">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Tambah Kategori</button>
                </form>
            </div>
            <div class="col-md-8">
                <h6 class="card-title align-self-center">Data Kategori Berita</h6>
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
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>More Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            @foreach ($kategori as $data)
                        <tr>
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $data->kategori }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#editkategori{{ $data->id}}"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                                <form action="{{ route('kategoriberita.destroy', $data->id) }}" method="POST" id="delete_kategori" class="hapusremaja">
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
@foreach ($kategori as $data)
<div class="modal fade bd-example-modal-lg remajaview" id="editkategori{{ $data->id }}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
        <div class="modal-header mb-2">
            <h4>Edit Kategori Berita {{ $data->nama }}</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
        </div>
        <form action="{{ route('kategoriberita.update', $data->id) }}" method="POST" enctype="multipart/form-data" class="px-2">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" id="namakategori" autocomplete="off" value="{{$data->kategori}}" name="kategori" placeholder="Nama kategori">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{$data->deskripsi}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary me-2">Edit Kategori</button>
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