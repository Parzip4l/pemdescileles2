@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Warga</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Warga</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <h6 class="card-title mb-0 align-self-center">Data Warga Desa Cileles</h6>
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
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>RW</th>
                <th>RT</th>
                <th>Agama</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php 
              $nomor = 1;
              @endphp
              @foreach($warga as $data)
              <tr>
                <td>{{ $nomor++ }}</td>
                <td>{{ $data->nama }}</td>
                <td>
                    @if($data->jk == 1)
                        LAKI-LAKI
                    @elseif($data->jk == 2)
                        PEREMPUAN
                    @endif
                </td>
                <td>{{ $data->rw }}</td>
                <td>{{ $data->rt }}</td>
                <td>
                    @if($data->agama == 1)
                        ISLAM
                    @elseif($data->agama == 2)
                        KRISTEN
                    @elseif($data->agama == 3)
                        KATHOLIK
                    @elseif($data->agama == 4)
                        HINDU
                    @elseif($data->agama == 5)
                        BUDHA
                    @endif
                </td>
                <td>
                  <div class="dropdown">
                      <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="#">
                              <i data-feather="edit-2" class="icon-sm me-2"></i>
                              <span class="">Edit</span>
                          </a>
                          <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#viewModal{{ $data->id }}">
                              <i data-feather="eye" class="icon-sm me-2"></i>
                              <span class="">View Detail</span>
                          </a>
                          <form action="{{ route('warga.destroy', $data->id) }}" method="POST" id="delete_warga">
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
            <h4 class="pb-2">Tambah Data Warga</h4>
            <hr>
            <form class="forms-sample" action="{{ route('warga.store') }}" method="POST"> 
                @csrf 
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="number" class="form-control" placeholder="NIK" name="nik" required>
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor KK</label>
                            <input type="number" class="form-control" placeholder="Nomor Kartu Keluarga" name="nokk" required>
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Hubungan KK</label>
                            <select name="hubungankk" id="" class="form-control" required>
                                <option value="1">Kepala Keluarga</option>
                                <option value="2">Istri</option>
                                <option value="3">Anak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RT</label>
                            <select name="rt" class="form-control" id="" required>
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
                            <select name="rw" class="form-control" id="" required>
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
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jk" id="" class="form-control" required>
                                <option value="1">LAKI-LAKI</option>
                                <option value="2">PEREMPUAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <select name="agama" id="" class="form-control" required>
                                <option value="1">ISLAM</option>
                                <option value="2">KRISTEN</option>
                                <option value="3">KATHOLIK</option>
                                <option value="4">HINDU</option>
                                <option value="5">BUDHA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Golongan Darah</label>
                            <select name="golongan_darah" id="" class="form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Pendidikan</label>
                            <select name="pendidikan" id="" class="form-control" required>
                                <option value="1">Tidak Sekolah</option>
                                <option value="2">Tidak Tamat SD/Sederajat</option>
                                <option value="3">Tamat SD/Sederajat</option>
                                <option value="4">Tidak Tamat SMP/Sederajat</option>
                                <option value="5">Tamat SMP/Sederajat</option>
                                <option value="6">Tidak Tamat SMA/Sederajat</option>
                                <option value="7">Tamat SMA/Sederajat</option>
                                <option value="8">Tamat Perguruan Tinggi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Pekerjaan</label>
                            <select name="pekerjaan" id="" class="form-control" required>
                                <option value="1">Tidak/Belum Bekerja</option>
                                <option value="2">Petani</option>
                                <option value="3">Nelayan</option>
                                <option value="4">Pedagang</option>
                                <option value="5">Pejabat Negara</option>
                                <option value="6">PNS/TNI/POLRI</option>
                                <option value="7">Pegawai Swasta</option>
                                <option value="8">Wiraswasta</option>
                                <option value="9">Pensiunan</option>
                                <option value="10">Pekerja Lepas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" placeholder="Bandung" name="tempat_lahir" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" placeholder="09/02/2000" name="tanggal_lahir" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Status Perkawinan</label>
                            <select name="statusperkawinan" id="" class="form-control" required>
                                <option value="1">Kawin</option>
                                <option value="2">Belum Kawin</option>
                                <option value="3">Cerai Hidup</option>
                                <option value="4">Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" placeholder="0812XXXXX" name="nomortelepon" required>
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
    function showDeleteDataDialog() {
        Swal.fire({
            title: 'Hapus Data',
            text: 'Anda Yakin Akan Menghapus Data Warga Ini?',
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