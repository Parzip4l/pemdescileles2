@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/easymde/easymde.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Si Jamil</a></li>
    <li class="breadcrumb-item"><a href="#">Remaja</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Remaja</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Remaja</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form class="forms-sample" action="{{ route('sijamil.store') }}" method="POST"> @csrf 
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">NIK</label>
                        <input type="number" class="form-control" id="nikremaja" name="nik" placeholder="NIK">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nomor KK</label>
                        <input type="number" class="form-control" id="nokkremaja" placeholder="Nomor KK" name="nomorkk">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="namaremaja" name="nama" autocomplete="off" placeholder="Nama Lengkap">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Usia</label>
                        <input type="number" class="form-control" id="usia" autocomplete="off" name="usia" placeholder="Usia">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" id="jkremaja">
                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                            <option value="PEREMPUAN">PEREMPUAN</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="nomorteleponremaja" autocomplete="off" name="nomor_telepon" placeholder="0812xxxx">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Golongan Darah</label>
                        <select name="golongan_darah" class="form-control" id="goldar">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Riwayat Penambahan Darah</label>
                        <select name="tambahan_darah" class="form-control" id="penambahan_darah">
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Pemeriksaan Anemia</label>
                        <select name="pemeriksaan_anemia" class="form-control" id="goldar">
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Hasil Pemeriksaan Anemia</label>
                        <p class="text-danger">Kosongkan Jika Tidak Pernah</p>
                        <textarea name="hasilpemeriksaan_anemia" id="" cols="30" class="form-control" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">RT</label>
                        <select name="rt" class="form-control" id="rtremaja">
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
                        <select name="rw" class="form-control" id="rwremaja">
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
                        <input type="text" class="form-control" id="nama_ayahremaja" autocomplete="off" name="nama_ayah" placeholder="Nama Ayah">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_iburemaja" autocomplete="off" name="nama_ibu" placeholder="Nama Ibu">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
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
  <script>
  $('#nikremaja').autocomplete({
        minLength: 1,
        source: function(request, response){
            $.ajax({
                url: "{{ route('remaja.autocomplete') }}",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function(data){
                    response($.map(data, function(item){
                        return {
                            id: item.id,
                            value: item.value,
                            nik: item.nik,
                            nokk: item.nokk,
                            jk: item.jk,
                            rt: item.rt,
                            rw: item.rw,
                            nama_ayah: item.nama_ayah,
                            nama_ibu: item.nama_ibu,
                            nomortelepon: item.nomortelepon,
                            golongan_darah: item.golongan_darah
                        }
                    }));
                }
            });
        },
        select: function(event, ui){
            $('#nikremaja').val(ui.item.nik);
            $('#namaremaja').val(ui.item.value);
            $('#nokkremaja').val(ui.item.nokk);
            $('#jkremaja').val(ui.item.jk);
            $('#rtremaja').val(ui.item.rt);
            $('#rwremaja').val(ui.item.rw);
            $('#nomorteleponremaja').val(ui.item.nomortelepon);
            $('#nama_ayahremaja').val(ui.item.nama_ayah);
            $('#nama_iburemaja').val(ui.item.nama_ibu);
            $('#goldar').val(ui.item.golongan_darah);
            return false;
        }
    });
</script>
@endpush
