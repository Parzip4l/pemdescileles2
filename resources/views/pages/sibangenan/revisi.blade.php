@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Sibangenen</a></li>
    <li class="breadcrumb-item active" aria-current="page">Semua Data</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h6 class="card-title mb-0">Usulan Permasalahan Dengan Status <span class="text-warning">Direvisi</span></h6>
        </div>  
        <div class="card-header-button-wrap p-2 pt-2">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('sibangenan') }}" class="btn btn-primary btn-md w-100">Semua Pengajuan</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('pengajuan-direvisi') }}" class="btn btn-warning btn-md w-100 text-white">Usulan Direvisi</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('pengajuan-ditolak') }}" class="btn btn-danger btn-md w-100">Usulan Ditolak</a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('pengajuan-perlu-divalidasi')}}" class="btn btn-success btn-md w-100">Validasi Usulan</a>
                </div>
            </div>
        </div>
        <div class="card-body">
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
                        <th>No</th>
                        <th>Nama Pemohon</th>
                        <th>Asal RW</th>
                        <th>Tanggal Dibuat</th>
                        <th>Permasalahan</th>
                        <th>Indikasi / Gagasan</th>
                        <th>Usul Ke</th>
                        <th>Status Pengajuan</th>
                        <th>More Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $nomor = 1;
                        @endphp
                        @foreach ($data as $data)
                    <tr>
                        <td>{{ $nomor++ }}</td>
                        <td>{{ $data->namapemohon}}</td>
                        <td>{{ $data->rw}}</td>
                        <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</td>
                        <td>{{ $data->permasalahan}}</td>
                        <td>{{ $data->usulan}}</td>
                        <td>{{ $data->nama_urusan}}</td>
                        <td>
                            <div class="@if($data->status_pengajuan == 'Ditolak') badge bg-danger @elseif($data->status_pengajuan == 'Disetujui') badge bg-success @else badge bg-warning @endif">
                                {{ $data->status_pengajuan}}
                            </div>
                        </td>
                        <td>
                        <div class="dropdown">
                                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#EditPengajuan{{ $data->id}}">
                                        <i data-feather="edit-2" class="icon-sm me-2"></i>
                                        <span class="">Edit</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#PengajuanDetail{{ $data->id}}">
                                        <i data-feather="eye" class="icon-sm me-2"></i>
                                        <span class="">View Detail</span>
                                    </a>
                                    @if($userLevel === 1)
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('setujui.usulan', $data->id) }}" onclick="event.preventDefault(); document.getElementById('setujui-usulan-form-{{ $data->id }}').submit();">
                                        <i data-feather="check" class="icon-sm me-2"></i>
                                        <span class="">Setujui Usulan</span>
                                    </a>
                                    
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#TolakPengajuan{{ $data->id}}">
                                        <i data-feather="x" class="icon-sm me-2"></i>
                                        <span class="">Tolak Usulan</span>
                                    </a>
                                    <!-- Add a hidden form to trigger the POST request -->
                                    <form id="setujui-usulan-form-{{ $data->id }}" action="{{ route('setujui.usulan', $data->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <form action="{{ route('sibangenan.destroy', $data->id) }}" method="POST" id="delete_sibangenan" class="sibangenandelete"> 
                                        @csrf @method('DELETE') 
                                        <a class="dropdown-item d-flex align-items-center" href="#" onClick="showDeleteDataDialog('{{ $data->id }}')">
                                            <i data-feather="trash" class="icon-sm me-2"></i>
                                            <span class="">Delete</span>
                                        </a>
                                    </form>
                                    @endif
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
<!-- Modal Buat Pengajuan -->
<div class="modal fade bd-example-modal-lg sibangenan" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Buat Pengajuan Baru</h4>
            <hr>
            <form class="forms-sample" action="{{ route('sibangenan.store') }}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama Pemohon</label>
                            <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" name="namapemohon" placeholder="Nama Pemohon" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Asal RW</label>
                            <select name="rw" id="" class="form-control" required>
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
                            <label for="exampleInputPassword1" class="form-label">Permasalahan</label>
                            <textarea name="permasalahan" id="" cols="15" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Alamat</label>
                            <textarea name="lokasi" id="" cols="15" rows="5" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Urusan</label>
                            <select name="urusan" class="form-control" id="" required>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Pembangunan">Pembangunan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Dokumen Pendukung</label>
                            <input type="file" class="form-control" name="dokumen_pendukung">
                            <p class="text-danger">Upload Dokumen Pendukung Dalam Bentuk Zip/Rar</p>
                            <input type="hidden" name="status_pengajuan" value="Diajukan">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Usulan</label>
                            <textarea name="usulan" id="" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2 w-100">Buat Pengajuan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush