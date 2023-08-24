 	<!-- Main Header / Header Style Five -->
    <header class="main-header header-style-five">
    	
        <!-- Header Lower -->
        <div class="header-lower">
            
			<div class="auto-container">
				<div class="inner-container d-flex justify-content-between align-items-center">
					
					<div class="logo-box">
						<div class="logo"><a href="{{url('/')}}"><img src="{{asset('assets/images/logobaru.png')}}" alt="" title=""></a></div>
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
									<li class="{{ request()->is('/') ? 'current' : '' }}"><a href="{{url('/')}}">Home</a></li>
									<li class="{{ request()->is('profile-desa-cileles') ? 'current' : '' }}"><a href="{{url('/profile-desa-cileles')}}">Profile</a></li>
									<li class="dropdown"><a href="#">Informasi</a>
										<ul>
											<li class="{{ request()->is('informasi-publik') ? 'current' : '' }}"><a href="{{url('/informasi-publik')}}">Data Publik</a></li>
											<li class="{{ request()->is('demografi-desa') ? 'current' : '' }}"><a href="{{url('/demografi-desa')}}">Demografi Desa</a></li>
										</ul>
									</li>
									<li class="{{ request()->is('dashboard-sijamil') ? 'current' : '' }}"><a href="{{url('/dashboard-sijamil')}}">Sijamil</a></li>
									<li class="{{ request()->is('dashboard-publik') ? 'current' : '' }}"><a href="{{url('/dashboard-publik')}}">Sibangenan</a></li>
									<li class="{{ request()->is('berita-desa') ? 'current' : '' }}"><a href="{{url('berita-desa')}}">Berita</a></li>
								</ul>
							</div>
							
						</nav>
						<!-- Main Menu End-->
					</div>
					
					<!-- Outer Box -->
					<div class="outer-box clearfix">
						
						<!-- Button Box -->
						<div class="button-box">
							<a href="{{ url('/login')}}" class="theme-btn btn-style-nine clearfix">
								<span class="btn-wrap">
									<span class="text-one">Login</span>
									<span class="text-two">Login</span>
								</span>
							</a>
						</div>
						<!-- End Button Box -->
						
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
						<a href="{{url('/')}}" title=""><img src="{{asset('assets/images/logobaru.png')}}" alt="" title=""></a>
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
                <div class="nav-logo"><a href="{{url('/')}}"><img src="{{ asset('assets/images/logocilelessmartwhite.png')}}" alt="Barnix" title=""></a></div>
				<!-- Search -->
				<div class="search-box">
					@csrf
					<form method="post" action="">
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