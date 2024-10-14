@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('esip')}}">ESIP</a></li>
    <li class="breadcrumb-item active" aria-current="page">CATATAN IBU HAMIL, KELAHIRAN, KEMATIAN BAYI, DAN KEMATIAN IBU HAMIL, MELAHIRKAN/NIFAS</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="tambah-button-wrap mb-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".warga">Tambah Data</button>
        </div>
      </div>
      <div class="card-body">
         @if(session('success')) 
        <div class="alert alert-success">
            {{ session('success') }}
        </div> @endif @if (session('error')) 
        <div class="alert alert-danger">
            {{ session('error') }}
        </div> 
        @endif 
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Posyandu</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Nama Bayi</th>
                <th>Tanggal Lahir</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Data Warga -->
<div class="modal fade bd-example-modal-lg warga" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Tambah Data</h4>
            <hr>
            <form class="forms-sample" action="{{ route('warga.store') }}" method="POST" id="formWarga"> 
                @csrf
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label class="form-label">Posyandu</label>
                            <select name="posyandy" class="form-control" id="">
                                <option value="">Posyandu 1</option>
                                <option value="">Posyandu 2</option>
                                <option value="">Posyandu 3</option>
                                <option value="">Posyandu 4</option>
                                <option value="">Posyandu 5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" required>
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" required>
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Bayi</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap Bayi" name="nama_bayi" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Meninggal Ibu</label>
                            <input type="date" class="form-control" placeholder="Nama Lengkap Bayi" name="nama_bayi">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Meninggal Bayi</label>
                            <input type="date" class="form-control" name="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" id="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button typer="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script src="{{ asset('assets/js/data-table.js') }}"></script>
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
                const deleteUrl = "{{ route('warga.destroy', ':id') }}".replace(':id', id);
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
    $(document).ready(function () {
    $('#formWarga').on('submit', function (e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function () {
                Swal.fire({
                    title: 'Success',
                    text: 'Data Berhasil Disimpan!',
                    icon: 'success'
                }).then(function () {
                    window.location.href = "{{ route('warga.index') }}";
                });
            },
            error: function (xhr) {
                if (xhr.status === 422 && xhr.responseJSON.status === 'error') {
                    Swal.fire({
                        title: 'Error',
                        text: xhr.responseJSON.message,
                        icon: 'error'
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Gagal menyimpan data, NIK Sudah Terdaftar',
                        icon: 'error'
                    });
                }
            }
        });
    });
});
</script>
@endpush