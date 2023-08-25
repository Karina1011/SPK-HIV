<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\Pasien;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Carbon\Carbon;

class DiagnosisController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    
        if (!$user) {
            return redirect()->route('login'); 
        }
    
        $pasienId = Session::get('id');
        $pasien = Pasien::find($pasienId);
    
        $riwayatDiagnosa = null;
        $penyakit = null;
    
        $diagnosis = [
            'gejala_id' => null,
            'penyakit_id' => null,
            'nama_gejala' => '',
        ];
    
        try {
            // Cek apakah ada gejala yang tersedia di database
            $gejala = Gejala::firstOrFail();  
    
            $diagnosis['gejala_id'] = $gejala->id;
            $diagnosis['nama_gejala'] = $gejala->nama_gejala;
        } catch (\Exception $e) {
            // Berikan nilai default atau pesan kesalahan jika data gejala tidak ditemukan
            $diagnosis['nama_gejala'] = 'Data gejala tidak tersedia';
        }
    
        return view('pasien.diagnosa.index', compact('diagnosis', 'pasien', 'riwayatDiagnosa'));
    }
    

    public function proses(Request $request)
    {
        $gejalaId = $request->input('gejala_id');
        $penyakitId = $request->input('penyakit_id');

        // Inisialisasi koleksi gejala yang dipilih
        $jawaban_all = collect($request->session()->get('jawaban_all', [])); // Daftar gejala yang dipilih

        // Periksa apakah pengguna memilih "Ya"
        if ($request->has('btn_ya')) {
            // Tambahkan gejala yang dipilih ke dalam daftar gejala
            $gejala = Gejala::find($gejalaId);
            if ($gejala) {
                $jawaban_all->push($gejala->id );
            }
        }

        // Simpan data gejala yang dipilih pada sesi
        $request->session()->put('jawaban_all', $jawaban_all);

        // Ambil gejala selanjutnya untuk proses diagnosa berikutnya
        $nextGejala = Gejala::where('id', '>', $gejalaId)->first();

        if ($nextGejala) {
            $diagnosis = [
                'gejala_id' => $nextGejala->id,
                'penyakit_id' => $penyakitId,
                'nama_gejala' => $nextGejala->nama_gejala,
            ];
        } else {
            // Diagnosa selesai, cari penyakit yang cocok berdasarkan gejala yang dipilih
            $penyakitId = $this->cariPenyakitYangCocok($jawaban_all->toArray());

            // Simpan hasil diagnosa pada session
            $request->session()->put('penyakit_id', $penyakitId);
            $request->session()->put('jawaban_all', $jawaban_all);

            // Arahkan ke halaman hasil diagnosa
            return redirect()->route('diagnosa.hasil');
        }

        return view('pasien.diagnosa.index', compact('diagnosis', 'jawaban_all'));
    }

    private function cariPenyakitDariAturan($gejalaTerpilih)
    {
        // Ambil semua aturan (rule) dari database
        $rules = Rule::all();
    
        // Inisialisasi array untuk menyimpan penyakit yang sesuai
        $penyakitCocok = [];
    
        // Lakukan iterasi pada setiap aturan
        foreach ($rules as $rule) {
            // Pisahkan daftar gejala pada aturan menjadi array
            $daftarGejalaRule = explode(' ', $rule->daftar_gejala);
    
            // Hitung berapa banyak gejala yang sesuai dengan gejala yang dipilih oleh pasien
            $jumlahGejalaCocok = count(array_intersect($daftarGejalaRule, $gejalaTerpilih));
    
            // batas minimal berapa banyak gejala yang harus sesuai untuk memicu indikasi penyakit
            $batasMinimalCocok = 5;
    
            if (in_array('1', $gejalaTerpilih) && in_array('2', $gejalaTerpilih)) {
                // Pasien terindikasi penyakit dengan ID 1
                return '1';
            }
    
            if ($jumlahGejalaCocok >= $batasMinimalCocok) {
                // Jika memenuhi batas minimal, tambahkan kode penyakit pada array penyakitCocok
                $penyakitCocok[] = $rule->penyakit->id; // Menggunakan relasi untuk mendapatkan id penyakit
            }
        }
    
        // Jika ada penyakit yang cocok, ambil salah satu penyakit pertama
        if (!empty($penyakitCocok)) {
            return $penyakitCocok[0];
        }
    
        return null; // Tidak ada penyakit yang cocok
    }    

    private function cariPenyakitYangCocok($gejalaIds)
    {
        $penyakitMungkin = collect();
        $rules = Rule::all();
    
        foreach ($rules as $rule) {
            $daftarGejalaRule = explode(',', $rule->daftar_gejala);
            $jumlahGejalaCocok = count(array_intersect($daftarGejalaRule, $gejalaIds));
            
            $persentaseKesamaan = ($jumlahGejalaCocok / count($daftarGejalaRule)) * 100;
    
            $batasPersentaseRelevansi = 80;
    
            if ($persentaseKesamaan >= $batasPersentaseRelevansi) {
                $penyakit = Penyakit::find($rule->id_penyakit);
                if ($penyakit) {
                    $penyakitMungkin->push($penyakit);
                }
            }
        }
    
        $penyakitTerpilih = $penyakitMungkin->sortByDesc(function ($penyakit) use ($persentaseKesamaan) {
            return $persentaseKesamaan;
        })->first();
    
        return $penyakitTerpilih ? $penyakitTerpilih->id : null;
    }
    
    public function hasil(Request $request)
    {
        $pasienId = $request->session()->get('id_' . Auth::id());
        $pasien = Pasien::find($pasienId);
    
        // Ambil data penyakit berdasarkan penyakit yang terdeteksi
        $penyakitId = $request->session()->get('penyakit_id');
        $penyakit = null; // Inisialisasi variabel $penyakit dengan nilai awal null
        if ($penyakitId) {
            $penyakit = Penyakit::find($penyakitId);
        }
    
        // Ambil data gejala yang telah dipilih
        $gejalaIds = $request->session()->get('jawaban_all', []);
    
        // Konversi $gejalaIds menjadi array jika masih dalam bentuk koleksi
        if ($gejalaIds instanceof \Illuminate\Support\Collection) {
            $gejalaIdsArray = $gejalaIds->toArray();
        } else {
            $gejalaIdsArray = $gejalaIds;
        }
    
        // Periksa apakah ada penyakit yang terdeteksi
        if ($penyakitId === null) {
            // Berikan pesan bahwa penyakit tidak bisa diindikasi
             $pesanTidakBisaDiindikasi = 'Penyakit tidak bisa diindikasi berdasarkan gejala yang dipilih.';
    
            // Tampilkan halaman hasil dengan pesan kesalahan
            return view('pasien.diagnosa.hasil', compact('pesanTidakBisaDiindikasi', 'pasien', 'gejalaIds', 'penyakit'));
        }
    
        // Simpan hasil diagnosa ke dalam variabel $hasilDiagnosa
        $hasilDiagnosa = [
            'penyakit' => $penyakit,
            'gejalaIds' => $gejalaIdsArray,
            'tanggalDiagnosa' => Carbon::now('Asia/Jakarta')->format('d-m-Y H:i:s'),
            'pasien' => $pasien, // Sertakan variabel $pasien dalam data yang dikompak
        ];
    
        // Simpan hasil diagnosa dalam sesi untuk digunakan pada halaman hasil_pdf
        $request->session()->put('hasil_diagnosa', $hasilDiagnosa);
    
        // Hapus sesi jawaban_all dan penyakit_id setelah diagnosa selesai
        $request->session()->forget('jawaban_all');
        $request->session()->forget('penyakit_id');
    
        // Simpan hasil diagnosa ke dalam tabel riwayat diagnosa
        $this->simpanRiwayatDiagnosa($pasienId, $penyakitId, implode(',', $gejalaIdsArray));
    
        // Tampilkan halaman hasil dengan gejala yang sudah dipilih
        return view('pasien.diagnosa.hasil', $hasilDiagnosa);
    }

    
    private function simpanRiwayatDiagnosa($pasienId, $penyakitId, $gejalaTerpilih)
    {
        $riwayatDiagnosa = new RiwayatDiagnosa();
        $riwayatDiagnosa->pasien_id = $pasienId;
        $riwayatDiagnosa->penyakit_id = $penyakitId;
        $riwayatDiagnosa->gejala_terpilih = $gejalaTerpilih;
        $riwayatDiagnosa->tanggal_diagnosa = now();
        $riwayatDiagnosa->save();
    }
    public function unduhPDF(Request $request)
    {
        
        // Ambil data hasil diagnosa dari sesi
        $hasilDiagnosa = $request->session()->get('hasil_diagnosa', 'pasien');
    
        // Cek apakah ada data hasil diagnosa
        if (!$hasilDiagnosa) {
            return redirect()->route('diagnosa.index')->with('error', 'Data diagnosa tidak ditemukan.');
        }
       // Ambil data pasien dari sesi
       $pasienId = Session::get('id_' . Auth::id());
       $pasien = Pasien::find($pasienId);
    
       // Render view dalam bentuk HTML menggunakan method view() dan kirimkan data hasil diagnosa ke view
        $pdfHTML = view('pasien.diagnosa.hasil_pdf', compact('hasilDiagnosa', 'pasien'))->render();

        // Buat PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfHTML);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Unduh file PDF
        return $dompdf->stream('hasil_diagnosa.pdf');
    }
    
}