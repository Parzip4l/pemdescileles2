@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Setting Page</a></li>
    <li class="breadcrumb-item"><a href="#">Jajaran Kepengurusan Desa Cileles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Kepengurusan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h6 class="card-title mb-0 align-self-center">Data Kepengurusan Desa Cileles</h6>
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
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php 
              $nomor = 1;
              @endphp
              @foreach($pengurus as $data)
              <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jabatan }}</td>
                <td>
                  <div class="dropdown">
                      <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target=".pengurus{{ $data->id }}">
                              <i data-feather="edit-2" class="icon-sm me-2"></i>
                              <span class="">Edit</span>
                          </a>
                          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target=".pengurusview{{ $data->id }}">
                              <i data-feather="eye" class="icon-sm me-2"></i>
                              <span class="">View Detail</span>
                          </a>
                          <form action="{{ route('pengurus.destroy', $data->id) }}" method="POST" id="delete_warga">
                                @csrf
                                @method('DELETE')
                                  <a class="dropdown-item d-flex align-items-center" href="#" onClick="showDeleteDataDialog()">
                                  <i data-feather="trash" class="icon-sm me-2"></i>
                                  <span class="">Delete</span>
                              </a>
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
<!-- Modal Add Data Warga -->
<div class="modal fade bd-example-modal-lg warga" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Edit Data Pengurus</h4>
            <hr>
            <form class="forms-sample" action="{{ route('pengurus.store') }}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="number" class="form-control" placeholder="NIP" name="nip" required>
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jk" id="" class="form-control" required>
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Status Perkawinan</label>
                            <select name="status_perkawinan" id="" class="form-control" required>
                                <option value="1">Kawin</option>
                                <option value="2">Belum Kawin</option>
                                <option value="3">Cerai Hidup</option>
                                <option value="4">Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button typer="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
@foreach ($pengurus as $data)
<div class="modal fade bd-example-modal-lg pengurus{{$data->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Tambah Data Pengurus</h4>
            <hr>
            <form class="forms-sample" action="{{ route('pengurus.update', $data->id ) }}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="number" class="form-control" placeholder="NIP" value="{{$data->nip}}" name="nip" required>
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" value="{{$data->nama}}" name="nama" required>
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" value="{{$data->jabatan}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jk" id="" class="form-control" required>
                                <option value="LAKI-LAKI" {{ $data->jk == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                                <option value="PEREMPUAN" {{ $data->jk == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required value="{{ $data->tempat_lahir }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" required value="{{ $data->tanggal_lahir }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Status Perkawinan</label>
                            <select name="status_perkawinan" id="" class="form-control" required>
                                <option value="KAWIN" {{ $data->status_perkawinan == 'KAWIN' ? 'selected' : '' }}>KAWIN</option>
                                <option value="BELUM KAWIN" {{ $data->status_perkawinan == 'BELUM KAWIN' ? 'selected' : '' }}>BELUM KAWIN</option>
                                <option value="CERAI HIDUP" {{ $data->status_perkawinan == 'CERAI HIDUP' ? 'selected' : '' }}>CERAI HIDUP</option>
                                <option value="CERAI MATI" {{ $data->status_perkawinan == 'CERAI MATI' ? 'selected' : '' }}>CERAI MATI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button typer="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal View Data Pengurus -->
@foreach ($pengurus as $data)
<div class="modal fade bd-example-modal-lg pengurusview{{$data->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Detail Data Pengurus</h4>
            <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">NIP</label>
                            <input type="number" class="form-control" placeholder="NIP" value="{{$data->nip}}" name="nip" disabled >
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" value="{{$data->nama}}" name="nama" disabled>
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jabatan</label>
                            <input type="text" class="form-control" placeholder="Jabatan" name="jabatan" value="{{$data->jabatan}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jk" id="" class="form-control" disabled>
                                <option value="LAKI-LAKI" {{ $data->jk == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                                <option value="PEREMPUAN" {{ $data->jk == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" disabled value="{{ $data->tempat_lahir }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" disabled value="{{ $data->tanggal_lahir }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Status Perkawinan</label>
                            <select name="status_perkawinan" id="" class="form-control" disabled>
                                <option value="KAWIN" {{ $data->status_perkawinan == 'KAWIN' ? 'selected' : '' }}>KAWIN</option>
                                <option value="BELUM KAWIN" {{ $data->status_perkawinan == 'BELUM KAWIN' ? 'selected' : '' }}>BELUM KAWIN</option>
                                <option value="CERAI HIDUP" {{ $data->status_perkawinan == 'CERAI HIDUP' ? 'selected' : '' }}>CERAI HIDUP</option>
                                <option value="CERAI MATI" {{ $data->status_perkawinan == 'CERAI MATI' ? 'selected' : '' }}>CERAI MATI</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <img src="{{ asset('images/' .$data->foto) }}" alt="">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
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
    function showDeleteDataDialog() {
        Swal.fire({
            title: 'Hapus Data',
            text: 'Anda Yakin Akan Menghapus Data Pengurus Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform the delete action here (e.g., send a request to delete the data)
                document.getElementById("delete_warga").submit();
            }
        });
    }
</script>
@endpush