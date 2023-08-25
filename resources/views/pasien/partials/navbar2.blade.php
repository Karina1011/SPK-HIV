
{{-- @extends('pasien.main')
@section('navbar') --}}
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="/" class="logo">
              <h4>SPK - <span>HIV/AIDS</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="{{url ('/')}}" class="">Beranda</a></li>
              <li class="scroll-to-section"><a href="{{url ('/tutorial_apk')}}">Tutorial</a></li>
              <li class="scroll-to-section"><a href="{{url ('/tentang_apk')}}">Tentang</a></li>
              <li class="scroll-to-section"><a href="{{url ('/edukasi_seks')}}">Edukasi Seks</a></li>
              <li class="scroll-to-section"><div class="main-red-button"><a href="{{url ('/login')}}">Masuk</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
  {{-- @endsection --}}