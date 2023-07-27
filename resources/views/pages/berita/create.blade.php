@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/easymde/easymde.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Berita</a></li>
    <li class="breadcrumb-item active" aria-current="page">Buat Berita</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Buat Berita</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" name="judul">
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
            <label for="exampleInputNumber1" class="form-label">Konten</label>
            <textarea class="form-control" name="konten" id="tinymceExample" rows="10"></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar">
          </div>
          
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Penulis</label>
            <input type="text" class="form-control" name="penulis">
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
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush
