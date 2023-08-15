@extends('layout.masteruser')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- Main Section -->
<section class="main-slider">
		<div class="main-slider-carousel owl-carousel owl-theme">
            
			<!-- Slide One -->
            <div class="slide">
				<div class="image-layer" style="background-image: url('{{ asset('assets/images/banner1.jpg') }}')"></div>
				<div class="auto-container">
					
					<!-- Content Boxed -->
					<div class="content-boxed">
						<div class="inner-box" style="background-image: url('{{asset('user-pages/images/main-slider/pattern-1.png')}}')">
							<div class="content">
								<h1>Portal <br> Cileles <br> Smart</h1>
								<div class="text">Transforming Lives, One Smart Step at a Time with Cileles Smart.</div>
								<div class="btns-box">
									<a href="{{url('profile-desa-cileles')}}" class="theme-btn btn-style-one clearfix">
										<span class="btn-wrap">
											<span class="text-one">Profile Desa</span>
											<span class="text-two">Profile Desa</span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- End Slide One -->
			
		</div>
		<!-- Social Box -->
		<ul class="social-box">
			<li><a href="#" class="fa fa-facebook"> <span>Facebook</span></a></li>
			<li><a href="#" class="fa fa-youtube-play"> <span>Youtube</span></a></li>
			<li><a href="#" class="fa fa-twitter"> <span>Twitter</span></a></li>
			<li><a href="https://www.instagram.com/pemdescileles/" class="fa fa-instagram"> <span>Instagram</span></a></li>
		</ul>
		<!-- End Social Box -->
		
		<!-- Scroll Box -->
		<div class="scroll-box scroll-to-target" data-target=".info-section">
			<span class="icon flaticon-mouse"></span>Scrool Down
		</div>
		<!-- End Scroll Box -->
		
	</section>
	<!-- End Main Section -->
	
	<!-- Info Section -->
	<section class="info-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<!-- Info Box -->
						<div class="info-box">
							<div class="box-inner">
								<span class="icon flaticon-telephone"></span>
								<i>WA <br> Kepo</i>
								<a href="https://api.whatsapp.com/send?phone=6281122202220&text=%23simpati" target="_blank">+62-811-2220-2220</a>
							</div>
						</div>
					</div>
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<!-- Info Box -->
						<div class="info-box">
							<div class="box-inner">
								<span class="icon flaticon-email"></span>
								<i>Direct <br> Email</i>
								<a href="mailto:info@cilelessmart.go.id" target="_blank">info@cilelessmart.go.id</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Info Section -->

	<!-- Sambutan Section -->
	<section class="services-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title clearfix">
				<div class="row">
					<div class="col-md-6">
						<div class="pull-left">
							<h2>Sambutan <br> Kepala Desa Cileles.</h2>
						</div>
					</div>
					<div class="col-md-6">
						<div class="pull-right">
								<div class="text">
								Salam sejahtera bagi seluruh masyarakat desa Cileles dan pengunjung. Kami dengan gembira mempersembahkan Cileles Smart, sebuah platform inovatif yang didedikasikan untuk meningkatkan kualitas hidup dan kemajuan desa kita.<br>
								Melalui Cileles Smart, kami berkomitmen untuk memberikan akses lebih mudah dan cepat kepada Anda terkait informasi, layanan publik, serta berbagai kegiatan dan program yang diadakan di desa ini. Kami percaya bahwa teknologi dapat menjadi alat yang efektif untuk mendorong perkembangan desa, memperkuat partisipasi masyarakat, dan menjalin sinergi yang lebih baik antara warga dan pemerintah.
								</div>
								<a class="more-service" href="{{url('profile-desa-cileles')}}">Profile Desa<span class="flaticon-next-2"></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Sambutan Section -->

	<!-- Info Warga -->
	<section class="counter-wrap mb-6">
		<div class="auto-container">
			<div class="lower-box">
				
				<div class="row clearfix">
							
					<!-- Counter Column -->
					<div class="counter-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-block">
							<div class="counter"><span class="odometer" data-count="6502"></span></div>
							<div class="counter-text">Jiwa</div>
						</div>
					</div>
					
					<!-- Counter Column -->
					<div class="counter-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-block">
							<div class="counter"><span class="odometer" data-count="3366"></span></div>
							<div class="counter-text">Total Laki-Laki</div>
						</div>
					</div>
					
					<!-- Counter Column -->
					<div class="counter-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-block">
							<div class="counter"><span class="odometer" data-count="3136"></span></div>
							<div class="counter-text">Total Perempuan</div>
						</div>
					</div>
					
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Info Warga -->

	<section class="strategy-section">
		<div class="auto-container">
			<div class="row clearfix">
			
				<!-- Title Box -->
				<div class="title-column col-lg-12 col-md-12 col-sm-12">
					<div class="inner-column">
						<h2>Layanan Darurat</h2>
						<p>Digunakan bila saat situasi darurat, system akan integrasi dengan layanan dibawah. Gunakan dengan bijak.</p>
					</div>
				</div>
				
				<!-- Block Box -->
				<div class="blocks-column col-lg-12 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="row clearfix">
							
							<!-- Service Block Two -->
							<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
								<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
									<div class="icon flaticon-security"></div>
									<h5><a href="tel:0261-123123123">Pemadam Kebakaran</a></h5>
									<div class="text">Tanggap, cepat, aman. Lindungi nyawa dan harta dari ancaman api.</div>
								</div>
							</div>
							
							<!-- Service Block Two -->
							<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
								<div class="inner-box wow fadeInLeft" data-wow-delay="150ms" data-wow-duration="1500ms">
									<div class="icon flaticon-shield"></div>
									<h5><a href="tel:0261-321312312">Kepolisian</a></h5>
									<div class="text"> Panggilan cepat untuk bantuan polisi dalam situasi darurat dan keamanan.</div>
								</div>
							</div>
							
							<!-- Service Block Two -->
							<div class="service-block-two col-lg-4 col-md-6 col-sm-12">
								<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
									<div class="icon flaticon-heart"></div>
									<h5><a href="tel:0261-321312312">Kesehatan</a></h5>
									<div class="text">Respons cepat, penanganan medis mendesak. Tersedia 24/7. Keselamatan Warga prioritas kami.</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Strategy Section -->
	
	<!-- Infografis Section -->
	<section class="pricing-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>Geografis Desa Cileles</h2>
			</div>
			<div class="row clearfix">
			
				<!-- Package Column -->
				<div class="package-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						
						<img src="{{ asset('assets/images/map.png')}}" alt="">
						
					</div>
				</div>
				<!-- Pricing Column -->
				<div class="pricing-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						
						
						<div class="price-box">
							<div class="box-inner d-flex justify-content-between align-items-center">
								<div class="title">
									<span class="icon fa fa-check"></span>
									<h5>Jumlah RW</h5>
								</div>
								<div class="price">10 <sub>RW</sub></div>
							</div>
						</div>
						
						
						<div class="price-box">
							<div class="box-inner d-flex justify-content-between align-items-center">
								<div class="title">
									<span class="icon fa fa-check"></span>
									<h5>Pemukiman</h5>
								</div>
								<div class="price">64,20<sub>Ha</sub></div>
							</div>
						</div>
						
						
						<div class="price-box">
							<div class="box-inner d-flex justify-content-between align-items-center">
								<div class="title">
									<span class="icon fa fa-check"></span>
									<h5>Tanah Sawah</h5>
								</div>
								<div class="price">63,72 <sub>Ha</sub></div>
							</div>
						</div>
						
						
						<div class="price-box">
							<div class="box-inner d-flex justify-content-between align-items-center">
								<div class="title">
									<span class="icon fa fa-check"></span>
									<h5>Kebun</h5>
								</div>
								<div class="price">42,40 <sub>Ha</sub></div>
							</div>
						</div>

						<div class="price-box">
							<div class="box-inner d-flex justify-content-between align-items-center">
								<div class="title">
									<span class="icon fa fa-check"></span>
									<h5>Pemakaman</h5>
								</div>
								<div class="price">1,5 <sub>Ha</sub></div>
							</div>
						</div>

						<div class="price-box">
							<div class="box-inner d-flex justify-content-between align-items-center">
								<div class="title">
									<span class="icon fa fa-check"></span>
									<h5>Sekolahan</h5>
								</div>
								<div class="price">2,5 <sub>Ha</sub></div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Pricing Section -->
	
	<!-- Testimonial Section -->
    <section class="testimonial-section" style="background-image: url('{{ asset('assets/images/banner1.jpg') }}')">
		<div class="auto-container">
			<!-- Content Boxed -->
			<div class="content-boxed">
				<div class="inner-box" style="background-image: url(images/main-slider/pattern-1.png)">
					<div class="single-item-carousel owl-carousel owl-theme">
						
						<!-- Testimonial Block -->
						<div class="testimonial-block">
							<div class="block-inner">
								<div class="author-image">
									<img src="{{asset('images/foto1.png')}}" alt="" />
								</div>
								<div class="text">"Sebagai Kepala Desa Cileles, saya bangga melihat transformasi luar biasa yang telah dicapai melalui platform Cileles Smart. Dengan kerja keras dan tekad, kami telah menghadirkan solusi modern yang meningkatkan kualitas hidup warga desa. Bersama-sama, kita mengarah ke masa depan yang cerdas dan berkelanjutan."</div>
								<h5>Duduy Abdul Kholik, S.H.</h5>
								<div class="designation">Kepala Desa Cileles</div>
							</div>
						</div>
						
						<!-- Testimonial Block -->
						<div class="testimonial-block">
							<div class="block-inner">
								<div class="author-image">
									<img src="{{asset('images/foto1.png')}}" alt="" />
								</div>
								<div class="text">"Sebagai Kepala Desa Cileles, saya bangga melihat transformasi luar biasa yang telah dicapai melalui platform Cileles Smart. Dengan kerja keras dan tekad, kami telah menghadirkan solusi modern yang meningkatkan kualitas hidup warga desa. Bersama-sama, kita mengarah ke masa depan yang cerdas dan berkelanjutan."</div>
								<h5>Duduy Abdul Kholik, S.H.</h5>
								<div class="designation">Kepala Desa Cileles</div>
							</div>
						</div>
						
						<!-- Testimonial Block -->
						<div class="testimonial-block">
							<div class="block-inner">
								<div class="author-image">
									<img src="{{asset('images/foto1.png')}}" alt="" />
								</div>
								<div class="text">"Sebagai Kepala Desa Cileles, saya bangga melihat transformasi luar biasa yang telah dicapai melalui platform Cileles Smart. Dengan kerja keras dan tekad, kami telah menghadirkan solusi modern yang meningkatkan kualitas hidup warga desa. Bersama-sama, kita mengarah ke masa depan yang cerdas dan berkelanjutan."</div>
								<h5>Duduy Abdul Kholik, S.H.</h5>
								<div class="designation">Kepala Desa Cileles</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->
	
	<!-- Project Section -->
	<section class="projects-section">
		<div class="outer-container">
			<div class="sec-title centered">
				<h2>Kegiatan</h2>
				<div class="text">Temukan cerita menarik dari setiap langkah kami. Ikuti perjalanan kami dalam beragam kegiatan.</div>
			</div>
			<div class="services-carousel owl-carousel owl-theme">
			
				<!-- Project Block -->
				@foreach ($kegiatan as $kegiatan)
				<div class="project-block">
					<div class="inner-box">
						<div class="image">
							<img src="{{asset('images/'. $kegiatan->gambar)}}" alt="" />
							<div class="overlay-box">
								<div class="content">
									<h4><a href="#">{{$kegiatan->judul}}</a></h4>
									<div class="title">{{$kegiatan->kategori}}</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
				@if (count($kegiatan) == 0)
				<div class="no-data text-center">
					<img src="{{ asset('assets/images/no-access.png') }}" alt="No Data" style="width:30%;" />
					<h5>Tidak ada Kegiatan.</h5>
				</div>
				@endif
		</div>
	</section>
	<!-- End Project Section -->

	<!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
			<div class="row clearfix">
				<!-- Title Column -->
				<div class="title-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
						<!-- Sec Title -->
						<div class="sec-title">
							<h2>Berita dan Informasi</h2>
							<div class="text">
								Mari tetap terhubung dengan "Berita dan Informasi" untuk tetap up-to-date dengan perkembangan terkini serta ikut serta dalam kegiatan dan program yang turut membentuk masa depan cerah bagi Desa Cileles kita semua.
							</div>
						</div>
						<div class="button-box">
							<a href="{{url('/berita-desa')}}" class="theme-btn btn-style-two">
								<span class="btn-wrap">
									<span class="text-one">Lihat Semua</span>
									<span class="text-two">Lihat Semua</span>
								</span>
							</a>
						</div>
					</div>
				</div>
				<!-- Blocks Column -->
				<div class="blocks-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
					@if (count($berita) > 0)
						@foreach ($berita as $berita)
						<!-- News Block -->
						<div class="news-block">
							<div class="inner-box d-flex justify-content-between">
								<!-- Info Box -->
								<div class="row">
									<div class="col-md-3">
										<div class="news-info-box">
											<div class="author-image">
												<img src="{{asset('images/'. $berita->gambar)}}" alt="{{ $berita->judul}}" />
											</div>
											<div class="author-name">By: <span>{{ $berita->penulis }}</span></div>
											<div class="post-time">{{ $berita->created_at->format('d M Y')}}</div>
										</div>
									</div>
									<div class="col-md-6">
										<!-- Middle Content -->
										<div class="middle-content">
											<h4><a href="{{ route('berita.single', $berita->judul) }}">{{ $berita->judul}}</a></h4>
											<div class="text singkat">{!! $berita->konten !!}</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="read-more">
											<a class="more-service" href="{{ route('berita.single', $berita->judul) }}">Selengkapnya <span class="flaticon-next-2"></span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					@else
					<div class="no-data text-center">
						<img src="{{ asset('assets/images/no-access.png') }}" alt="No Data" style="width:50%;" />
						<h5>Tidak ada berita yang tersedia saat ini.</h5>
					</div>
					@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End News Section -->
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush