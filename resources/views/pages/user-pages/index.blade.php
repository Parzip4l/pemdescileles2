@extends('layout.masteruser')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- Banner -->
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
<!-- Sambutan Kades -->
<div class="sambutan-kades-wrap my-6">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="foto-kades">
              <img src="{{ asset('assets/images/foto1.png') }}" alt="" class="w-100">
          </div>
      </div>
      <div class="col-md-6 align-self-center">
          <div class="content-sambutan">
              <h2 class="text-uppercase">Sambutan Kepala Desa Cileles</h2>
              <div class="divider my-4"></div>
              <p class="normal-line-height">Lorem ipsum dolor sit amet consectetur. Ullamcorper dui aliquam et praesent egestas ultrices auctor. Tempor porttitor viverra sed sit aliquam ac. Ullamcorper vitae aliquet donec dolor. Elit id viverra egestas odio diam at est nullam. Tellus ultrices amet est dictumst interdum condimentum. Eu elementum condimentum sodales eget. Arcu quis pellentesque viverra risus faucibus.</p>
              <a href="" class="btn btn-custom text-white my-4">LIHAT PROFILE DESA</a>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- Agenda Kegiatan -->
<div class="agenda-kegiatan-wrap bg-custom-ijo py-6">
    <div class="container">
        <div class="title-agenda">
            <h2 class="text-center text-uppercase text-white">Agenda Kegiatan</h2>
            <div class="divider my-4 bg-white mx-auto"></div>
        </div>
        <div class="content-kegiatan-wrap">
            <div class="row">
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="featured-image-kegiatan">
                            <img src="{{ asset('assets/images/noimage.png') }}" class="card-img-top" alt="...">
                            <div class="kategori-kegiatan">PKK</div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Judul Kegiatan</h4>
                            <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="featured-image-kegiatan">
                            <img src="{{ asset('assets/images/noimage.png') }}" class="card-img-top" alt="...">
                            <div class="kategori-kegiatan">PKK</div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Judul Kegiatan</h4>
                            <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="featured-image-kegiatan">
                            <img src="{{ asset('assets/images/noimage.png') }}" class="card-img-top" alt="...">
                            <div class="kategori-kegiatan">PKK</div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Judul Kegiatan</h4>
                            <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="featured-image-kegiatan">
                            <img src="{{ asset('assets/images/noimage.png') }}" class="card-img-top" alt="...">
                            <div class="kategori-kegiatan">PKK</div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Judul Kegiatan</h4>
                            <p class="card-text mb-3">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="button-all-kegiatan-wrap text-center my-4">
                <a href="" class="btn btn-warning text-white">Lihat Semua Kegiatan</a>
            </div>
        </div>
    </div>
</div>

<!-- Berita dan Informasi -->
<div class="berita-wrap py-6">
    <div class="container">
        <div class="berita-content">
            <div class="title-berita-wrap">
                <h2 class="text-uppercase text-center">Berita dan Informasi</h2>
                <div class="divider my-4 mx-auto"></div>
            </div>
            <div class="row">
                @foreach ($berita as $data)
                <div class="col-md-4 mb2">
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
                            <a href="" class="mt-4 text-primary">Selengkapnya ...</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="button-all-kegiatan-wrap text-center my-4">
                <a href="" class="btn btn-custom text-white">Lihat Semua Berita & Informasi</a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush