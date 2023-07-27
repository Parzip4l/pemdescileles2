@extends('layout.masteruser')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="welcome-wrap" style="background-image: url('{{ asset('assets/images/welcome_banner.jpeg') }}'); background-size:cover;">
<div class="overlay"></div>
    <div class="container">
        <div class="content-welcome" style="text-white">
            <div class="col-md-6">
                <h1 class="text-white mb-2">SELAMAT DATANG DI PORTAL CILELES SMART</h1>
                <p class="text-light">Lorem ipsum dolor sit amet consectetur. Diam diam nibh aliquam amet orci. Suspendisse massa posuere senectus tincidunt odio volutpat et tellus. Molestie purus arcu sed bibendum quam imperdiet etiam interdum nisl. Phasellus dapibus vulputate maecenas libero a consequat scelerisque etiam potenti. Feugiat mattis eget amet amet.</p>
            </div> 
        </div>
    </div>
</div>
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush