@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Semua Kegiatan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row pb-4">
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
            <div class="col-md-6">
                <h6 class="card-title align-self-center">Data Kegiatan</h6>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ url('kegiatan/create') }}" class="btn btn-md btn-primary">Buat Kegiatan</a>
            </div>
        </div>
        
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Tanggal Kegiatan</th>
                <th>Lokasi</th>
                <th>Kategori</th>
                <th>Keterangan Singkat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @php
            $nomor = 1;
            @endphp
            @foreach ($data as $d)
              <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $d->judul }}</td>
                <td>{{ $d->tanggal_kegiatan }}</td>
                <td>{{ $d->lokasi }}</td>
                <td>{{ $d->kategori }}</td>
                <td>{!! $d->keterangan_singkat !!}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('kegiatan.edit', $d->id) }}"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#bumildatadetail{{ $d->id}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View Detail</span></a>
                                    <form action="{{ route('kegiatan.destroy', $d->id) }}" method="POST" id="deleteBerita" class="hapusremaja">
                                    @csrf
                                    @method('DELETE')
                                        <a class="dropdown-item d-flex align-items-center" href="#" onClick="DeleteBerita()"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
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
    function DeleteBerita() {
        Swal.fire({
            title: 'Hapus Berita',
            text: 'Anda Yakin Akan Menghapus Berita Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
            // Perform the delete action here (e.g., send a request to delete the data)
                document.getElementById("deleteBerita").submit();
            }
        });
    }
</script>
@endpush