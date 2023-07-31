@extends('layout.masteruser')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- Banner -->
<div class="welcome-wrap-2" style="background-image: url('{{ asset('assets/images/welcome_banner.jpeg') }}'); background-size:cover;">
<div class="overlay"></div>
    <div class="container">
        <div class="content-welcome" style="">
            <div class="col-md-12">
                <h1 class="text-white mb-2 text-uppercase">Profile Desa Cileles</h1>
            </div> 
        </div>
    </div>
</div>
<!-- Content Card -->
<div class="content-wrap">
    <div class="container">
        <div class="content-body-wrap p-6">
            <div class="title-profile">
                <h2 class="text-center">Visi & Misi Pemerintah Desa Cileles</h2>
            </div>
            <div class="visi-wrap mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/images/noimage.png') }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8 align-self-center">
                        <div class="title-visi-misi align-self-center">
                            <h3 class="mb-2">Visi</h3>
                            <h5 class="normal-line-height">Terwujudnya Jawa Barat Juara Lahir Batin dengan Inovasi dan Kolaborasi</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="misi-wrap mt-5">
                <div class="row">
                    <div class="col-md-8 align-self-center">
                        <div class="title-visi-misi align-self-center">
                            <h3 class="mb-4">Misi</h3>
                            <div class="content-misi d-flex mb-4">
                                <div class="number mr-4 bg-custom-ijo">
                                    <p>1</p>
                                </div>
                                <div class="content-misi">
                                    <h4 class="mb-2">Lorem ipsum dolor sit amet consectetur. </h4>
                                    <p class="normal-line-height">Lorem ipsum dolor sit amet consectetur. Ullamcorper dui aliquam et praesent egestas ultrices auctor. Tempor porttitor viverra sed sit aliquam ac. Ullamcorper vitae aliquet donec dolor.</p>
                                </div>
                            </div>
                            <div class="content-misi d-flex mb-4">
                                <div class="number mr-4 bg-custom-ijo">
                                    <p>1</p>
                                </div>
                                <div class="content-misi">
                                    <h4 class="mb-2">Lorem ipsum dolor sit amet consectetur. </h4>
                                    <p class="normal-line-height">Lorem ipsum dolor sit amet consectetur. Ullamcorper dui aliquam et praesent egestas ultrices auctor. Tempor porttitor viverra sed sit aliquam ac. Ullamcorper vitae aliquet donec dolor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('assets/images/noimage.png') }}" class="w-100" alt="">
                    </div>
                </div>
            </div>
            <!-- Struktur Kepemimpinan -->
            <div class="struktur-kepemimpinan-wrap margin-section">
                <div class="title-profile">
                    <h2 class="text-center">Jajaran Kepengurusan Desa Cileles</h2>
                </div>
                <div class="col-md-12 grid-margin stretch-card mt-4">
                    <div class="owl-carousel owl-theme owl-basic" id="slider-home">
                        <div class="item">
                            <img src="{{ asset('assets/images/noimage.png') }}" alt="">
                            <div class="title-kepengurusan mt-2 text-center">
                                <h4>Nama</h4>
                                <h5>Jabatan</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Program Keunggulan -->
            <div class="program-unggulan margin-section">
                <div class="title-profile">
                    <h2 class="text-center">Program Unggulan Desa Cileles</h2>
                </div>
                <div class="item-program-wrap mt-6">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="item-content p-4">
                                    <div class="icon-program text-center">
                                        <img src="{{ asset('assets/images/pendidikan.png') }}" alt="">
                                    </div>
                                    <div class="title-program text-center">
                                        <h5>Meningkatkan akses pendidikan untuk semua</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
@endpush

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@push('custom-scripts')
<script>
    $(document).ready(function() {
 
        $("#slider-home").owlCarousel({

            navigation : true, // Show next and prev buttons
            autoplay : true,
            slideSpeed : 300,
            margin: 20,
            paginationSpeed : 400,
            loop : true,
            nav:true,

            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }

        });
    });
  </script>
  <script src="{{ asset('assets/js/carousel.js') }}"></script>
@endpush