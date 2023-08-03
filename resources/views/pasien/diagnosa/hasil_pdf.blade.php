<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hasil Diagnosa</title>
    <!-- Masukkan CSS dan Bootstrap jika diperlukan -->
    <style>
        /* Tambahkan CSS khusus untuk tampilan PDF di sini */
        
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        /* Penataan teks rata kanan untuk elemen tabel */
        td.text-right {
            text-align: right;
        }
        /* Penataan teks rata kiri untuk elemen tabel */
        td.text-left {
            text-align: left;
        }
        .text-center {
            /* Atur penataan teks menjadi center */
            text-align: center;
        }
        .text-justify {
            text-align: justify;
        }
        .alert {
            /* Atur penataan teks untuk elemen dengan class "alert" */
            text-align: left;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Hasil Diagnosa</h1>
    <p class="text-justify">Berikut ini adalah hasil diagnosa penyakit yang telah dilakukan melalui Aplikasi Sistem Pendukung Keputusan:</p>

    <h3>Data Pasien</h3>
    <table>
        <tr>
            <th class="text-right">Nama Pasien :</th>
            <td class="text-left">{{ $hasilDiagnosa['pasien']->nama }}</td>
        </tr>
        <tr>
            <th class="text-right">Usia Pasien :</th>
            <td class="text-left">{{ $hasilDiagnosa['pasien']->usia }}</td>
        </tr>
        <tr>
            <th class="text-right">Jenis Kelamin :</th>
            <td class="text-left">{{ $hasilDiagnosa['pasien']->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
    </table>

    @if (isset($hasilDiagnosa['penyakit']))
    <h3>Diagnosa Penyakit</h3>
    <table>
        <tr>
            <th class="text-right">Pasien terindikasi menderita penyakit HIV :</th>
            <td class="text-left">{{ $hasilDiagnosa['penyakit']->nama_penyakit }}</td>
        </tr>
        <tr>
            <th class="text-right">Tanggal Diagnosa : </th>
            <td class="text-left">{{ $hasilDiagnosa['tanggalDiagnosa'] }}WIB</td>
        </tr>
    </table>

    <h3>Deskripsi Penyakit</h3>
    <div class="alert alert-dark text-justify" role="alert">
        {{ $hasilDiagnosa['penyakit']->deskripsi }}
    </div>

    <h3>Penanganan Penyakit</h3>
    <div class="alert alert-danger text-justify" role="alert">
        {!! $hasilDiagnosa['penyakit']->solusi !!}
    </div>
    @else
    <div class="alert alert-danger text-justify" role="alert">
        Maaf, sistem tidak dapat mendiagnosa penyakit. Jika Anda mengalami gejala-gejala yang aneh, disarankan untuk berkonsultasi ke dokter.
    </div>
    @endif

    @if (isset($hasilDiagnosa['gejalaIds']) && count($hasilDiagnosa['gejalaIds']) > 0)
    <h3>Gejala yang Dipilih</h3>
    <table>
        <tr>
            <th class="text-left">Nama Gejala</th>
        </tr>
        @foreach ($hasilDiagnosa['gejalaIds'] as $gejalaId)
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
    <h3>Catatan :</h3>
    <div class="alert alert-danger text-justify" role="alert">
        "Penting untuk diingat bahwa hasil diagnosa dari sistem pendukung keputusan hanya sebagai panduan dan bukan pengganti 
        keputusan medis atau keputusan penting lainnya yang harus diambil. Selalu konsultasikan hasil ini dengan tenaga medis 
        atau ahli yang berkualifikasi sebelum membuat keputusan akhir mengenai perawatan atau langkah-langkah tindakan selanjutnya. 
        Ketepatan dan keselamatan keputusan tergantung pada informasi yang lengkap dan pemahaman yang komprehensif atas situasi yang 
        dihadapi. Gunakan hasil diagnosa ini sebagai sarana pendukung untuk memperoleh pandangan yang lebih holistik dan bijaksana."
    </div>
</body>
</html>
