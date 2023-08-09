<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('admin/assets')}}" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon/favicon.ico')}}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/fonts/boxicons.css')}}" />
  <!-- Core CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
  <script src="{{asset('admin/assets/vendor/js/helpers.js')}}"></script>
  <script src="{{asset('admin/assets/js/config.js')}}"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
        @include('partials.sidebar')
        @include('partials.navbar')
        <div>
          @yield('container')
        </div>
        @include('partials.footer')
        <div class="row">
          <!-- Content here -->
        </div>
        <div class="content-backdrop fade"></div>
      </aside>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{asset('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('admin/assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="{{asset('admin/assets/js/main.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  @yield('js')
</body>

</html>
