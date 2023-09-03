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
							<div class="counter"><span class="odometer" data-count="6419"></span></div>
							<div class="counter-text">Jiwa</div>
						</div>
					</div>
					
					<!-- Counter Column -->
					<div class="counter-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-block">
							<div class="counter"><span class="odometer" data-count="3267"></span></div>
							<div class="counter-text">Total Laki-Laki</div>
						</div>
					</div>
					
					<!-- Counter Column -->
					<div class="counter-block col-lg-4 col-md-6 col-sm-12">
						<div class="inner-block">
							<div class="counter"><span class="odometer" data-count="3152"></span></div>
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
		<div class="auto-container">
			<div class="sec-title centered">
				<h2>Kegiatan</h2>
				<div class="text">Temukan cerita menarik dari setiap langkah kami. Ikuti perjalanan kami dalam beragam kegiatan.</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/CwRoMDpvYkv/?utm_source=ig_embed&utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/CwRoMDpvYkv/?utm_source=ig_embed&utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/CwRoMDpvYkv/?utm_source=ig_embed&utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Pemdes Cileles Official (@pemdescileles)</a></p></div></blockquote>
					<script async onerror="var a=document.createElement('script');a.src='https://iframely.net/files/instagram_embed.js';document.body.appendChild(a);" src="https://www.instagram.com/embed.js"></script>
				</div>
				<div class="col-md-4">
					<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/CwJycDBuHaI/?utm_source=ig_embed&utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/CwJycDBuHaI/?utm_source=ig_embed&utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/CwJycDBuHaI/?utm_source=ig_embed&utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Pemdes Cileles Official (@pemdescileles)</a></p></div></blockquote>
					<script async onerror="var a=document.createElement('script');a.src='https://iframely.net/files/instagram_embed.js';document.body.appendChild(a);" src="https://www.instagram.com/embed.js"></script>
				</div>
				<div class="col-md-4">
					<blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/reel/CwJt65rt1Hr/?utm_source=ig_embed&utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/reel/CwJt65rt1Hr/?utm_source=ig_embed&utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/reel/CwJt65rt1Hr/?utm_source=ig_embed&utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by Pemdes Cileles Official (@pemdescileles)</a></p></div></blockquote>
					<script async onerror="var a=document.createElement('script');a.src='https://iframely.net/files/instagram_embed.js';document.body.appendChild(a);" src="https://www.instagram.com/embed.js"></script>
				</div>
			</div>
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
											{!! $berita->excerpt !!}
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
	<!-- Flying Banner -->
	<!-- <div class="flying-banner">
		<div class="banner-content">
			<img src="{{asset('assets/images/flyingbanner.jpg')}}" alt="" class="mb-3">
			<button id="close-banner" class="btn btn-danger">Tutup</button>
		</div>
	</div>
	<div class="blur-background"></div> -->
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush
@push('custom-scripts')
<style>
	.flying-banner {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		z-index: 9999;
		background-color: #fff;
		padding: 10px;
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
		display: none;
		width: 30%;

		animation: fadeInUp 0.5s ease-in-out;
	}

	@keyframes fadeInUp {
		0% {
			transform: translate(-50%, 100%);
			opacity: 0;
		}
		100% {
			transform: translate(-50%, -50%);
			opacity: 1;
		}
	}

.banner-content {
    text-align: center;
}

/* Gaya latar belakang blur */
.blur-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 9998;
    display: none;
    backdrop-filter: blur(5px); /* Efek blur latar belakang (CSS Filter) */
}

@media (max-width:675px){
	.flying-banner {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		z-index: 9999;
		background-color: #fff;
		padding: 10px;
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
		display: none;
		width: 90%;
	}
}

/* Gaya tombol close */
</style>
<script>
// Fungsi untuk menampilkan flying banner dan efek blur
function showBanner() {
    document.querySelector('.flying-banner').style.display = 'block';
    document.querySelector('.blur-background').style.display = 'block';
}

// Fungsi untuk menyembunyikan flying banner dan efek blur
function hideBanner() {
    document.querySelector('.flying-banner').style.display = 'none';
    document.querySelector('.blur-background').style.display = 'none';
}

// Event listener untuk tombol close
document.querySelector('#close-banner').addEventListener('click', hideBanner);

// Panggil fungsi showBanner() ketika halaman utama dimuat
document.addEventListener('DOMContentLoaded', function () {
    showBanner();
});
</script>
@endpush