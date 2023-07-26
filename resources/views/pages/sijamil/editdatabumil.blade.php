@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Cileles Smart</a></li>
        <li class="breadcrumb-item"><a href="#">Sijamil</a></li>
        <li class="breadcrumb-item"><a href="#">Data Ibu Hamil </a></li>
        <li class="breadcrumb-item">Edit</li>
        <li class="breadcrumb-item active" aria-current="page">{{ $bumil->nama }}</li>
    </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Edit Data Ibu Hamil</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('bumil.update', $bumil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" value="{{ $bumil->nik }}" autocomplete="off" name="nik" placeholder="NIK">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nomor KK</label>
                <input type="number" class="form-control" id="nomor_kk" value="{{ $bumil->nomorkk }}" placeholder="Nomor KK" name="nomorkk">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nama" value="{{ $bumil->nama }}" autocomplete="off" placeholder="Nama Lengkap">
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Usia</label>
                <input type="number" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{ $bumil->usia }}" name="usia" placeholder="Usia">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">RT</label>
                <select name="rt" class="form-control" id="">
                    <option value="1" {{ $bumil->rt == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $bumil->rt == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $bumil->rt == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $bumil->rt == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ $bumil->rt == '5' ? 'selected' : '' }}>5</option>
                    <option value="6" {{ $bumil->rt == '6' ? 'selected' : '' }}>6</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">RW</label>
                <select name="rw" class="form-control" id="">
                    <option value="1" {{ $bumil->rw == '1' ? 'selected' : '' }}>1</option>
                    <option value="2" {{ $bumil->rw == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ $bumil->rw == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ $bumil->rw == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ $bumil->rw == '5' ? 'selected' : '' }}>5</option>
                    <option value="6" {{ $bumil->rw == '6' ? 'selected' : '' }}>6</option>
                    <option value="7" {{ $bumil->rw == '7' ? 'selected' : '' }}>7</option>
                    <option value="8" {{ $bumil->rw == '8' ? 'selected' : '' }}>8</option>
                    <option value="9" {{ $bumil->rw == '9' ? 'selected' : '' }}>9</option>
                    <option value="10" {{ $bumil->rw == '10' ? 'selected' : '' }}>10</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal Lahir Ibu Hamil</label>
                <input type="date" class="form-control" id="exampleInputPassword1" autocomplete="off" value="{{ $bumil->tanggal_lahir }}" name="tanggal_lahir" placeholder="Nama Ayah">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal Perkiraan Lahir</label>
                <input type="date" class="form-control" id="exampleInputPassword1" autocomplete="off" value="{{ $bumil->tanggal_perkiraan_lahir }}" name="tanggal_perkiraan_lahir" placeholder="Nama Ayah">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Golongan Darah</label>
                <select name="golongan_darah" class="form-control" id="">
                    <option value="A" {{ $bumil->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $bumil->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ $bumil->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ $bumil->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Riwayat Kesehatan</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"  value="{{ $bumil->riwayat_kesehatan }}" name="riwayat_kesehatan" placeholder="nomortelpeon">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nama Suami</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"  value="{{ $bumil->nama_suami }}" name="nama_suami" placeholder="nomortelpeon">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nomor Telepon Suami</label>
                <input type="text" class="form-control" id="exampleInputPassword1" autocomplete="off"  value="{{ $bumil->nomor_telepon_suami }}" name="nomor_telepon_suami" placeholder="nomortelpeon">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tanggal Kontrol Terakhir</label>
                <input type="date" class="form-control" id="exampleInputPassword1" autocomplete="off" value="{{ $bumil->tanggal_kunjungan_terakhir }}" name="tanggal_kunjungan_terakhir" placeholder="Nama Ayah">
            </div>

            <button type="submit" class="btn btn-primary me-2">Submit</button>
            <a href="{{url('/sijamil')}}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
