<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-4">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="">
      <img
        src="{{ asset('assets/images/logosumedang.png') }}"
        height="55"
        alt="Cileles Smart Logo"
        loading="lazy"
        style="margin-top: -1px;"
      />
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i data-feather="menu"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Layanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Informasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sijamil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sibangenen</a>
        </li>
        <li class="nav-item">
          <a href="{{('/login')}}" class="btn btn-custom btn-primary ms-3">LOGIN</a>
        </li>
      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
        <a href="{{('/login')}}" class="btn btn-custom btn-primary ms-3">LOGIN</a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->