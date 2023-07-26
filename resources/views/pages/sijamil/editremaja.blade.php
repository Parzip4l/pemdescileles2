@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Cileles Smart</a></li>
        <li class="breadcrumb-item"><a href="#">Sijamil</a></li>
        <li class="breadcrumb-item"><a href="#">Data Remaja </a></li>
        <li class="breadcrumb-item">Edit</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $remaja->nama }}</li>
    </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Edit Data Remaja</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('sijamil.update', $remaja->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" value="{{ $remaja->nik }}" autocomplete="off" name="nik" placeholder="NIK">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor KK</label>
                <input type="number" class="form-control" id="nomor_kk" value="{{ $remaja->nomorkk }}" placeholder="Nomor KK" name="nomorkk">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nama" value="{{ $remaja->nama }}" autocomplete="off" placeholder="Nama Lengkap">
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Usia</label>
                <input type="number" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $remaja->usia }}" name="usia" placeholder="Usia">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="">
                    <option value="LAKI-LAKI" {{ $remaja->jenis_kelamin == 'LAKI-LAKI' ? 'selected' : '' }}>LAKI-LAKI</option>
                    <option value="PEREMPUAN" {{ $remaja->jenis_kelamin == 'PEREMPUAN' ? 'selected' : '' }}>PEREMPUAN</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">RT</label>
                <select name="rt" class="form-control" id="">
                    <option value="1" {{ $remaja->rt == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $remaja->rt == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $remaja->rt == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $remaja->rt == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ $remaja->rt == '5' ? 'selected' : '' }}>5</option>
                    <option value="6" {{ $remaja->rt == '6' ? 'selected' : '' }}>6</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">RW</label>
                <select name="rw" class="form-control" id="">
                    <option value="1" {{ $remaja->rw == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $remaja->rw == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $remaja->rw == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $remaja->rw == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ $remaja->rw == '5' ? 'selected' : '' }}>5</option>
                    <option value="6" {{ $remaja->rw == '6' ? 'selected' : '' }}>6</option>
                    <option value="7" {{ $remaja->rw == '7' ? 'selected' : '' }}>7</option>
                    <option value="8" {{ $remaja->rw == '8' ? 'selected' : '' }}>8</option>
                    <option value="9" {{ $remaja->rw == '9' ? 'selected' : '' }}>9</option>
                    <option value="10" {{ $remaja->rw == '10' ? 'selected' : '' }}>10</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off" value="{{ $remaja->nama_ayah }}" name="nama_ayah" placeholder="Nama Ayah">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"  value="{{ $remaja->nama_ibu }}" name="nama_ibu" placeholder="Nama Ibu">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control" id="exampleInputPassword1" autocomplete="off"  value="{{ $remaja->nomor_telepon }}" name="nomor_telepon" placeholder="nomortelpeon">
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{url('/sijamil')}}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
