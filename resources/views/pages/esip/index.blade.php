@extends('layout.master')

@push('plugin-styles')
  <!-- Plugin css import here -->
@endpush

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header d-flex">
                <h5 class="align-self-center" style="color:#000092">Sistem Informasi Posyandu</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="{{url('esip/catatan-kelahiran')}}">
                                <h5>Catatan Kelahiran</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                        <a href="{{url('esip/register-bayi')}}">
                                <h5>Register Bayi</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="{{url('esip/register-balita')}}">
                                <h5>Register Balita</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="">
                                <h5>Register WUS-PUS</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="">
                                <h5>Register Ibu Hamil</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="">
                                <h5>Data Pengunjung & Petugas</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="">
                                <h5>Data Hasil Kegiatan</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="{{url('esip/bgm')}}">
                                <h5>Laporan Data Balita BGM</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="{{url('esip/databumil')}}">
                                <h5>Laporan Data Ibu Hamil</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="">
                                <h5>Pencatatan ASI Ekslusif</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="{{url('esip/skdn')}}">
                                <h5>Laporan SKDN</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
  <!-- Plugin js import here -->
@endpush

@push('custom-scripts')
  <!-- Custom js here -->
@endpush