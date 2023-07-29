<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <span class="menu-text fw-bolder" style="font-size: 25px;">SPK-HIV</span>
  </div>

@if (Auth::user()->role == 'admin'|| Auth::user()->role == 'dokter')

<ul class="menu-inner py-1">
  <!-- Dashboard -->
  <li class="menu-item">
    <a href="{{ url ('/dashboard') }}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Analytics">Dashboard</div>
    </a>
  </li>

  <!-- Layouts -->
  <li class="menu-item">
    <a href="{{ url ('/beranda')}}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-layout"></i>
      <div data-i18n="Layouts">Layouts</div>
    </a>

  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Data Master </span>
      <!-- Profile -->
    <li class="menu-item">
    <a href="/profil"
      class="menu-link">
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Profil Admin</div>
    </a>
  </li>

  <li class="menu-item">
    <a href="{{ url ('/gejala')}}"
      class="menu-link">
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Data Gejala</div>
    </a>
  </li>

  <li class="menu-item">
    <a href="{{ url ('/penyakit')}}"
      class="menu-link">
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Data Penyakit</div>
    </a>
  </li>

  <li class="menu-item">
    <a href="{{ url ('/rule')}}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-cube-alt"></i>
      <div data-i18n="Misc">Rule/Aturan</div>
    </a>
  </li>

  <li class="menu-item">
    <a href="{{url('/riwayat')}}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-cube-alt"></i>
      <div data-i18n="Misc">Riwayat Diagnosa</div>
    </a>
  </li>

  @endif
  @if(Auth::user()->role !== 'dokter')

  <li class="menu-item">
    <a href="{{ url ('/pengguna')}}"
      class="menu-link">
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Data Pengguna</div>
    </a>
  </li>

  <li class="menu-item">
    <a href="{{ url ('/edukasi')}}"
      class="menu-link">
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Edukasi Seks</div>
    </a>
  </li>
  <!-- Pengaturan -->
  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Pengaturan</span>
  </li>
  <li class="menu-item">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-layout"></i>
      <div data-i18n="Layouts">Pengaturan</div>
    </a>

    <ul class="menu-sub">
  <li class="menu-item">
    <a href="/tentang" class="menu-link">
      <i class="menu-icon tf-icons bx bx-cube-alt"></i>
      <div data-i18n="Misc">Tentang</div>
    </a>
  </li>
  @endif <!-- Menutup kondisi untuk role admin atau dokter -->
</ul>

@if (Auth::user()->role == 'admin' || Auth::user()->role == 'dokter')
<li class="menu-item">
  <a href="{{ url('/logout') }}" class="menu-link" id="logout-btn">
    <i class="menu-icon tf-icons bx bx-log-out"></i>
    <div data-i18n="Misc">Logout</div>
  </a>
</li>
@endif <!-- Menutup kondisi untuk role admin atau dokter -->
</aside>

</li>
</aside>
<!-- / Menu -->