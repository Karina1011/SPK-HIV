<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatDiagnosa;
use App\Models\Pasien;
use PDF; 
use Dompdf\Dompdf;

class RiwayatDiagnosaController extends Controller
{
    public function index()
    {
        $riwayatDiagnosa = RiwayatDiagnosa::with('pasien', 'penyakit')->paginate(10); 
        return view('admin.Riwayat.index', compact('riwayatDiagnosa'));
    }

    public function destroy($id)
    {
        $riwayatDiagnosa = RiwayatDiagnosa::findOrFail($id);
        $riwayatDiagnosa->delete();

        return redirect()->route('Riwayat.index')->with('berhasil', 'Riwayat Diagnosa berhasil dihapus');
    }

    public function showDetail($id)
    {
        $riwayatDiagnosa = RiwayatDiagnosa::with('pasien', 'penyakit')->find($id);
        return view('admin.Riwayat.detail', compact('riwayatDiagnosa'));
    }

    public function riwayat_pasien($pasienId)
    {
        $pasien = Pasien::findOrFail($pasienId);
        $riwayatDiagnosas = RiwayatDiagnosa::where('pasien_id', $pasienId)->orderBy('tanggal_diagnosa', 'desc')->get();
    
        return view('pasien.diagnosa.riwayat_pasien', compact('pasien', 'riwayatDiagnosas'));
    }
    

     public function unduhDetailRiwayat($id)
     {
        $riwayatDiagnosa = RiwayatDiagnosa::find($id);
        // Lakukan validasi jika $riwayatDiagnosa tidak ditemukan atau jika ada kondisi lain yang diperlukan

        // Dapatkan data hasil diagnosa sesuai dengan riwayat diagnosa yang ingin diunduh
        $hasilDiagnosa = [
            'pasien' => $riwayatDiagnosa->pasien,
            'penyakit' => $riwayatDiagnosa->penyakit,
            'tanggalDiagnosa' => $riwayatDiagnosa->tanggal_diagnosa->format('d-m-Y H:i'),
        
        ];
        // Ambil gejala yang dipilih dari riwayat diagnosa dan ubah menjadi array
        $gejalaIdsArray = explode(',', $riwayatDiagnosa->gejala_terpilih);

        // Tambahkan $gejalaIdsArray ke dalam $hasilDiagnosa
        $hasilDiagnosa['gejalaIds'] = $gejalaIdsArray;

        // Render view dalam bentuk HTML menggunakan metode view() dan kirimkan data hasil diagnosa ke view
        $pdfHTML = view('pasien.diagnosa.hasil_pdf', compact('hasilDiagnosa'))->render();

        // Buat PDF
        $pdf = new Dompdf();
        $pdf->loadHtml($pdfHTML);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        // Unduh file PDF
        return $pdf->stream('detai_hasil_diagnosa.pdf');
    }
    
}
