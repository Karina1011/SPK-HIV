@extends('pasien.partials.main')

@section('container')

<div id="diagnosa">
    <div class="main-banner" id="top">
        <div class="container px-lg-4">
            <div class="section-title position-relative text-center mb-5 pb-2">
                <h1 class="mulai">Hasil Diagnosa</h1>
                <p>Hasil diagnosa berdasarkan gejala yang dipilih.</p>
            </div>
            <div class="col-lg-12">
                <div class="">
                    @isset($pasien, $penyakit, $gejalaIds)
                    <fieldset>
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex justify-content-between w-100">
                                <h4>Detail Diagnosa</h4>
                            </div>
                            <br>
                            <!-- Menampilkan detail pasien -->
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
                                <div class="label-value">: {{ now()->format('d-m-Y H:i:s') }}</div>
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
                        @isset($gejalaIds)
                        @if (count($gejalaIds) > 0)
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex justify-content-between w-100">
                                <h6 class="label-title">Gejala yang Dipilih</h6>
                            </div>
                            <!-- Menampilkan gejala-gejala yang sudah dipilih -->
                            @foreach ($gejalaIds as $gejalaId)
                            @php
                                $gejala = \App\Models\Gejala::find($gejalaId);
                            @endphp
                            @if ($gejala)
                            <p class="label-value">{{ $gejala->nama_gejala }}</p>
                            @endif
                            @endforeach
                        </div>
                        @else
                        <p class="label-value">Tidak ada gejala yang dipilih.</p>
                        @endif
                        @endisset
                    </fieldset>
                    @else
                    <p>Data pasien, riwayat diagnosa, atau penyakit tidak valid. Mohon maaf, terjadi kesalahan.</p>
                    @endisset
                    <br>
                    <div class="text-center">
                        <a href="{{ url('/pasien') }}" class="btn btn-danger"><i class="fa fa-times"></i> Selesai</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
