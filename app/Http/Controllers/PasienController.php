<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    public function index()
    {
        return view('pasien.pasien');
    }

    public function daftar(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'usia' => 'required|numeric',
            'jenis_kelamin' => 'required',
        ]);

        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah pengguna sudah memiliki rekaman di tabel pasien
        $existingPasien = Pasien::where('user_id', $user->id)->first();

        if ($existingPasien) {
            // Jika sudah ada, update data pasien yang ada
            $existingPasien->update($validatedData);
            $pasien = $existingPasien; // Assign existingPasien ke variabel $pasien
        } else {
            // Jika belum ada, buat rekaman baru
            $pasien = Pasien::create([
                'nama' => $validatedData['nama'],
                'alamat' => $validatedData['alamat'],
                'usia' => $validatedData['usia'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'user_id' => $user->id,
            ]);
        }

        // Simpan data pasien pada session berdasarkan user id
        $request->session()->put('id_' . Auth::id(), $pasien->id);
        $request->session()->put('nama_' . Auth::id(), $pasien->nama);

        return redirect('/diagnosa')->with('success', 'Data berhasil disimpan');
    }
}

