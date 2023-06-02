
@extends('pasien.partials.main')
@section('container')
  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Ayo, mari kita lakukan diagnosa untuk mengetahui kondisimu!</h2>
            <p>Sebelum memulai, mari isi identitas terlebih dahulu. Yuk mulai 
              dengan mengisi identitas dan memilih gejala dengan benar!</p>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="defaultFormControlInput" class="form-label">Name Lengkap</label>
                  <input type="name" name="name" id="name" placeholder="Masukan Nama Lengkap" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="defaultFormControlInput" class="form-label">Alamat</label>
                  <input type="name" name="name" id="name" placeholder="Masukan Alamat" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="defaultFormControlInput" class="form-label">Usia</label>
                  <input type="name" name="name" id="name" placeholder="Masukan Usia" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="defaultFormControlInput" class="form-label">Jeis Kelamin</label>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button"><div><a href="#diagnosa"></a>Diagnosa</div></button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<div id="diagnosa">
  <div class="container px-lg-5">
    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
      <h2 class="mt-2">Mulai Diagnosa</h2>
      <p>Pilih gejala dengan 
        benar untuk mendapatkan hasil yang akurat. Diagnosa ini akan membantu memahami kondisi dan 
        memberikan solusi yang sesuai.</p>
    </div>
    <div class="col-lg-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
      <form id="contact2" action="" method="post">
        <div class="row"> 
          <div class="col-lg-12">
              <div class="card-body text-center">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              </div> <br><br>
              <div class="text-center">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button ">Iya</button>
                  <button type="submit" id="form-submit" class="main-button ">Tidak</button>
                </fieldset>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
