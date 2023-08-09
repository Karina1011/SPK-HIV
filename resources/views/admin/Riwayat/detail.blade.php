<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Detail Riwayat Diagnosa</title>
    <!-- Masukkan CSS dan Bootstrap jika diperlukan -->
<body>

    <h4>Data Pasien</h4>
    <table class="table table-bordered">
        <tr>
            <th class="text-right">Nama Pasien :</th>
            <td class="text-left">{{ $riwayatDiagnosa->pasien->nama }}</td>
        </tr>
        <tr>
            <th class="text-right">Usia Pasien :</th>
            <td class="text-left">{{ $riwayatDiagnosa->pasien->usia }} Tahun</td>
        </tr>
        <tr>
            <th class="text-right">Jenis Kelamin :</th>
            <td class="text-left">{{ $riwayatDiagnosa->pasien->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
    </table>

    @if ($riwayatDiagnosa->penyakit)
    <h4>Diagnosa Penyakit</h4>
     <table class="table table-bordered">
        <tr>
            <th class="text-right">Pasien terindikasi menderita penyakit HIV :</th>
            <td class="text-left">{{ $riwayatDiagnosa->penyakit->nama_penyakit }}</td>
        </tr>
        <tr>
            <th class="text-right">Tanggal Diagnosa : </th>
            <td class="text-left">{{ $riwayatDiagnosa->tanggal_diagnosa->format('d-m-Y H:i:s') }} WIB</td>
        </tr>
    </table>

    <h4>Deskripsi Penyakit</h4>
    <div class="alert alert-dark text-justify" role="alert">
        {{ $riwayatDiagnosa->penyakit->deskripsi }}
    </div>

    <h4>Penanganan Penyakit</h4>
    <div class="alert alert-danger text-justify" role="alert">
        {!! $riwayatDiagnosa->penyakit->solusi !!}
    </div>
    @else
    <div class="alert alert-danger text-justify" role="alert">
        Maaf, sistem tidak dapat mendiagnosa penyakit. Jika Anda mengalami gejala-gejala yang aneh, disarankan untuk berkonsultasi ke dokter.
    </div>
    @endif

    @if ($riwayatDiagnosa->gejala_terpilih)
     <table class="table table-bordered">
        <tr>
            <th class="text-left">Gejala yang Dipilih</th>
        </tr>
        @php
            $gejalaIds = explode(',', $riwayatDiagnosa->gejala_terpilih);
        @endphp
        @foreach ($gejalaIds as $gejalaId)
            @php
                $gejala = App\Models\Gejala::find($gejalaId);
            @endphp
            @if ($gejala)
            <tr>
                <td class="text-left">{{ $gejala->nama_gejala }}</td>
            </tr>
            @endif
        @endforeach
    </table>
    @else
    <div class="alert alert-dark text-justify" role="alert">
        Belum ada gejala yang dipilih.
    </div>
    @endif
    <br>
</body>
</head>
</html>
