@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
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
        <div class="card-header d-flex justify-content-between">
            <h6 class="card-title mb-0 align-self-center">Usulan Pembangunan</h6>
            <div class="col-md-6 d-flex">
                <a href="#" class="btn btn-primary btn-md w-100 me-2" data-bs-toggle="modal" data-bs-target=".tutor-video">Video Tutorial</a>
                <a href="#" class="btn btn-success btn-md w-100" data-bs-toggle="modal" data-bs-target=".sibangenan"> Buat Pengajuan</a>
            </div>
        </div>  
        <div class="card-header-button-wrap p-2 pt-2" style="margin-top: 30px;">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ url('sibangenan') }}" class="btn btn-primary btn-md w-100 mb-2">Semua Pengajuan</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('pengajuan-direvisi') }}" class="btn btn-warning btn-md w-100 text-white mb-2">Usulan Direvisi</a>
                </div>
                <div class="col-md-3">
                    <a href="{{ url('pengajuan-ditolak') }}" class="btn btn-danger btn-md w-100 mb-2">Usulan Ditolak</a>
                </div>
                <div class="col-md-3">
                    <a href="{{url('pengajuan-perlu-divalidasi')}}" class="btn btn-success btn-md w-100 mb-2">Validasi Usulan</a>
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="year_filter" class="form-label">Filter Berdasarkan Tahun :</label>
                            <select class="form-select" id="year_filter">
                            <option value="">Semua Data</option>
                                @php
                                    $currentYear = date('Y');
                                    $endYear = $currentYear + 5;
                                @endphp
                                @for ($year = $currentYear; $year <= $endYear; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 align-self-center">
                        <a href="{{ route('generate-pdf') }}" class="btn btn-primary w-100" style="margin-top:11px">Download PDF</a>
                    </div>
                </div>
            <div class="table-responsive">
                <table id="dataTableExample" class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Nama Pemohon</th>
                        <th>Bidang Urusan</th>
                        <th>Status Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                        $nomor = 1;
                        $userLevel = Auth::user()->level;
                        @endphp
                        @foreach ($data as $d)
                    <tr>
                        <td>{{ $nomor++ }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->created_at)->format('d M Y') }}</td>
                        <td>{{ $d->namapemohon}}</td>
                        <td>{{ $d->nama_urusan}}</td>
                        <td>
                            <div class="@if($d->status_pengajuan == 'Ditolak') badge bg-danger @elseif($d->status_pengajuan == 'Disetujui') badge bg-success @else badge bg-warning @endif">
                                {{ $d->status_pengajuan}}
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#EditPengajuan{{ $d->id}}">
                                        <i data-feather="edit-2" class="icon-sm me-2"></i>
                                        <span class="">Edit</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#PengajuanDetail{{ $d->id}}">
                                        <i data-feather="eye" class="icon-sm me-2"></i>
                                        <span class="">View Detail</span>
                                    </a>
                                    @if(Auth::user()->level == 1)
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('setujui.usulan', $d->id) }}" onclick="event.preventDefault(); document.getElementById('setujui-usulan-form-{{ $d->id }}').submit();">
                                        <i data-feather="check" class="icon-sm me-2"></i>
                                        <span class="">Setujui Usulan</span>
                                    </a>
                                    
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#TolakPengajuan{{ $d->id}}">
                                        <i data-feather="x" class="icon-sm me-2"></i>
                                        <span class="">Tolak Usulan</span>
                                    </a>
                                    <!-- Add a hidden form to trigger the POST request -->
                                    <form id="setujui-usulan-form-{{ $d->id }}" action="{{ route('setujui.usulan', $d->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <form action="{{ route('sibangenan.destroy', $d->id) }}" method="POST" id="delete_sibangenan" class="sibangenandelete"> 
                                        @csrf @method('DELETE') 
                                        <a class="dropdown-item d-flex align-items-center" href="#" onClick="showDeleteDataDialog('{{ $d->id }}')">
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

<!-- Modal Video -->
<div class="modal fade bd-example-modal-lg tutor-video" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <video width="100%" height="auto" controls autoplay>
                <source src="{{ asset('assets/images/tutor.mp4') }}" type="video/mp4" >
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</div>
<!-- End Modal -->
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
                            <input type="text" class="form-control" id="exampleInputUsername1" autocomplete="off" name="namapemohon" value="{{ Auth::user()->name }}" placeholder="Nama Pemohon" required readonly>
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
                            <select name="urusan" class="form-control" id="category" required>
                                <option value="">Pilih Urusan</option>
                                @if(Auth::user()->level == 1)
                                    @foreach($urusan as $u)
                                        <option value="{{ $u->id }}">{{ $u->nama }}</option>
                                    @endforeach
                                @else
                                    @foreach($urusan as $u)
                                        @if($u->level == Auth::user()->level)
                                            <option value="{{ $u->id }}">{{ $u->nama }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="subcategory" class="form-label">Sub Urusan:</label>
                            <select class="form-control" id="subcategory" name="suburusan" disabled>
                                <option value="">Silahkan Pilih Urusan Terlebih Dahulu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Dokumen Pendukung</label>
                            <input type="file" class="form-control" name="dokumen_pendukung[]" multiple required>
                            <p class="text-danger">Upload 3 Dokumen Pendukung Dalam Bentuk PDF <br>(SURAT PENGANTAR RW,RENCANA ANGGARAN BIAYA(RAB) & FOTO LOKASI)</p>
                            <input type="hidden" name="status_pengajuan" value="Verifikasi">
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
@foreach ($data as $d) 
<div class="modal fade bd-example-modal-lg bumil" id="PengajuanDetail{{ $d->id}}" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h4>Detail Data Pengajuan {{$d->namapemohon}} || RW {{$d->rw}}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="detail-pengajuan-sibangenan p-4">
                <div class="row mb-4">
                    <div class="col-md-6">                        
                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama Pemohon</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('namapemohon', $d->namapemohon) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">                        
                        <div class="form-group mb-3">
                            <label for="exampleInputUsername1" class="form-label">Asal RW</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('rw', $d->rw) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Jenis Urusan</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('urusan', $d->nama_urusan) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Sub Urusan</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('urusan', $d->suburusan) }}" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Permasalahan</label>
                            <textarea name="permasalahan" id="" class="form-control" cols="30" rows="10" disabled>{{ old('urusan', $d->suburusan) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Usulan</label>
                            <textarea name="permasalahan" id="" class="form-control" cols="30" rows="10" disabled>{{ old('urusan', $d->usulan) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Lokasi</label>
                            <textarea name="permasalahan" id="" class="form-control" cols="30" rows="10" disabled>{{ old('urusan', $d->lokasi) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">                        
                        <div class="form-group">
                            <label for="exampleInputUsername1" class="form-label">Status Pengajuan</label>
                            <textarea name="permasalahan" id="" class="form-control" cols="30" rows="10" disabled>{{ old('status_pengajuan', $d->status_pengajuan) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('sibangenan.download', $d->id) }}" class="mt-4">
                            <div class="download-file-pendukung d-flex">
                                <img src="{{ asset('assets/icons/download-file.png') }}" alt="">
                                <h5 class="align-self-center">Download File Pendukung</h5>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row @if($d->status_pengajuan == 'Ditolak') d-block @elseif($d->status_pengajuan == 'Direvisi') d-block @else d-none @endif mb-2">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Keterangan Penolakan</label>
                            <textarea id="" cols="30" rows="10" class="form-control" required readonly disabled>{{$d->keterangan_penolakan}}</textarea>
                        </div>
                    </div>
                </div>
                @if($userLevel == 1)
                <div class="row">
                    <div class="col-md-4">
                    <a class="btn btn-success w-100" href="{{ route('setujui.usulan', $d->id) }}" onclick="event.preventDefault(); document.getElementById('setujui-usulan-form-{{ $d->id }}').submit();">
                        Setujui Usulan
                    </a>
                    </div>
                    <form id="setujui-usulan-form-{{ $d->id }}" action="{{ route('setujui.usulan', $d->id) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="col-md-4">
                        <a href="" class="btn btn-warning w-100 text-white" href="#" data-bs-toggle="modal" data-bs-target="#RevisiPengajuan{{ $d->id}}">Revisi Usulan</a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-danger w-100" href="#" data-bs-toggle="modal" data-bs-target="#TolakPengajuan{{ $d->id}}">Tolak Usulan</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div> 
@endforeach

<!-- Edit Modal -->
@foreach ($data as $d)
<div class="modal fade bd-example-modal-lg sibangenan" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="EditPengajuan{{$d->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Edit Pengajuan</h4>
            <hr>
            <form class="forms-sample" action="{{ route('sibangenan.update', $d->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Nama Pemohon</label>
                            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" value="{{ old('namapemohon', $d->namapemohon) }}" required>
                            @error('namapemohon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Asal RW</label>
                            <select name="rw" id="" class="form-control" required>
                                <option value="1" {{ $d->rw == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $d->rw == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $d->rw == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $d->rw == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $d->rw == '5' ? 'selected' : '' }}>5</option>
                                <option value="6" {{ $d->rw == '6' ? 'selected' : '' }}>6</option>
                                <option value="7" {{ $d->rw == '7' ? 'selected' : '' }}>7</option>
                                <option value="8" {{ $d->rw == '8' ? 'selected' : '' }}>8</option>
                                <option value="9" {{ $d->rw == '9' ? 'selected' : '' }}>9</option>
                                <option value="10" {{ $d->rw == '10' ? 'selected' : '' }}>10</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Permasalahan</label>
                            <textarea name="permasalahan" id="" cols="15" rows="5" class="form-control" value="" required>{{$d->permasalahan}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Alamat</label>
                            <textarea name="lokasi" id="" cols="15" rows="5" class="form-control" required>{{$d->lokasi}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Urusan</label>
                            <select name="urusan" class="form-control" id="category" required>
                                <option value="">Pilih Urusan</option>
                                @if(Auth::user()->level == 1)
                                    @foreach($urusan as $u)
                                        <option value="{{ $u->id }}" {{ $d->urusan == $u->id ? 'selected' : '' }}>{{ $u->nama }}</option>
                                    @endforeach
                                @else
                                    @foreach($urusan as $u)
                                        @if($u->level == Auth::user()->level)
                                            <option value="{{ $u->id }}" {{ $d->urusan == $u->id ? 'selected' : '' }}>{{ $u->nama }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Sub Urusan</label>
                            <select name="suburusan" class="form-control" id="category" required>
                            @foreach($suburusan as $u)
                                <option value="{{ $u->name }}" {{ $d->suburusan == $u->name ? 'selected' : '' }}>{{ $u->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
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
                            <textarea name="usulan" id="" cols="30" rows="10" class="form-control" required>{{$d->usulan}}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2 w-100">Edit Pengajuan</button>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Penolakan Modal -->
@foreach ($data as $d)
<div class="modal fade bd-example-modal-lg sibangenan" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="TolakPengajuan{{$d->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Tolak Pengajuan</h4>
            <p>Berikan Catatan Alasan Penolakan</p>
            <hr>
            <form class="forms-sample" action="{{ route('penolakan.usulan',$d->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Keterangan Penolakan</label>
                            <textarea name="keterangan_penolakan" class="form-control" id="" cols="30" rows="10" required></textarea>
                            <input type="hidden" name="status_pengajuan" value="Ditolak">
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-danger me-2 w-100">Tolak Pengajuan</button>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Revisi Modal -->
@foreach ($data as $d)
<div class="modal fade bd-example-modal-lg sibangenan" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="RevisiPengajuan{{$d->id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <h4 class="pb-2">Revisi Pengajuan</h4>
            <p>Berikan Catatan Alasan Revisi</p>
            <hr>
            <form class="forms-sample" action="{{ route('revisi.usulan',$d->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf 
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Keterangan Revisi</label>
                            <textarea name="keterangan_penolakan" class="form-control" id="" cols="30" rows="10" required></textarea>
                            <input type="hidden" name="status_pengajuan" value="Direvisi">
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-warning me-2 w-100 text-white">Revisi Pengajuan</button>
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
                const deleteUrl = "{{ route('sibangenan.destroy', ':id') }}".replace(':id', id);
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
    $(document).ready(function() {
        $('#category').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $('#subcategory').prop('disabled', false);
                $.ajax({
                    url: '{{ route("subcategories.get") }}',
                    type: 'GET',
                    data: { category_id: category_id },
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategory').html('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory').append('<option value="' + value.name + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory').prop('disabled', true);
                $('#subcategory').html('<option value="">Select Category First</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#categoryedit').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $('#subcategoryedit').prop('disabled', false);
                $.ajax({
                    url: '{{ route("subcategories.get") }}',
                    type: 'GET',
                    data: { category_id: category_id },
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategoryedit').html('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subcategoryedit').append('<option value="' + value.name + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory').prop('disabled', true);
                $('#subcategory').html('<option value="">Select Category First</option>');
            }
        });
    });
</script>
<script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            var dataTable = $('#dataTableExample').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
            });

            // Tangani perubahan filter tahun
            $('#year_filter').on('change', function() {
                var year = $(this).val();
                dataTable.column(1).search(year, true, false).draw();
            });
        });
    </script>
@endpush