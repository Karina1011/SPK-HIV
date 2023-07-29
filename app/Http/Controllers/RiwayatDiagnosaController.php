<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatDiagnosa;
use App\Models\Pasien;
use App\Models\Penyakit;

class RiwayatDiagnosaController extends Controller
{
    public function index()
    {
        $riwayatDiagnosa = RiwayatDiagnosa::with('pasien', 'penyakit')->get();
        $pasien = Pasien::all();
        $penyakit = Penyakit::all();

        return view('admin.riwayat.index', compact('riwayatDiagnosa', 'pasien', 'penyakit'));
    }

    public function destroy($id)
    {
        $riwayatDiagnosa = RiwayatDiagnosa::findOrFail($id);
        $riwayatDiagnosa->delete();

        return redirect()->route('riwayat.index')->with('berhasil', 'Riwayat Diagnosa berhasil dihapus');
    }
}