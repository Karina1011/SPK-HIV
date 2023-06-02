@extends('pasien.partials.main')
@section('container')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Selamat datang di SPK-HIV/AIDS</h6>
                <h2>Sistem Pendukung Keputusan <em>Diagosa</em> <span>HIV/AIDS</span></h2>
                <p>Website Sistem Pendukung Keputusan (SPK) untuk Mendiagnosa Penyakit HIV/AIDS menggunakan Forward 
                  Chaining adalah sebuah platform online yang dirancang untuk membantu pengguna dalam melakukan diagnosis
                  awal terkait penyakit HIV/AIDS.
                  <a rel="" href="{{url('/tentang')}}" target="_parent">Baca selengkapnya...</a>.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="user/assets/images/HIV-1.jpg" alt="sphiv">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection