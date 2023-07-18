@extends('pasien.partials.main')
@section('container')
<div id="services" class="our-services section">
    <div class="container">
        <div class="row">
            @foreach($tentangs as $data_tentang)
            <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="section-heading">
                    <h2>{!! $data_tentang->judul !!}</h2>
                    @php
                        $isi = $data_tentang->isi;
                        $paragraf1 = '';
                        $paragraf2 = '';
                        if (strlen($isi) > 517) {
                            $paragraf1 = substr($isi, 0, 517);
                            $paragraf2 = substr($isi, 517);
                        } else {
                            $paragraf1 = $isi;
                        }
                    @endphp
                    {!! $paragraf1 !!}
                    @if ($paragraf2 != '')
                        {!! $paragraf2 !!}
                    @endif
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="Right-image">
                    @php
                        $image2 = asset('user/assets/images/2.png'); // Ganti dengan path ke gambar kedua
                    @endphp
                    <img src="{{ asset('/storage/'.$data_tentang['image']) }}" alt="">
                    <img src="{{ $image2 }}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
