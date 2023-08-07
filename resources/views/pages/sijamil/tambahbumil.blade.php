@extends('layout.master')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/easymde/easymde.min.css') }}" rel="stylesheet" />
@endpush
@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Si Jamil</a></li>
    <li class="breadcrumb-item"><a href="#">Ibu Hamil</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tambah Data Ibu Hamil</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Tambah Ibu Hamil</h6>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form class="forms-sample" action="{{ route('bumil.store') }}" method="POST">
            @csrf 
            <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="number" class="form-control" placeholder="NIK" name="nik" id="nik" required>
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor KK</label>
                            <input type="number" class="form-control" placeholder="Nomor Kartu Keluarga" name="nomorkk" id="nokkbumil" required>
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="namabumil" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Usia</label>
                            <input type="text" class="form-control" placeholder="Usia" name="usia" id="usiabumil" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RT</label>
                            <select name="rt" class="form-control" id="rtbumil" required>
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
                            <select name="rw" class="form-control" id="rwbumil" required>
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
                            <input type="date" class="form-control" placeholder="Nama Lengkap" name="tanggal_lahir" id="tanggallahirbumil" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Perkiraan Kelahiran</label>
                            <input type="date" class="form-control" placeholder="Usia" name="tanggal_perkiraan_lahir" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Golongan Darah</label>
                            <select name="golongan_darah" id="golongandarah" class="form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Riwayat Penambahan Darah</label>
                            <select name="penambahan_darah" id="" class="form-control" required> 
                                <option value="YA">YA</option>
                                <option value="TIDAK">TIDAK</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Riwayat Kesehatan</label>
                            <input type="text" class="form-control" placeholder="Riwayat Kesehatan" name="riwayat_kesehatan" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Haid Terakhir</label>
                            <input type="date" class="form-control" placeholder="Tanggal Haid Terakhir" name="haid_terakhir" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Umur Kehamilan</label>
                            <input type="number" class="form-control" placeholder="Umur Kehamilan" name="umur_kehamilan" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">KB Pasca Bersalin</label>
                            <select name="kb_pasca_bersalin" class="form-control" id="" required>
                                <option value="YA">YA</option>
                                <option value="TIDAK">TIDAK</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jenis KB <p class="text-danger">Kosongkan Jika Tidak Melakukan KB Pasca Bersalin</p></label>
                            <select name="jenis_kb" id="" class="form-control" required>
                                <option value="-">-</option>
                                <option value="Pil">Pil</option>
                                <option value="Implan">KB Implan</option>
                                <option value="Suntik">Suntik</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Suami</label>
                            <input type="text" class="form-control" placeholder="Nama Suami" name="nama_suami" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon Suami</label>
                            <input type="number" class="form-control" placeholder="Nomor Telepon Suami" name="nomor_telepon_suami" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Kontrol Terakhir</label>
                    <input type="date" class="form-control" placeholder="Usia" name="tanggal_kunjungan_terakhir" required>
                </div>
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button typer="reset" class="btn btn-danger">Reset</button>
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
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/tinymce.js') }}"></script>
  <script>
  $('#nik').autocomplete({
        minLength: 1,
        source: function(request, response){
            $.ajax({
                url: "{{ route('bumil.autocomplete2') }}",
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
                            rt: item.rt,
                            rw: item.rw,
                            tanggal_lahir: item.tanggal_lahir,
                            golongan_darah: item.golongan_darah
                        }
                    }));
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.error(textStatus + ': ' + errorThrown);
                }
            });
        },
        select: function(event, ui){
            $('#nik').val(ui.item.nik);
            $('#namabumil').val(ui.item.value);
            $('#nokkbumil').val(ui.item.nokk);
            $('#rtbumil').val(ui.item.rt);
            $('#rwbumil').val(ui.item.rw);
            $('#tanggallahirbumil').val(ui.item.tanggal_lahir);
            $('#golongandarah').val(ui.item.golongan_darah);
            return false;
        }
    });
</script>
@endpush
