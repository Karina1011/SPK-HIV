@extends('pasien.partials.main')
@section('beranda')
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6>Selamat datang di SP-HIV/AIDS</h6>
                <h2>Sistem Pakar <em>Diagosa</em> <span>HIV/AIDS</span></h2>
                <p>sistem pakar diagnosa penyakit HIV/AIDS adalah sistem yang menggunakan kecerdasan buatan dan teknologi informasi untuk membantu dalam proses diagnosis penyakit HIV/AIDS. Sistem ini menerima informasi dari pengguna, seperti gejala yang dialami 
                  <a rel="" href="layouts/pasien/tentang" target="_parent">Baca selengkapnya...</a>.</p>
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
  <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center  wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="left-image">
            <img src="{{asset('user/assets/images/HIV-2.png')}}" alt="">
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
          <div class="section-heading">
            <h2>Sistem Pakar Diagnosa Penyakit <span>HIV/AIDS</span></h2>
            <p>Sebuah sistem pakar diagnosa penyakit HIV/AIDS adalah sistem yang menggunakan kecerdasan buatan dan teknologi 
                informasi untuk membantu dalam proses diagnosis penyakit HIV/AIDS. Sistem ini menerima informasi dari pengguna, 
                seperti gejala yang dialami dan riwayat medis, dan berdasarkan informasi tersebut memberikan diagnosis kemungkinan 
                adanya infeksi HIV dan AIDS.
          <br>
          <br>
                Aplikasi sistem pakar diagnostik HIV/AIDS menggunakan metode forward chaining dapat membantu dokter atau ahli medis 
                dalam mendiagnosis penyakit HIV/AIDS dengan lebih akurat dan cepat. Metode forward chaining adalah salah satu teknik 
                yang digunakan dalam kecerdasan buatan untuk memecahkan masalah dengan mengumpulkan fakta-fakta yang ada dan mengevaluasi 
                aturan-aturan yang ada dalam sistem pakar.
            </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection