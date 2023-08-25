@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item active" aria-current="page">Kritik & Saran</li>
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
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>More Action</th>
              </tr>
            </thead>
            <tbody>
              @php 
              $nomor = 1;
              @endphp
              @foreach($kritik as $data)
              <tr>
                <td>{{$nomor++}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->nohp}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#KritikDetail{{ $data->id}}">Lihat Detail</a>
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

<!-- Modal -->
@foreach ($kritik as $d) 
<div class="modal fade bd-example-modal-lg bumil" id="KritikDetail{{ $d->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h4>Detail Kritik & Saran</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="detail-pengajuan-sibangenan p-4">
                <div class="row mb-4">
                    <div class="col-md-6">                        
                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('nama', $d->nama) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">                        
                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('nohp', $d->nohp) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Kritik /  Saran</label>
                            <textarea name="kritik" id="" class="form-control" cols="30" rows="10" disabled>{{ $d->kritik}}</textarea>
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