<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Cileles Smart Web Apps || MELAJU BERMARTABAT MENUJU CILELES SMART">
	<meta name="author" content="Rinable Creative">
	<meta name="keywords" content="desacileles, cileles, smartvillages">

  <title>Cileles Smart - Smart Village Cileles</title>

  <!-- Stylesheet -->
  <link href="{{ asset('user-pages/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('user-pages/css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('user-pages/css/responsive.css')}}" rel="stylesheet">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  <link href="{{ asset('user-pages/css/color-switcher-design.css') }}" rel="stylesheet">

  <!-- Color Themes -->
  <link id="theme-color-file" href="{{ asset('user-pages/css/color-themes/default-color.css') }}" rel="stylesheet">
  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  
  <link rel="shortcut icon" href="{{ asset('assets/images/icon.ico') }}">
  <script src="{{asset('user-pages/js/jquery.js')}}"></script>
  <meta name="google-site-verification" content="PA26qfan6-ZHohDXlOck5W7WozJpx1rEzUpJA7Da2fQ" />
</head>
<body data-base-url="{{url('/')}}">

  <div class="main-wrapper" id="app">
    <div class="page-wrapper-user">
        @include('layout.headeruser2')
        <div class="page-content">
            @yield('content')
        </div>
            @include('layout.footeruser')
    </div>
  </div>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->
    <script src="{{asset('user-pages/js/jquery.js')}}"></script>
    <script src="{{asset('user-pages/js/popper.min.js')}}"></script>
    <script src="{{asset('user-pages/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('user-pages/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('user-pages/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('user-pages/js/appear.js')}}"></script>
    <script src="{{asset('user-pages/js/parallax.min.js')}}"></script>
    <script src="{{asset('user-pages/js/tilt.jquery.min.js')}}"></script>
    <script src="{{asset('user-pages/js/jquery.paroller.min.js')}}"></script>
    <script src="{{asset('user-pages/js/owl.js')}}"></script>
    <script src="{{asset('user-pages/js/wow.js')}}"></script>
    <script src="{{asset('user-pages/js/odometer.js')}}"></script>
    <script src="{{asset('user-pages/js/mixitup.js')}}"></script>
    <script src="{{asset('user-pages/js/TweenMax.min.js')}}"></script>
    <script src="{{asset('user-pages/js/backToTop.js')}}"></script>
    <script src="{{asset('user-pages/js/nav-tool.js')}}"></script>
    <script src="{{asset('user-pages/js/jquery-ui.js')}}"></script>
    <script src="{{asset('user-pages/js/script.js')}}"></script>
    <script src="{{asset('user-pages/js/color-settings.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>

    <!-- common js -->
    <!-- end common js -->
    @stack('custom-scripts')
</body>
</html>