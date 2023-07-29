@extends('layout.master') @push('plugin-styles')
<link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" /> @endpush @section('content') <nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Cileles Smart</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Si Jamil</li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">Data Remaja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="false">Data Ibu Hamil</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content border border-top-0 p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> @if(session('success')) <div class="alert alert-success">
                        {{ session('success') }}
                    </div> @endif @if (session('error')) <div class="alert alert-danger">
                        {{ session('error') }}
                    </div> @endif <div class="tambah-button-wrap mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".remaja">Tambah Data</button>
                    </div>
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Jenis Kelamin</th>
                                <th>RW</th>
                                <th>RT</th>
                                <th>More Action</th>
                            </tr>
                        </thead>
                        <tbody> @php $nomor = 1; @endphp @foreach ($remaja as $data) <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->usia }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->rw }}</td>
                                <td>{{ $data->rt }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item d-flex align-items-center" href="{{ route('sijamil.edit', $data->id) }}">
                                                <i data-feather="edit-2" class="icon-sm me-2"></i>
                                                <span class="">Edit</span>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#viewModal{{ $data->id }}">
                                                <i data-feather="eye" class="icon-sm me-2"></i>
                                                <span class="">View Detail</span>
                                            </a>
                                            <form action="{{ route('sijamil.destroy', $data->id) }}" method="POST" id="delete_remaja" class="hapusremaja"> @csrf @method('DELETE') <a class="dropdown-item d-flex align-items-center" href="#" onClick="showDeleteDataDialog()">
                                                    <i data-feather="trash" class="icon-sm me-2"></i>
                                                    <span class="">Delete</span>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr> @endforeach </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> @if(session('success')) <div class="alert alert-success">
                        {{ session('success') }}
                    </div> @endif @if (session('error')) <div class="alert alert-danger">
                        {{ session('error') }}
                    </div> @endif <div class="tambah-button-wrap mb-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bumil">Tambah Data</button>
                    </div>
                    <table id="dataTablesIbuhamil" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Usia</th>
                                <th>Tanggal Perkiraan Lahir</th>
                                <th>Golongan Darah</th>
                                <th>Tanggal Kontrol Terakhir</th>
                                <th>More Action</th>
                            </tr>
                        </thead>
                        <tbody> @php $nomor = 1; @endphp @foreach ($bumil as $data) <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->usia }}</td>
                                <td>{{ $data->tanggal_perkiraan_lahir }}</td>
                                <td>{{ $data->golongan_darah }}</td>
                                <td>{{ $data->tanggal_kunjungan_terakhir }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item d-flex align-items-center" href="{{ route('bumil.edit', $data->id) }}">
                                                <i data-feather="edit-2" class="icon-sm me-2"></i>
                                                <span class="">Edit</span>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#bumildatadetail{{ $data->id}}">
                                                <i data-feather="eye" class="icon-sm me-2"></i>
                                                <span class="">View Detail</span>
                                            </a>
                                            <form action="{{ route('bumil.destroy', $data->id) }}" method="POST" id="delete_bumil" class="hapusremaja"> @csrf @method('DELETE') <a class="dropdown-item d-flex align-items-center" href="#" onClick="DeleteBumilDialog()">
                                                    <i data-feather="trash" class="icon-sm me-2"></i>
                                                    <span class="">Delete</span>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr> @endforeach </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Data -->
<div class="modal fade bd-example-modal-lg remaja" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Tambah Data Remaja</h4>
            <hr>
            <form class="forms-sample" action="{{ route('sijamil.store') }}" method="POST"> @csrf <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">NIK</label>
                            <input type="number" class="form-control" id="exampleInputUsername1" autocomplete="off" name="nik" placeholder="NIK">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor KK</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Nomor KK" name="nomorkk">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="nama" autocomplete="off" placeholder="Nama Lengkap">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Usia</label>
                            <input type="number" class="form-control" id="exampleInputUsername1" autocomplete="off" name="usia" placeholder="Usia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="">
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" id="exampleInputPassword1" autocomplete="off" name="nomor_telepon" placeholder="nomortelpeon">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RT</label>
                            <select name="rt" class="form-control" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RW</label>
                            <select name="rw" class="form-control" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" name="nama_ayah" placeholder="Nama Ayah">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" name="nama_ibu" placeholder="Nama Ibu">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- View Modal Remaja --> @foreach ($remaja as $data) <div class="modal fade bd-example-modal-lg remajaview" id="viewModal{{ $data->id }}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h4>Detail Data {{ $data->nama }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-data-view-remaja p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">NIK</label>
                            <p>{{ $data->nik }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nomor KK</label>
                            <p>{{ $data->nomorkk }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama</label>
                            <p>{{ $data->nama }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Usia</label>
                            <p>{{ $data->usia }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                            <p>{{ $data->jenis_kelamin }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                            <p>{{ $data->nomor_telepon }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RT</label>
                            <p>{{ $data->rt }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RW</label>
                            <p>{{ $data->rw }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama Ayah</label>
                            <p>{{ $data->nama_ayah }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nama Ibu</label>
                            <p>{{ $data->nama_ibu }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> @endforeach
<!-- Modal Add Data Bumil -->
<div class="modal fade bd-example-modal-lg bumil" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Tambah Data Ibu Hamil</h4>
            <hr>
            <form class="forms-sample" action="{{ route('bumil.store') }}" method="POST"> @csrf <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="number" class="form-control" placeholder="NIK" name="nik">
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor KK</label>
                            <input type="number" class="form-control" placeholder="Nomor Kartu Keluarga" name="nomorkk">
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Usia</label>
                            <input type="text" class="form-control" placeholder="Usia" name="usia">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RT</label>
                            <select name="rt" class="form-control" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RW</label>
                            <select name="rw" class="form-control" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir Ibu Hamil</label>
                            <input type="date" class="form-control" placeholder="Nama Lengkap" name="tanggal_lahir">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Perkiraan Kelahiran</label>
                            <input type="date" class="form-control" placeholder="Usia" name="tanggal_perkiraan_lahir">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Golongan Darah</label>
                            <select name="golongan_darah" id="" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Riwayat Kesehatan</label>
                            <input type="text" class="form-control" placeholder="Riwayat Kesehatan" name="riwayat_kesehatan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Suami</label>
                            <input type="text" class="form-control" placeholder="Nama Suami" name="nama_suami">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon Suami</label>
                            <input type="number" class="form-control" placeholder="Nomor Telepon Suami" name="nomor_telepon_suami">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Kontrol Terakhir</label>
                    <input type="date" class="form-control" placeholder="Usia" name="tanggal_kunjungan_terakhir">
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button typer="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </div>
</div>
<!-- Modal View Details Data Bumil --> @foreach ($bumil as $data) <div class="modal fade bd-example-modal-lg bumil" id="bumildatadetail{{ $data->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h4>Detail Data Ibu Hamil {{ $data->nama}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="data-detail-ibuhamil p-4">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <p>{{ $data->nik }}</p>
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor KK</label>
                            <p>{{ $data->nomorkk }}</p>
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <p>{{ $data->nama }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Usia</label>
                            <p>{{ $data->usia }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RT</label>
                            <p>{{ $data->rt }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RW</label>
                            <p>{{ $data->rw }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir Ibu Hamil</label>
                            <p>{{ $data->tanggal_lahir }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Perkiraan Kelahiran</label>
                            <p>{{ $data->tanggal_perkiraan_lahir }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Golongan Darah</label>
                            <p>{{ $data->golongan_darah }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Riwayat Kesehatan</label>
                            <p>{{ $data->riwayat_kesehatan }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Suami</label>
                            <p>{{ $data->nama_suami }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon Suami</label>
                            <p>{{ $data->nomor_telepon_suami }}</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Kontrol Terakhir</label>
                    <p>{{ $data->tanggal_kunjungan_terakhir }}</p>
                </div>
            </div>
            </form>
        </div>
    </div>
</div> 
@endforeach @endsection 
@push('plugin-scripts') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush
@push('custom-scripts') 
<script src="{{ asset('assets/js/data-table.js') }}"></script>
<script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
<script>
    $(function() {
        'use strict';
        $(function() {
            $('#dataTablesIbuhamil').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
            });
            $('#dataTablesIbuhamil').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
            });
        });
    });
    // Delete Form
    function hapusForm() {
        document.getElementById("delete_remaja").submit();
    }
</script>
<!-- Delete Remaja -->
<script>
    function showDeleteDataDialog() {
        Swal.fire({
            title: 'Hapus Data',
            text: 'Anda Yakin Akan Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform the delete action here (e.g., send a request to delete the data)
                document.getElementById("delete_remaja").submit();
            }
        });
    }
</script>
<!-- Delete Bumil -->
<script>
    function DeleteBumilDialog() {
        Swal.fire({
            title: 'Hapus Data',
            text: 'Anda Yakin Akan Menghapus Data Ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Delete',
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform the delete action here (e.g., send a request to delete the data)
                document.getElementById("delete_bumil").submit();
            }
        });
    }
</script> 
@endpush