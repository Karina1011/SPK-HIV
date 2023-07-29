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
                                    <input type="text" class="form-control" id="usia-pasien" value="{{ $pasien->usia }}" readonly />
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
                                        <textarea class="form-control" id="tgl_diagnosa" readonly>{{ now()->format('d-m-Y H:i:s') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="deskripsi-penyakit">Deskripsi Penyakit</label>
                                        <textarea class="form-control" id="deskripsi-penyakit" readonly>{{ $penyakit->deskripsi }}</textarea>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label" for="penanganan-penyakit">Penanganan</label>
                                        <input type="text" class="form-control" id="penanganan-penyakit" value="{{ $penyakit->solusi }}" readonly />
                                        
                                    </div>
                                @else
                                <div class="alert alert-danger" role="alert"> Maaf, sitem tidak dapat mendiagnosa penyakit. Jika anda mengalami gejala-gejala yang aneh
                                    disarankan untuk konsultasi ke dokter
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
                                <div class="alert alert-danger" role="alert"> Belum ada gejala yang dipilih
                                </div>
                                @endif
                        </div>
                    </fieldset>
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
