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
                <p class="text-light">Cileles Smart adalah sebuah platform informasi yang ditujukan untuk warga Desa Cileles. Dengan fokus pada remaja dan ibu hamil, website ini menyediakan beragam konten yang relevan dan bermanfaat untuk Cileles Folks. </p>
            </div> 
        </div>
    </div>
</div>
<!-- Sambutan Kades -->
<div class="sambutan-kades-wrap py-6">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
          <div class="foto-kades">
              <img src="{{ asset('assets/images/kadeswithnama.png') }}" alt="kepala desa cileles" class="w-100">
          </div>
      </div>
      <div class="col-md-6 align-self-center pt-4">
          <div class="content-sambutan">
              <h2 class="text-uppercase">Sambutan Kepala Desa Cileles</h2>
              <div class="divider my-4"></div>
              <p class="normal-line-height">Dengan berbagai informasi, program, dan kegiatan yang akan dihadirkan melalui website ini, semoga kita dapat saling menginspirasi, berbagi pengetahuan, dan bersama-sama mencapai tujuan mulia kita. Bersama, kita akan mengukir sejarah perubahan yang positif dan membawa Desa Cileles Smart menuju masa depan yang gemilang.

Terima kasih kepada semua pihak yang telah berkontribusi dalam pembuatan dan pengembangan website ini. Mari kita terus bekerja bersama, berkomunikasi, dan berkolaborasi demi Desa Cileles Smart yang lebih cerdas, berdaya saing, dan penuh harapan.

Salam Cileles Smart!</p>
              <a href="{{ url('profile-desa-cileles') }}" class="btn btn-custom text-white my-4">LIHAT PROFILE DESA</a>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- Agenda Kegiatan -->
<div class="agenda-kegiatan-wrap bg-custom-ijo py-6" style="background-image: url('assets/images/bg-jabar.svg');background-repeat: no-repeat;background-position: 95% 100%;">
    <div class="container">
        <div class="title-agenda">
            <h2 class="text-center text-uppercase text-white">Agenda Kegiatan</h2>
            <div class="divider my-4 bg-white mx-auto"></div>
        </div>
        <div class="content-kegiatan-wrap">
            <div class="row">
                @foreach ($kegiatan as $kegiatan)
                <div class="col-md-3 mb-2">
                    <div class="card">
                        <div class="featured-image-kegiatan">
                            <img src="{{ asset('images/'. $kegiatan->gambar) }}" class="card-img-top" alt="{{$kegiatan->judul}}">
                            <div class="kategori-kegiatan">{{$kegiatan->kategori}}</div>
                        </div>
                        <div class="card-body">
                            <a href="" class="custom-text-color">
                                <h4 class="card-title">{{$kegiatan->judul}}</h4>
                            </a>
                            <p class="card-text mb-3">{!! $kegiatan->keterangan_singkat!!}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="button-all-kegiatan-wrap text-center my-4">
                <a href="" class="btn btn-custom-white">Lihat Semua Kegiatan</a>
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
                            <a href="{{ route('berita.single', $data->judul) }}" class="mt-4 text-link">Selengkapnya ...</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="button-all-kegiatan-wrap text-center my-4">
                <a href="{{ url('berita-desa') }}" class="btn btn-custom text-white">Lihat Semua Berita & Informasi</a>
            </div>
        </div>
    </div>
</div>
<!-- Informasi UMKM -->
<!-- <div class="berita-wrap py-6">
    <div class="container">
        <div class="berita-content">
            <div class="title-berita-wrap mb-4">
                <h2 class="text-uppercase text-center">UMKM Warga Desa Cileles</h2>
                <div class="divider my-4 mx-auto"></div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-2">
                    <img src="{{ asset('assets/images/umkm.png') }}" class="w-100" alt="">
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Laporan -->
<div class="laporan-wrap py-6">
    <div class="container">
        <div class="berita-content">
            <div class="title-berita-wrap mb-4">
                <h2 class="text-uppercase text-center">Layanan Aspirasi dan Pengaduan Online Rakyat</h2>
                <div class="divider my-4 mx-auto"></div>
            </div>
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="content-lapor">
                        <h5 class="normal-line-height text-center">Kami melayani dengan sepenuh hati tanpa gratifikasi dan pungli.<br> Klik tombol dibawah apabila menemukan pelayanan yang menyimpang</h5>
                        <div class="button-lapor text-center mt-4">
                            <a href="https://www.lapor.go.id/" class="btn btn-danger btn-lg text-center" target="_blank">LAPORKAN !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush