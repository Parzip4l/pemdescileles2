<section class="trial-section-two">
	<div class="pattern-layer" style="background-image: url('{{asset('images/background/pattern-3.png')}}')"></div>
	<div class="auto-container">
		<div class="inner-container">
			<div class="row clearfix">
				<!-- Title Column -->
				<div class="title-column col-lg-6 col-md-12 col-sm-12 align-self-center">
					<div class="inner-column">
						<div class="sec-title-four light">
							<div class="title">Kritik & Saran</div>
							<h2>Berikan Kritik & Saran Anda Untuk Kemajuan Bersama</h2>
						</div>
					</div>
				</div>
				<!-- Form Column -->
				<div class="form-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						
						<!-- Trail Form -->
						<div class="trail-form">
							
							<form method="POST" action="{{ route('kritik.store') }}">
								@csrf
								<div class="form-group">
									<input type="text" name="nama" placeholder="Nama Lengkap" required>
								</div>
								
								<div class="form-group">
									<input type="text" name="nohp" placeholder="Nomor Telepon" required>
								</div>

								<div class="form-group">
									<input type="text" name="kritik" placeholder="Kritik & Saran Anda" required>
								</div>
								
								<div class="form-group">
									<button class="theme-btn btn-style-thirteen" type="submit">
										<span class="txt">Kirim</span>
									</button>
								</div>
								
							</form>
								
						</div>
						<!-- End Default Form -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Footer Style Two / Style Two -->
<footer class="footer-style-two style-two">
	<div class="auto-container">
		<!-- Widgets Section -->
		<div class="widgets-section">
			<div class="row clearfix">
				
				<!-- Column -->
				<div class="big-column col-lg-6 col-md-12 col-sm-12">
					<div class="row clearfix">
						
						<!-- Footer Column -->
						<div class="footer-column col-lg-6 col-md-6 col-sm-12">
							<div class="footer-widget logo-widget">
								<div class="logo mb-2">
									<a href="#"><img src="{{ asset('assets/images/logocilelessmartwhite.png')}}" alt="Logo Cileles Smart " /></a>
								</div>
								<div class="text">Melalui Cileles Smart, kami berkomitmen untuk memberikan akses lebih mudah dan cepat kepada masyarakat terkait informasi, layanan publik, serta berbagai kegiatan dan program yang diadakan di Desa Cileles</div>
								<!-- Social Box -->
								<ul class="social-box">
									<li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
									<li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
									<li><a href="https://www.instagram.com/pemdescileles/" class="fa fa-instagram"></a></li>
									<li><a href="https://www.youtube.com/" class="fa fa-youtube-play"></a></li>
								</ul>
							</div>
						</div>
						
						<!-- Footer Column -->
						<div class="footer-column col-lg-6 col-md-6 col-sm-12">
							<div class="footer-widget links-widget">
								<h6>Quick Links</h6>
								<ul class="page-list">
									<li><a href="{{url('/')}}">Home</a></li>
									<li><a href="{{url('/profile-desa-cileles')}}">Profile Desa</a></li>
									<li><a href="{{url('/berita-desa')}}">Berita dan Informasi</a></li>
									<li><a href="{{url('/dashboard-publik')}}">Sibangenan</a></li>
								</ul>
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- Column -->
				<div class="big-column col-lg-6 col-md-12 col-sm-12">
					<div class="row clearfix">
					
						<!-- Footer Column -->
						<div class="footer-column col-lg-6 col-md-6 col-sm-12">
							<div class="footer-widget links-widget">
								<h6>Layanan</h6>
								<ul class="page-list">
									<li><a href="{{url('/dashboard-publik')}}">Sibangenan</a></li>
									<li><a href="{{url('/dashboard-sijamil')}}">Sijamil</a></li>
									<li><a href="{{url('/berita-desa')}}">Berita dan Informasi</a></li>
									<li><a href="{{url('/informasi-publik')}}">Publikasi Data</a></li>
								</ul>
							</div>
						</div>
						
						<!-- Footer Column -->
						<div class="footer-column col-lg-6 col-md-6 col-sm-12">
							<div class="footer-widget newslatter-widget">
								<h6>Login Aplikasi</h6>
								<div class="text">Silahkan Login Untuk Bisa Mengajukan Pembangunan</div>
								<!-- Subscribe Form -->
								<div class="subscribe-form-two">
									<a href="{{url('/login')}}" class="theme-btn btn-style-thirteen w-100">
										<span class="btn-wrap w-100">
											<span class="txt w-100">Login</span>
										</span>
									</a>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		</div>
		
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="row clearfix">
				<!-- Column -->
				<div class="column col-lg-6 col-md-12 col-sm-12">
					<div class="copyright">&copy; 2023 <a href="#">Cileles Smart - Pemdes Cileles</a>. All Rights Reserved.</div>
				</div>
				<!-- Column -->
				<div class="column col-lg-6 col-md-12 col-sm-12">
					<ul class="pages-nav">
						<li><a href="#">Terms and conditions</a></li>
						<li><a href="#">Privacy policy</a></li>
						<li><a href="{{url('/login')}}">Login / Signup</a></li>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
</footer>
	<!-- End Footer Style Two / Style Two -->

<!-- Search Popup -->
<div class="search-popup">
	<div class="color-layer"></div>
	<button class="close-search"><span class="fa fa-arrow-up"></span></button>
	<form method="post" action="#">
		@csrf
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search Here" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- End Search Popup -->

<!-- scrollToTop start -->
<div class="progress-wrap active-progress">
	<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
	<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
	</svg>
</div>
<!-- scrollToTop end -->
@if(session('show_modal'))
    <div class="modal fade" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header centered">
                    <h5 class="modal-title" id="thankYouModalLabel" style="font-family:'Poppins'!important;">Terima Kasih</h5>
					<button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body centered">
					<div class="image">
						<img src="{{ asset('assets/images/robotics.png')}}" alt="" style="height:200px;">
					</div>
					<div class="text">
						Terimakasih atas kritik dan saran yang Anda berikan.
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger w-100" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#thankYouModal').modal('show');
        });
    </script>
@endif