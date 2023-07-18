@extends('pasien.partials.main')
@section('container')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
<div class="container-xxl py-5">
  <div class="container px-lg-5">
      <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
          <h2 class="mulai">Edukasi Seks</h2>
      </div>
      <div class="row g-4">
        @foreach($edukasis as $edukasi)
          <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
              <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                  <h5 class="mb-3" style="margin-bottom: 0;">{{ $edukasi->judul }}</h5>
                    <img src="{{ asset('storage/'.$edukasi->image) }}" alt="image" style="max-width: 100%; height: auto;">
                  <h5>{!! \Illuminate\Support\Str::limit($edukasi->isi, 150) !!}</h5>
                  <a class="btn px-3 mt-auto mx-auto" href="{{ url('edukasi/detail/'.encrypt($edukasi->id)) }}">Baca Selengkapnya</a>
              </div>
          </div>
          @endforeach
      </div>
  </div>
</div>
<!-- Service End -->
@endsection
