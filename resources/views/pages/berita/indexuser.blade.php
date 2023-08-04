@extends('layout.masteruser')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/owl-carousel/assets/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/animate-css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/prismjs/prism.css') }}" rel="stylesheet" />
    <style>
        .flex.justify-between.flex-1.sm\:hidden {
        display : none;
    }

    svg.w-5.h-5 {
        width: 20px;
    }

    .hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between {
        margin-bottom: 50px;
    }

    p.text-sm.text-gray-700.leading-5 {
        position: relative;
        top: 55px;
    }

    a.relative.inline-flex.items-center.px-2.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.rounded-l-md.leading-5.hover\:text-gray-400.focus\:z-10.focus\:outline-none.focus\:ring.ring-gray-300.focus\:border-blue-300.active\:bg-gray-100.active\:text-gray-500.transition.ease-in-out.duration-150 {
        margin-right: 5px;
    }

    @media (max-width : 678px){
        nav.flex.items-center.justify-between {
            text-align : center;
        }
    }
    </style>
@endpush

@section('content')
<!-- Banner -->
<div class="welcome-wrap-2" style="background-image: url('{{ asset('assets/images/welcome_banner.jpeg') }}'); background-size:cover;">
<div class="overlay"></div>
<div class="content-welcome" style="">
            <div class="col-md-12">
                <h1 class="text-white mb-2 text-uppercase">Berita Desa</h1>
            </div> 
        </div>
</div>
<!-- Content Card -->
<div class="content-wrap">
    <div class="container">
        <div class="content-body-wrap p-6">
            <div class="berita-wrap">
                <div class="row">
                    @foreach($berita as $data)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="featured-image-kegiatan">
                                <img src="{{ asset('images/' .$data->gambar) }}" class="card-img-top" alt="{{ $data->judul }}">
                            </div>
                            <div class="card-body">
                                <div class="metadata mb-2 d-flex justify-content-between">
                                    <p>{{ $data->created_at->format('d M Y') }}</p>
                                    <p><i data-feather="edit-3"></i>{{ $data->penulis }}</p>
                                </div>
                                <h4 class="mb-2 judul-berita">{{ $data->judul }}</h4>
                                <div class="konten-singkat mb-2">
                                    {!! $data->konten !!}
                                </div>
                                <a href="{{ route('berita.single', $data->judul) }}" class="mt-4 text-primary">Selengkapnya ...</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $berita->links() }}
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
  <script src="{{ asset('assets/plugins/prismjs/prism.js') }}"></script>
  <script src="{{ asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
@endpush