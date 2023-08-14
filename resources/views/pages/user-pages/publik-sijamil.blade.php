@extends('layout.masteruser2')
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  
@endpush

@section('content')
<section class="page-title">
    <div class="auto-container">
        <div class="content">
            <h2>Dashboard Publik SIJAMIL</h2>
        </div>
    </div>
</section>
    <div class="auto-container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="content-comingsoon text-center">
                    <h3  style="font-family: 'Poppins', sans-serif!important;">Coming Soon!</h3>
                    <img src="{{asset('assets/images/website-maintenance.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
    </div>
@endsection