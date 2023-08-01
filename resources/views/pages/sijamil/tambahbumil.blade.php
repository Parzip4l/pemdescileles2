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
                            <input type="number" class="form-control" placeholder="NIK" name="nik" id="nik">
                        </div>
                    </div>
                    <!-- Col -->
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor KK</label>
                            <input type="number" class="form-control" placeholder="Nomor Kartu Keluarga" name="nomorkk" id="nokkbumil">
                        </div>
                    </div>
                    <!-- Col -->
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" id="namabumil">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Usia</label>
                            <input type="text" class="form-control" placeholder="Usia" name="usia" id="usiabumil">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">RT</label>
                            <select name="rt" class="form-control" id="rtbumil">
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
                            <select name="rw" class="form-control" id="rwbumil">
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
                            <input type="date" class="form-control" placeholder="Nama Lengkap" name="tanggal_lahir" id="tanggallahirbumil">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Perkiraan Kelahiran</label>
                            <input type="date" class="form-control" placeholder="Usia" name="tanggal_perkiraan_lahir">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Golongan Darah</label>
                            <select name="golongan_darah" id="golongandarah" class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Riwayat Kesehatan</label>
                            <input type="text" class="form-control" placeholder="Riwayat Kesehatan" name="riwayat_kesehatan">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Suami</label>
                            <input type="text" class="form-control" placeholder="Nama Suami" name="nama_suami">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon Suami</label>
                            <input type="number" class="form-control" placeholder="Nomor Telepon Suami" name="nomor_telepon_suami">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Kontrol Terakhir</label>
                    <input type="date" class="form-control" placeholder="Usia" name="tanggal_kunjungan_terakhir">
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
                            tanggal_lahir: item.tanggal_lahir
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
            return false;
        }
    });
</script>
@endpush
