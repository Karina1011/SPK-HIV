<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">

@if (Auth::user()->role == 'admin'|| Auth::user()->role == 'dokter')
  <!-- Dashboard -->
  <li class="menu-item">
    <a href="/dashboard" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Analytics">Dashboard</div>
    </a>
  </li>

  <!-- Layouts -->
  <li class="menu-item">
    <a href="/user/index" class="menu-link">
      <i class="menu-icon tf-icons bx bx-layout"></i>
      <div data-i18n="Layouts">Layouts</div>
    </a>

  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Menu</span>
    <li class="menu-item">
    <a
      href="/profil"
      class="menu-link"
    >
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Profil Admin</div>
    </a>
  </li>
  <li class="menu-item">
    <a
      href="/edukasi"
      class="menu-link"
    >
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Edukasi Seks</div>
    </a>
  </li>
  <li class="menu-item">
    <a
      href="/gejala"
      class="menu-link"
    >
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Data Gejala</div>
    </a>
  </li>
  <li class="menu-item">
    <a
      href="/penyakit"
      class="menu-link"
    >
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Data Penyakit</div>
    </a>
  </li>
  <li class="menu-item">
    <a
      href="/Pasien"
      class="menu-link"
    >
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Data Pasien</div>
    </a>
  </li>
  @endif
  @if(Auth::user()->role !== 'dokter')
  <li class="menu-item">
    <a href="javascript:void(0);" class="menu-link">
      <i class="menu-icon tf-icons bx bx-cube-alt"></i>
      <div data-i18n="Misc">Rule/Aturan</div>
    </a>
  </li>
  <!-- Misc -->
  <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengaturan</span></li>
  <li class="menu-item">
    <a
      href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
      target="_blank"
      class="menu-link"
    >
      <i class="menu-icon tf-icons bx bx-support"></i>
      <div data-i18n="Support">Pengguna</div>
    </a>
  </li>
  @endif
  <li class="menu-item">
    <a
      href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
      target="_blank"
      class="menu-link"
    >
      <i class="menu-icon tf-icons bx bx-file"></i>
      <div data-i18n="Documentation">Documentation</div>
    </a>
  </li>
</ul>
</aside>
<!-- / Menu -->