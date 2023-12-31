@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/easymde/easymde.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Berita</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Berita</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Detail Berita</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Judul Berita</label>
            <input type="text" class="form-control" name="judul" value="{{$berita->judul}}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Kategori</label>
            <select name="kategori" class="form-control" id="">
                @foreach ($kategori as $data)
                <option value="{{$data->kategori}} {{ $data->kategori == $berita->kategori ? 'selected' : '' }}">{{$data->kategori}}</option>
                @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Konten</label>
            <textarea name="konten" id="tinymceExample" cols="30" rows="10" class="form-control">{{$berita->konten}}</textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Excerpt (Deskripsi Singkat)</label>
            <textarea name="excerpt" id="tinymceExample" cols="30" rows="10" class="form-control">{{$berita->excerpt}}</textarea>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Penulis</label>
            <input type="text" class="form-control" name="penulis" value="{{$berita->penulis}}" required>
          </div>

          <div class="mb-3">
            <label for="exampleInputNumber1" class="form-label">Featured Images</label>
            <input type="file" class="form-control" name="gambar" value="{{$berita->gambar}}" require>
          </div>

          <button class="btn btn-primary" type="submit">Update Data</button>
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