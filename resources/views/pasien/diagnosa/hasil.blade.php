@extends('pasien.partials.main')

@section('container')
<div id="diagnosa">
    <div class="main-banner" id="top">
        <div class="container px-lg-4">
            <div class="section-title position-relative text-center mb-5 pb-2">
                <h1 class="mulai">Hasil Diagnosa</h1>
                <p>Hasil diagnosa berdasarkan gejala yang dipilih.</p>
            </div>
            <div class="card-body">
                <h5 class="card-header">Detail Diagnosa</h5>
                <div class="col-lg-12">
                    <fieldset>
                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex justify-content-between w-100">

                            </div>
                                <div class="mb-3">
                                    <label class="form-label" for="nama-pasien">Nama Pasien</label>
                                    <input type="text" class="form-control" id="nama-pasien" value="{{ $pasien->nama }}" readonly />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="usia-pasien">Usia Pasien</label>
                                    <input type="text" class="form-control" id="usia-pasien" value="{{ $pasien->usia }} " readonly /> Tahun
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="jenis-kelamin">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jenis-kelamin" value="{{ $pasien->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}" readonly />
                                </div>

                                @if ($penyakit)
                                    <div class="mb-3">
                                        <label class="form-label" for="nama-penyakit">Pasien terindikasi menderita penyakit HIV</label>
                                        <input type="text" class="form-control" id="nama-penyakit" value="{{ $penyakit->nama_penyakit }}" readonly />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="tgl_diagnosa">Tanggal Diagnosa</label>
                                        <textarea class="form-control" id="tgl_diagnosa" readonly>{{ $tanggalDiagnosa }} WIB</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="deskripsi-penyakit">Deskripsi Penyakit</label>
                                        <div class="alert alert-dark mb-0" role="alert" id="deskripsi-penyakit">{{ $penyakit->deskripsi }}</div>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label" for="penanganan-penyakit">Penanganan</label>
                                        <div class="alert alert-dark mb-" role="alert" id="penanganan-penyakit">{!!($penyakit->solusi)!!}</div>
                                    </div>
                                @else
                                <div class="alert alert-danger" role="alert"> Maaf, sistem tidak dapat mengidentifikasi penyakit. Jika Anda memiliki gekala- gejala yang mencurigakan 
                                    atau mengkhawatirkan, sebaiknya segera berkonsultasi dengan tenaga medis atau dokter untuk evaluasi medis yang tepat.
                                </div>
                                @endif

                                @if (count($gejalaIds) > 0)
                                    <div class="mb-3">
                                        <h5 class="card-header">Gejala yang dipilih</h5>
                                        <br>
                                        <div class="list-group">
                                            @foreach ($gejalaIds as $gejalaId)
                                                @php
                                                    $gejala = App\Models\Gejala::find($gejalaId);
                                                @endphp
                                                @if ($gejala)
                                                    <a href="javascript:void(0);" class="list-group-item list-group-item-action flex-column align-items-start">
                                                        <div class="d-flex justify-content-between w-100">
                                                            <h6>{{ $gejala->nama_gejala }}</h6>
                                                        </div>
                                                        <p class="mb-1">{{ $gejala->deskripsi }}</p>
                                                        <small class="text-muted">{{ $gejala->tindakan }}</small>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                <div class="alert alert-danger" role="alert"> Belum ada gejala yang dipilih.
                                </div>
                                @endif
                                <div class="alert alert-danger" role="alert"> "Penting untuk diingat bahwa hasil diagnosa dari sistem pendukung keputusan hanya 
                                    sebagai panduan dan bukan pengganti keputusan medis atau keputusan penting lainnya yang harus diambil. Selalu konsultasikan hasil 
                                    ini dengan tenaga medis atau ahli yang berkualifikasi sebelum membuat keputusan akhir mengenai perawatan atau langkah-langkah tindakan 
                                    selanjutnya. Ketepatan dan keselamatan keputusan tergantung pada informasi yang lengkap dan pemahaman yang komprehensif atas situasi yang dihadapi. 
                                    Gunakan hasil diagnosa ini sebagai sarana pendukung untuk memperoleh pandangan yang lebih holistik dan bijaksana."
                                </div>
                        </div>
                    </fieldset>
                    <br>
                    <div class="text-center">
                        <a href="{{ url('/pasien') }}" class="btn btn-danger"><i class="fa fa-times"></i> Selesai</a>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('diagnosa.hasil.download') }}" class="btn btn-primary"><i class="fa fa-download"></i> Unduh PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection