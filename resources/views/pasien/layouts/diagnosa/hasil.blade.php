
@extends('pasien.partials.main')

@section('container')

<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div id="diagnosa">
        <div class="container px-lg-5">
            <h2 class="text-center">Hasil Diagnosa</h2>
            <br><br>
            <div class="container">
                <div class="row">
                    <form id="contact2" action="{{ route('diagnosa.proses') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-24">
                                <div class="text">
                                    <fieldset>
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex justify-content-between w-100">
                                                <h4>Detail Diagnosa</h4>
                                            </div>
                                            <br>
                                            <div class="label-row">
                                                <div class="label-title">Nama Pasien</div>
                                                <div class="label-value">: {{ $pasien->nama }}</div>
                                            </div>
                                            <div class="label-row">
                                                <div class="label-title">Alamat</div>
                                                <div class="label-value">: {{ $pasien->alamat }}</div>
                                            </div>
                                            <div class="label-row">
                                                <div class="label-title">Usia</div>
                                                <div class="label-value">: {{ $pasien->usia }}</div>
                                            </div>
                                            <div class="label-row">
                                                <div class="label-title">Jenis Kelamin</div>
                                                <div class="label-value">: {{ $pasien->jenis_kelamin }}</div>
                                            </div>
                                            <div class="label-row">
                                                <div class="label-title">Tanggal Diagnosa</div>
                                                <div class="label-value">: {{ $riwayatDiagnosa->tanggal_diagnosa }}</div>
                                            </div>
                                            <div class="label-row">
                                                <div class="label-title">Nama Penyakit</div>
                                                <div class="label-value">: {{ $penyakit->nama_penyakit }}</div>
                                            </div>
                                        </div>
                                        @if ($penyakit)
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex justify-content-between w-100">
                                                <h4>Deskripsi</h4>
                                            </div>
                                            <br>
                                            <p class="label-value">Nama Penyakit: {{ $penyakit->nama_penyakit }}</p>
                                            <p class="label-value">Solusi: {{ $penyakit->solusi }}</p>
                                        </div>
                                        @endif
                                        @isset($jawaban_all)
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex justify-content-between w-100">
                                                <h6 class="label-title">Gejala yang Dipilih</h6>
                                            </div>
                                            @foreach ($jawaban_all as $gejala)
                                            <p class="label-value">{{ $gejala }}</p>
                                            @endforeach
                                        </div>
                                        @endisset
                                    </fieldset>
                                    <br>
                                    <div class="text-center">
                                        <a href="{{ route('pasien.daftar') }}" class="btn btn-danger"><i class="fa fa-times"></i> Selesai</a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection