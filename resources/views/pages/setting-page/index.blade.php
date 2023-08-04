@extends('layout.master')

@push('plugin-styles')
  <!-- Plugin css import here -->
@endpush

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header d-flex">
                <img src="{{ asset('assets/icons/settings.png') }}" alt="" class="text-center">
                <h5 class="align-self-center" style="color:#000092">Settings Page</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="">
                                <img src="{{ asset('assets/icons/online.png') }}" alt="" class="text-center">
                                <h5>Halaman User</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="">
                                <img src="{{ asset('assets/icons/business.png') }}" alt="" class="text-center">
                                <h5>RW & RT</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="{{ url('setting-urusan-sibangenan')}}">
                                <img src="{{ asset('assets/icons/direction.png') }}" alt="" class="text-center">
                                <h5>Kategori Urusan Sibangenan</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="">
                                <img src="{{ asset('assets/icons/customer.png') }}" alt="" class="text-center">
                                <h5>Nomor WA Kepo</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-2">
                        <div class="custom-button-setting">
                            <a href="{{ url('pengurus') }}">
                                <img src="{{ asset('assets/icons/pengurus.png') }}" alt="" class="text-center">
                                <h5>Pengurus</h5>
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