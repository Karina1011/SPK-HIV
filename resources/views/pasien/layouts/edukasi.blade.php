@extends('pasien.partials.main')
@section('sexedu')
<div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading  wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <h2>Edukasi Seks <em>tentang</em> <span>HIV</span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <a href="#">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="hidden-content">
                <h4>SEO Analysis</h4>
                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
              </div>
              <div class="showed-content">
                <img src="assets/images/portfolio-image.png" alt="">
              </div>
            </div>
          </a>
        </div>
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
          @forelse($edukasis as $edukasi)
          <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="">
                <img src="{{ asset('storage/'.$edukasi['image']) }}" alt="image" width="50px">
              </div><br>
              <h3>{{ $edukasi['judul'] }}</h3>
              <p>{!! $edukasi['isi'] !!}</p>
              <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <!-- End Service Item -->
          @empty
            <p>Data Kosong</p>
          @endforelse
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection