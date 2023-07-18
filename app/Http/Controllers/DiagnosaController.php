<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\Pasien;
use App\Models\RiwayatDiagnosa;

class DiagnosaController extends Controller
{
    public function index()
    {
        $diagnosis = [
            'gejala_id' => null,
            'penyakit_id' => null,
            'nama_gejala' => '',
        ];

        $gejala = Gejala::first();

        if ($gejala) {
            $diagnosis['gejala_id'] = $gejala->id;
            $diagnosis['nama_gejala'] = $gejala->nama_gejala;
        }

        return view('pasien.layouts.diagnosa.index', compact('diagnosis'));
    }

    public function proses(Request $request)
    {
        $gejalaId = $request->input('gejala_id');
        $penyakitId = $request->input('penyakit_id');
    
        $nextGejala = Gejala::where('id', '>', $gejalaId)->first();
    
        // Periksa apakah pengguna memilih "Ya"
        if ($request->has('btn_ya')) {
            $rules = Rule::where('daftar_gejala', 'LIKE', "%{$gejalaId}%")->get();
    
            foreach ($rules as $rule) {
                if (!$penyakitId) {
                    $penyakitId = $rule->id_penyakit;
                } else {
                    if ($penyakitId != $rule->id_penyakit) {
                        // Terdapat beberapa kemungkinan penyakit, atur penanganan sesuai kebutuhan
                        // Misalnya, arahkan ke halaman yang berbeda atau tampilkan pesan
                    }
                }
            }
        }
    
        if ($nextGejala) {
            $diagnosis = [
                'gejala_id' => $nextGejala->id,
                'penyakit_id' => $penyakitId,
                'nama_gejala' => $nextGejala->nama_gejala,
            ];
    
            // Simpan gejala yang sudah dipilih pada session
            $jawaban_all = $request->session()->get('jawaban_all', []);
            $gejala = Gejala::find($gejalaId);
    
            if ($gejala) {
                $jawaban_all[] = $gejala->nama_gejala;
                $request->session()->put('jawaban_all', $jawaban_all);
            }
        } else {
            // Diagnosa selesai, tampilkan hasil
            $penyakit = Penyakit::find($penyakitId);
            $pasien = Pasien::find($request->session()->get('id'));
    
            // Ambil gejala-gejala yang sudah dipilih dari session
            $jawaban_all = $request->session()->get('jawaban_all', []);
    
            // Hapus session setelah proses selesai
            $request->session()->forget('jawaban_all');
    
            // Simpan riwayat diagnosa ke dalam database
            $riwayatDiagnosa = new RiwayatDiagnosa();
            $riwayatDiagnosa->pasien_id = $pasien->id;
            $riwayatDiagnosa->penyakit_id = $penyakit->id;
            $riwayatDiagnosa->gejala_terpilih = implode(', ', $jawaban_all);
            $riwayatDiagnosa->tanggal_diagnosa = now();
            $riwayatDiagnosa->save();
    
            return view('pasien.layouts.diagnosa.hasil', compact('penyakit', 'pasien', 'jawaban_all', 'riwayatDiagnosa'));
        }
    
        return view('pasien.layouts.diagnosa.index', compact('diagnosis', 'jawaban_all'));
    }
    
}
