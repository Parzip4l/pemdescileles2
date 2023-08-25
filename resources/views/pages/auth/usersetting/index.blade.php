@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">User Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Semua User</li>
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
                <h6 class="card-title align-self-center">Data User</h6>
            </div>
            <div class="col-md-6 text-right">
            <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#ModalUserTambah">Tambah User</a>
            </div>
        </div>
        
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>More Action</th>
              </tr>
            </thead>
            <tbody>
              @php 
              $nomor = 1;
              @endphp
              @foreach($user as $data)
              <tr>
                <td>{{$nomor++}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#ModalEditPass{{$data->id}}"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Ganti Password</span></a>
                                    <form action="{{ route('user-settings.destroy', $data->id) }}" method="POST" id="deleteBerita" class="hapusremaja">
                                    @csrf
                                    @method('DELETE')
                                        <a class="dropdown-item d-flex align-items-center" href="#" onClick="DeleteBerita()"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                    </form>
                            </div>
                    </div>
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
@endsection

<!-- Modal Tambah User -->
<div class="modal fade bd-example-modal-lg remaja" id="ModalUserTambah" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
        <h4 class="pb-2">Tambah Data User</h4>
        <hr>
        <form class="forms-sample" action="{{ route('user-settings.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" name="name" placeholder="Nama Lengkap" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="youremail@email.com" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="off" placeholder="Password" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Level</label>
                    <select name="level" class="form-control" id="">
                      @foreach($level as $data)
                      <option value="{{$data->level}}">{{$data->nama}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
        </div>
          <button type="submit" class="btn btn-primary me-2">Submit</button>    
        </form>
    </div>
  </div>
</div>

@foreach($user as $d)
<div class="modal fade bd-example-modal-lg remaja" id="ModalEditPass{{$d->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4">
        <h4 class="pb-2">Ganti Password Pemilik Akun Dengan Username {{$d->name}}</h4>
        <hr>
        <form class="forms-sample" action="{{ route('pass.update', $d->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="passwordInput" autocomplete="off" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="authCheck">
                        <label class="form-check-label" for="authCheck">
                            Show Password
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>    
        </form>
    </div>
  </div>
</div>
@endforeach

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
<script>
  const authCheck = document.getElementById('authCheck');
  const passwordInput = document.getElementById('passwordInput');

  authCheck.addEventListener('change', function() {
    if (authCheck.checked) {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });
</script>
@endpush