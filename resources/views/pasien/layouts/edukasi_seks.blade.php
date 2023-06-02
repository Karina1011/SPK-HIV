@extends('pasien.partials.main')
@section('container')

 <!-- Service Start -->
 <div class="container-xxl py-5">
  <div class="container px-lg-5">
    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
      <h2 class="mt-2">Edukasi Seks</h2>
  </div>
  <div class="row g-4">
    @foreach($edukasis as $edukasi)
      <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
          <div class="service-item d-flex flex-column justify-content-center text-center rounded">
            <div class="top-dec">
              <img src="{{ asset('/storage/'.$edukasi['image']) }}" alt="image" width="50px">
            </div>
              <h5 class="mb-3">{{ $edukasi['judul'] }}</h5>
              <p>{!! $edukasi['isi'] !!}</p>
              <a class="btn px-3 mt-auto mx-auto" href="{{url('/detail'. encrypt($edukasi->id))}}">Baca Selengkapnya</a>
          </div>
      </div>
      @endforeach
  </div>
  </div>
</div>
      <!-- Service End -->
@endsection