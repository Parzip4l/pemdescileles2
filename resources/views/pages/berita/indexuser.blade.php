@extends('layout.masteruser2')

@push('plugin-styles')
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
<!-- Page Title -->
<section class="page-title">
		<div class="auto-container">
            <div class="content">
				<h2>Berita dan Informasi</h2>
				<!-- End Button Box -->
			</div>
		</div>
	</section>
	<!-- End Page Title -->
	
	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<div class="blog-classic">

                    @foreach($berita as $berita)
						<div class="news-block-five">
							<div class="inner-box">
								<div class="image">
									<a href="{{ route('berita.single', $berita->judul) }}"><img src="{{ asset('images/'. $berita->gambar )}}" alt="" /></a>
								</div>
								<div class="lower-content">
									<ul class="post-meta">
										<li><span class="flaticon-user-3"></span> {{$berita->penulis}}</li>
										<li><span class="flaticon-calendar"></span> {{$berita->created_at->format('d M Y')}}</li>
									</ul>
									<h3><a href="{{ route('berita.single', $berita->judul) }}">{{ $berita->judul }}</a></h3>
									<div class="text singkat">{!! $berita->excerpt !!}</div>
									<a class="read-more" href="{{ route('berita.single', $berita->judul) }}">Baca Selengkapnya</a>
								</div>
							</div>
						</div>
                    @endforeach
					</div>
				</div>
				
				<!-- Sidebar Side -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
						
						<!-- Search -->
						<div class="sidebar-widget search-box">
							<!-- Sidebar Title -->
							<div class="sidebar-title">
								<h4>search here</h4>
							</div>
							<form method="POST">
								<div class="form-group">
									<input type="search" name="search" placeholder="Search Berita" required>
									<button type="submit"><span class="icon fa fa-search"></span></button>
								</div>
							</form>
						</div>
						
						<!-- Categories Widget -->
						<div class="sidebar-widget categories-widget">
							<div class="widget-content">
								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h4>categories</h4>
								</div>
								<ul class="blog-cat">
									<li class="active"><a href="#">Business <span>03</span></a></li>
									<li><a href="#">Finance <span>07</span></a></li>
									<li><a href="#">Consulting<span>09</span></a></li>
									<li><a href="#">web Design <span>01</span></a></li>
									<li><a href="#">UI/UX Deisgn <span>00</span></a></li>
									<li><a href="#">Animation <span>26</span></a></li>
								</ul>
							</div>
						</div>
						<!-- Post Widget -->
						<div class="sidebar-widget post-widget">
							<div class="widget-content">
								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h4>Recent Post</h4>
								</div>
                                
                                @foreach($berita2 as $d)
								<div class="post">
									<div class="thumb"><a href="{{ route('berita.single', $d->judul) }}"><img src="{{ asset('images/'. $d->gambar )}}" alt="{{ $d->judul }}"></a></div>
									<div class="title">{{ $d->created_at->format('d M Y')}}</div>
									<h6><a href="{{ route('berita.single', $d->judul) }}">{{ $d->judul }}</a></h6>
								</div>
                                @endforeach

							</div>
						</div>
						
						
					</aside>
				</div>
				
			</div>
		</div>
	</div>
@endsection