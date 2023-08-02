@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/easymde/easymde.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
    <li class="breadcrumb-item active" aria-current="page">Buat Kegiatan</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Buat Kegiatan</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Judul Kegiatan</label>
            <input type="text" class="form-control" name="judul" id="nama">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Kategori</label>
            <select name="kategori" id="" class="form-control">
              @foreach ($kategori as $data)
              <option value="{{$data->kategori}}">{{$data->kategori}}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Keterangan Singkat</label>
            <textarea class="form-control" name="keterangan_singkat" id="tinymceExample" rows="10"></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="tinymceExample" rows="10"></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Tanggal Kegiatan</label>
            <input type="date" class="form-control" name="tanggal_kegiatan">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="lokasi">
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar">
          </div>
          
          <div class="mb-3">
            <input type="hidden" class="form-control" name="penulis" value="{{ Auth::user()->name }}" readonly>
          </div>

          <button class="btn btn-primary" type="submit">Simpan Data</button>
          <button class="btn btn-danger" type="reset">Reset Data</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
