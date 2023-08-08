<!-- Preloader -->
	<div class="loader-wrap">
        <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
        <div class="layer layer-one"><span class="overlay"></span></div>
        <div class="layer layer-two"><span class="overlay"></span></div>        
        <div class="layer layer-three"><span class="overlay"></span></div>        
    </div>
 	
 	<!-- Main Header -->
    <header class="main-header">
    	
        <!-- Header Lower -->
        <div class="header-lower">
            
			<div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center">
					
					<div class="logo-box">
						<div class="logo"><a href="index.html"><img src="{{asset('assets/images/logobaru.png')}}" alt="" title=""></a></div>
					</div>
					<div class="nav-outer clearfix">
						
						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
						<!-- Main Menu -->
						<nav class="main-menu show navbar-expand-md">
							<div class="navbar-header">
								<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
							<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<ul class="navigation clearfix">
									<li><a href="#">Home</a></li>
									<li><a href="#">Profile</a></li>
									<li><a href="#">Informasi</a></li>
									<li><a href="#">Sijamil</a></li>
									<li><a href="#">Sibangenan</a></li>
									<li><a href="#">Berita</a></li>
								</ul>
							</div>
							
						</nav>
						<!-- Main Menu End-->
					</div>
					
					<!-- Outer Box -->
					<div class="outer-box clearfix">
						
						<!-- Nav Btn -->
						<div class="nav-btn navSidebar-button"><span class="icon"><img src="{{asset('user-pages/images/icons/bars.png')}}" alt="" /></span></div>
					</div>
					<!-- End Outer Box -->
					
				</div>
				
			</div>
        </div>
        <!-- End Header Lower -->
        
		<!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html" title=""><img src="{{ asset('assets/images/logobaru.png') }}" alt="" title=""></a>
					</div>
					
					<div>
						<!-- Main Menu -->
						<nav class="main-menu">
							<!--Keep This Empty / Menu will come through Javascript-->
						</nav>
						<!-- Main Menu End-->
						
						<!-- Mobile Navigation Toggler -->
						<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					</div>
					
				</div>
            </div>
        </div>
		<!-- End Sticky Menu -->
    
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            <nav class="menu-box">
                <div class="nav-logo"><a href="{{ url('/') }}"><img src="{{ asset('assets/images/logocilelessmartwhite.png')}}" alt="Logo Cileles Smart" title=""></a></div>
				<!-- Search -->
				<div class="search-box">
					<form method="post" action="contact.html">
						<div class="form-group">
							<input type="search" name="search-field" value="" placeholder="SEARCH HERE" required>
							<button type="submit"><span class="icon flaticon-search-1"></span></button>
						</div>
					</form>
				</div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div>
		<!-- End Mobile Menu -->
	
    </header>
    <!-- End Main Header -->
	
	<!-- Sidebar Cart Item -->
	<div class="xs-sidebar-group info-group">
		<div class="xs-overlay xs-bg-black"></div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="widget-heading">
					<a href="#" class="close-side-widget">
						X
					</a>
				</div>
				<div class="sidebar-textwidget">
					
					<!-- Sidebar Info Content -->
					<div class="sidebar-info-contents">
						<div class="content-inner">
							<div class="logo">
								<a href="{{ url('/') }}"><img src="{{ asset('assets/images/logocilelessmartwhite.png')}}" alt="Logo Cileles Smart" /></a>
							</div>
							<div class="content-box">
								<p class="text">Melalui Cileles Smart, kami berkomitmen untuk memberikan akses lebih mudah dan cepat kepada masyarakat terkait informasi, layanan publik, serta berbagai kegiatan dan program yang diadakan di Desa Cileles</p>
							</div>
							<div class="contact-info">
								<h5>Contact Info</h5>
								<ul class="list-style-one">
									<li><span class="icon fa fa-location-arrow"></span>Jl. Cikuda No.18, Cileles, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363</li>
									<li><span class="icon fa fa-phone"></span>(111) 111-111-1111</li>
									<li><span class="icon fa fa-envelope"></span>info@cilelessmart.go.id</li>
									<li><span class="icon fa fa-clock-o"></span>Senin - Jum'at: 08.00 to 16.00 <br>Sabtu-Minggu: Closed</li>
								</ul>
							</div>
							<!-- Social Box -->
							<ul class="social-box">
								<li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
								<li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
								<li><a href="https://dribbble.com/" class="fa fa-youtube"></a></li>
								<li><a href="https://www.linkedin.com/" class="fa fa-instagram"></a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- END sidebar widget item -->