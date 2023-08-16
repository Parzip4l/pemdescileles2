@extends('layout.masteruser2')
@section('content') 
<section class="page-title">
		<div class="auto-container">
            <div class="content">
				<h2>Detail Berita</h2>
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
                	<div class="blog-detail">
						<div class="inner-box">
							<div class="image">
								<img src="{{ asset('images/' .$berita->gambar) }}" alt="" />
							</div>
							<div class="lower-content">
								<ul class="post-meta">
									<li><span class="flaticon-user-3"></span> {{$berita->penulis}}</li>
									<li><span class="flaticon-calendar"></span> {{$berita->created_at->format('d M Y')}}</li>
								</ul>
								<h3>{{$berita->judul}}</h3>
								{!! $berita->konten !!}
							</div>
							
							<!-- Post Share Options-->
							<div class="post-share-options">
								<div class="post-share-inner clearfix">
									<div class="tags"><span class="tags">Tags:</span><a href="#">Business</a> <a href="#">Design </a><a href="#">apps</a> <a href="#">data</a></div>
									<ul class="social-box">
										<span class="share">Share Article:</span>
										<li class="facebook"><a href="#"><span class="fa fa-facebook-square"></span></a></li>
										<li class="twitter"><a href="#"><span class="fa fa-twitter-square"></span></a></li>
										<li class="linkedin"><a href="#"><span class="fa fa-linkedin-square"></span></a></li>
										<li class="pinterest"><a href="#"><span class="fa fa-whatsapp"></span></a></li>
									</ul>
								</div>
							</div>
							<!-- End Post Share Options-->
							
						</div>
						
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
								@csrf
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
					</aside>
				</div>
				
			</div>
		</div>
	</div>
@endsection