@extends('pasien.partials.main')

@section('container')
  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Ayo, mari kita lakukan diagnosa untuk mengetahui kondisimu!</h2>
            <p>Sebelum memulai, mari isi identitas terlebih dahulu. Yuk mulai dengan mengisi identitas dan memilih gejala dengan benar!</p>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="{{ url('/pasien/daftar') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <fieldset>
                  <label for="nama" class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="usia" class="form-label">Usia</label>
                  <input type="text" name="usia" id="usia" placeholder="Masukkan Usia" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                  <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="main-button">Selanjutnya</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection