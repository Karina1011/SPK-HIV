<h2>Hasil Diagnosa</h2>

@if ($diagnosa->isEmpty())
    <p>Tidak ada penyakit yang cocok dengan gejala-gejala yang dipilih.</p>
@else
    <p>Potensi penyakit berdasarkan gejala-gejala yang dipilih:</p>
    <ul>
        @foreach ($diagnosa as $diagnosa)
            <li>{{ $diagnosa->nama_penyakit }}</li>
        @endforeach
    </ul>
@endif
