@extends('pasien.partials.main')
@section('container')
<div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        @foreach($tentangs as $data_tentang)
        <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="left-image">
            <img src="{{ asset('/storage/'.$data_tentang['image']) }}" alt="">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="section-heading">
            <h2>{{$data_tentang['judul']}}</h2>
            <p>{!!$data_tentang['isi']!!}
            </p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection