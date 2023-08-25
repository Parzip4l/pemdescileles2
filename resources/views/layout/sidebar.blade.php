<nav class="sidebar">
  <div class="sidebar-header">
    <a href="#" class="sidebar-brand" style="font-size:22px;">
      CILELES<span>SMART</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item {{ active_class(['dashboard']) }}">
        <a href="{{ url('/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      @if(Auth::check() && Auth::user()->level == 1)
      <li class="nav-item nav-category">Master Data</li>
      <li class="nav-item {{ active_class(['email/*']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#email" role="button" aria-expanded="{{ is_active_route(['email/*']) }}" aria-controls="email">
          <i class="link-icon" data-feather="mail"></i>
          <span class="link-title">Layanan Publik</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['email/*']) }}" id="email">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="" class="nav-link ">Layanan Kesehatan</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link ">Layanan Surat Menyurat</a>
            </li>
          </ul>
        </div>
      </li>
      @endif
      @if(Auth::check() && Auth::user()->level == 1)
      <li class="nav-item {{ active_class(['warga']) }}">
        <a href="{{ url('/warga') }}" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
          <span class="link-title">Data Warga</span>
        </a>
      </li>
      @endif
      <li class="nav-item {{ active_class(['sibangenan']) }}">
        <a href="{{ url('/sibangenan') }}" class="nav-link">
          <i class="link-icon" data-feather="briefcase"></i>
          <span class="link-title">Si Bangenan</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['sijamilaal']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#sijamilcomponent" role="button" aria-expanded="{{ is_active_route(['sijamilaal']) }}" aria-controls="sijamilcomponent">
          <i class="link-icon" data-feather="user-check"></i>
          <span class="link-title">Si Jamil</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['sijamil']) }}" id="sijamilcomponent">
          <ul class="nav sub-menu">
            @if(Auth::check() && Auth::user()->level == 1)
            <li class="nav-item">
              <a href="{{ url('sijamil') }}" class="nav-link {{ active_class(['sijamil']) }}">Semua Data</a>
            </li>
            @endif
            <li class="nav-item">
              <a href="{{ url('remajadata') }}" class="nav-link {{ active_class(['remajadata']) }}">Data Remaja</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/bumildata') }}" class="nav-link {{ active_class(['bumildata']) }}">Data Ibu Hamil</a>
            </li>
          </ul>
        </div>
      </li>
      @if(Auth::check() && Auth::user()->level == 1)
      <li class="nav-item {{ active_class(['apps/calendar']) }}">
        <a href="{{ url('/apps/calendar') }}" class="nav-link">
          <i class="link-icon" data-feather="heart"></i>
          <span class="link-title">Data Kesehatan</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['publikasi-data']) }}">
        <a href="{{ url('/publikasi-data') }}" class="nav-link">
          <i class="link-icon" data-feather="clipboard"></i>
          <span class="link-title">Publikasi Data</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['kritik-saran-page']) }}">
        <a href="{{ url('/kritik-saran-page') }}" class="nav-link">
          <i class="link-icon" data-feather="compass"></i>
          <span class="link-title">Kritik & Saran</span>
        </a>
      </li>
      @endif
      <li class="nav-item nav-category">Informasi Publik</li>
      <li class="nav-item {{ active_class(['berita']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#beritacomponent" role="button" aria-expanded="{{ is_active_route(['berita']) }}" aria-controls="beritacomponent">
          <i class="link-icon" data-feather="file-text"></i>
          <span class="link-title">Berita</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['berita']) }}" id="beritacomponent">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('berita/create') }}" class="nav-link {{ active_class(['berita/create']) }}">Buat Berita</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('berita') }}" class="nav-link {{ active_class(['berita']) }}">Semua Berita</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/kategoriberita') }}" class="nav-link {{ active_class(['kategoriberita']) }}">Kategori Berita</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ active_class(['Kegiatan/']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#kegiatan" role="button" aria-expanded="{{ is_active_route(['kegiatan/*']) }}" aria-controls="kegiatan">
          <i class="link-icon" data-feather="camera"></i>
          <span class="link-title">Kegiatan</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['Kegiatan/*']) }}" id="kegiatan">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('kegiatan/create') }}" class="nav-link {{ active_class(['kegiatan/create']) }}">Buat Kegiatan</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kegiatan') }}" class="nav-link {{ active_class(['kegiatan']) }}">Semua Kegiatan</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('kategori-kegiatan') }}" class="nav-link {{ active_class(['kategori-kegiatan']) }}">Kategori Kegiatan</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ active_class(['umkm']) }}">
        <a href="{{ url('/umkm') }}" class="nav-link">
          <i class="link-icon" data-feather="shopping-bag"></i>
          <span class="link-title">UMKM</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['layanan-darurat']) }}">
        <a href="{{ url('/layanan-darurat') }}" class="nav-link">
          <i class="link-icon" data-feather="alert-triangle"></i>
          <span class="link-title">Layanan Darurat</span>
        </a>
      </li>
      @if(Auth::check() && Auth::user()->level == 1)
      <li class="nav-item nav-category">App Settings</li>
      <li class="nav-item {{ active_class(['usersettings']) }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#UserSettings" role="button" aria-expanded="{{ is_active_route(['usersettings']) }}" aria-controls="UserSettings">
          <i class="link-icon" data-feather="lock"></i>
          <span class="link-title">User Settings</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse {{ show_class(['usersettings']) }}" id="UserSettings">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{ url('user-settings') }}" class="nav-link {{ active_class(['user-settings']) }}">Semua User</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('user-level') }}" class="nav-link {{ active_class(['user-level']) }}">User Level</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ active_class(['user-log']) }}">
        <a href="{{ url('user-log') }}" class="nav-link">
          <i class="link-icon" data-feather="activity"></i>
          <span class="link-title">User Activity</span>
        </a>
      </li>
      <li class="nav-item {{ active_class(['setting-page']) }}">
        <a href="{{ url('setting-page') }}" class="nav-link">
          <i class="link-icon" data-feather="settings"></i>
          <span class="link-title">Settings</span>
        </a>
      </li>
      @endif
    </ul>
  </div>
</nav>