<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

     <!-- Favicon -->
     <link href="{{url('user2/img/favicon.ico')}}" rel="icon">

    <title>SPK HIV/AIDS</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('user/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/templatemo-space-dynamic.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('user/assets/css/owl.css')}}">

    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url('user2/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('user2/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{url('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    {{-- <!-- Customized Bootstrap Stylesheet -->
    <link href="{{url('user2/css/bootstrap.min.css')}}" rel="stylesheet"> --}}

    <!-- Template Stylesheet -->
    <link href="{{url('user2/css/style.css')}}" rel="stylesheet">
</head>
  </head>

<body>

  {{-- <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** --> --}}
<div>
  @include('pasien.partials.navbar2');
  <div>
    @yield('container')
  </div>
  @include('pasien.partials.footer')

  <!-- Scripts -->
  <script src="{{asset('user/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js">')}}"></script>
  <script src="{{asset('user/assets/js/owl-carousel.js')}}"></script>
  <script src="{{asset('user/assets/js/animation.js')}}"></script>
  <script src="{{asset('user/assets/js/imagesloaded.js')}}"></script>
  <script src="{{asset('user/assets/js/templatemo-custom.js')}}"></script>

  <!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('user2/lib/wow/wow.min.js')}}"></script>
<script src="{{url('user2/lib/easing/easing.min.js')}}"></script>
<script src="{{url('user2/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{url('user2/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{url('user2/lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{url('user2/lib/lightbox/js/lightbox.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{url('user2/js/main.js')}}"></script>

</body>
</html>