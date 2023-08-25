@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">User Activity</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Activity</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Action</th>
                <th>On Features</th>
                <th>Date Time</th>
                <th>More Action</th>
              </tr>
            </thead>
            <tbody>
              @php 
              $nomor = 1;
              @endphp
              @foreach($logs as $data)
              <tr>
                <td>{{$nomor++}}</td>
                <td>{{$data->user_name}}</td>
                <td><span class="{{ $data->action == 'Delete' ? 'badge bg-danger' : ($data->action == 'Create' ? 'badge bg-success' : 'badge bg-warning') }}">{{$data->action}}</span></td>
                <td>{{$data->model}}</td>
                <td>{{$data->created_at}}</td>
                <td>
                    <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#UserActivity{{ $data->id }}">Lihat Detail</a>
                </td>
                @endforeach
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail User Activity -->
@foreach ($logs as $d) 
<div class="modal fade bd-example-modal-lg" id="UserActivity{{ $d->id }}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h4>Detail User Activity</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="detail-pengajuan-sibangenan p-4">
                <div class="row mb-4">
                    <div class="col-md-4">                        
                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('user_name', $d->user_name) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">                        
                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Action</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('action', $d->action) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-4">                        
                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Model</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('model', $d->model) }}" required disabled>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Data Lama</label>
                            <textarea name="kritik" id="" class="form-control" cols="30" rows="10" disabled>{{ $d->old_values }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Data Baru</label>
                            <textarea name="kritik" id="" class="form-control" cols="30" rows="10" disabled>{{ $d->new_values }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endforeach

@endsection

<!-- Modal Tambah User -->
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
            title: 'Hapus User',
            text: 'Anda Yakin Akan Menghapus User Ini?',
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