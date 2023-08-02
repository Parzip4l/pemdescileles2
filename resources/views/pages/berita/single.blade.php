@extends('layout.masteruser') @push('plugin-styles')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" /> 
@endpush 
@section('content') 
<div class="container">
    <div class="backwrap bg-white p-4">
        <div class="button d-flex">
            <a href="{{url('/berita-desa')}}" class="text-black">
                <i class="link-icon" data-feather="chevron-left"></i>
                Kembali
            </a>
        </div>
    </div>
</div>

<div class="notifikasi-body warga">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card rounded mb-5">
                    <div class="card-body">
                        <div class="align-items-center justify-content-between mb-2">
                            <div class="berita-konten-wrap">
                                <div class="featured-image-single">
                                    <img src="{{ asset('images/' .$berita->gambar) }}" alt="{{ $berita->judul }}" class="w-100">
                                </div>
                                <div class="title-single my-3">
                                    <h2>{{ $berita->judul }}</h2>
                                </div>
                                <div class="meta-berita d-flex justify-content-between pb-4">
                                    <div class="category-berita bg-custom-ijo text-white">
                                        {{ $berita->kategori }}
                                    </div>
                                    <div class="tanggal-berita">
                                        {{$berita->created_at->format('d M Y')}}
                                    </div>
                                </div>
                                <article id="post-{{ $berita->id }}">
                                    <div class="desc-berita-full">
                                        {!! $berita->konten !!}
                                    </div>
                                </article>
                                <hr>
                                <div class="footer-berita-single mt-3 d-flex">
                                    <img src="{{ asset('assets/icons/user.png') }}" alt="">
                                    <p class="align-self-center">{{ $berita->penulis }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card rounded mb-5">
                    <div class="card-body">
                        <div class="kegiatan-side">
                            <div class="title-kegiatan-wrap">
                                <h4>Berita Terbaru</h4>
                                <div class="divider-aside bg-custom-ijo"></div>
                            </div>
                            <div class="content-kegiatan-aside-wrap mt-4 mb-4">
                                @foreach ($beritaterbaru as $beritaterbaru)
                                <div class="kontent-kegiatan-aside-body mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('images/' .$beritaterbaru->gambar) }}" alt="{{$beritaterbaru->judul}}" class="w-100 image-aside">
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <h5 class="normal-line-height judul-terbatas">{{$beritaterbaru->judul}}</h5>
                                            <a href="">Selengkapnya...</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="title-kegiatan-wrap">
                                <h4>Kegiatan</h4>
                                <div class="divider-aside bg-custom-ijo"></div>
                            </div>
                            <div class="content-kegiatan-aside-wrap mt-4">
                                @foreach ($kegiatan as $kegiatan)
                                <div class="kontent-kegiatan-aside-body mb-4">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset('images/' .$kegiatan->gambar) }}" alt="{{$kegiatan->judul}}" class="w-100 image-aside">
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <h5 class="normal-line-height judul-terbatas">{{$kegiatan->judul}}</h5>
                                            <a href="">Selengkapnya...</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection