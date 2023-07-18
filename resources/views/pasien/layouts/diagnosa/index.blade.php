@extends('pasien.partials.main')

@section('container')
<div id="diagnosa">
    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container px-lg-4">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mulai">Mulai Diagnosa</h1>
            <p>Pilih gejala dengan benar untuk mendapatkan hasil yang akurat. Diagnosa ini akan membantu memahami kondisi dan memberikan solusi yang sesuai.</p>
        </div>
        <div class="col-lg-12 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
            <form id="contact2" action="{{ route('diagnosa.proses') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <br><br>
                        <div class="text-center">
                            <fieldset>
                                <input type="hidden" name="gejala_id" value="{{ $diagnosis['gejala_id'] }}">
                                <input type="hidden" name="penyakit_id" value="{{ $diagnosis['penyakit_id'] }}">
                                <div class="row mb-4">
                                    <div class="col-md-12 text-center">
                                        <h4>Apakah Anda {{ $diagnosis['nama_gejala'] }} ?</h4>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_ya" class="btn btn-lg btn-block btn-success"><i class="fa fa-check"></i> Ya</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_tidak" class="btn btn-lg btn-block btn-danger"><i class="fa fa-times"></i> Tidak</button>
                                    </div>
                                </div>
                                @if ($diagnosis['gejala_id'] == null)
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" name="btn_hasil" class="btn btn-lg btn-block btn-primary"><i class="fa fa-check"></i> Hasil</button>
                                        </div>
                                    </div>
                                @endif
                            </fieldset>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
