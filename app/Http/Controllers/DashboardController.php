<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edukasi;
use App\Models\Tentang;
use App\Models\Tutorial;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Rule;
use App\Models\User;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; // Import DB facade untuk menggunakan fungsi DATE_FORMAT


class DashboardController extends Controller
{
    public function dashboard()
    {
        // Menghitung jumlah data pada tabel menggunakan Eloquent
        $jumlah_rule = Rule::count();
        $jumlah_gejala = Gejala::count();
        $jumlah_penyakit = Penyakit::count();
        $jumlah_user = User::count();
        $jumlah_riwayat = RiwayatDiagnosa::count();
        $jumlah_edukasi = Edukasi::count();

        return view('admin.dashboard', compact('jumlah_rule', 'jumlah_gejala', 'jumlah_penyakit', 'jumlah_user', 'jumlah_riwayat', 'jumlah_edukasi'));
    }
    public function beranda()
    {
        return view('pasien.layouts.beranda');
    }

    public function edukasi_seks()
    {
        $edukasis = Edukasi::query()->get();
        return view('pasien.layouts.edukasi_seks', compact('edukasis'));
    }
    // public function detail(String $id)
    // {
    //     $edukasi = Edukasi::findOrFail(decrypt($id));

    //     return view('admin.edukasi.detail', compact('edukasi'));
    // }
    public function detail($id)
{
    try {
        $edukasi = Edukasi::findOrFail(decrypt($id));

        return view('admin.edukasi.detail', compact('edukasi'));
    } catch (\Exception $e) {
        // Handle the exception, such as logging or displaying an error message
        return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    public function tentang_apk()
    {
        $tentangs = Tentang::query()->get();
        return view('pasien.layouts.tentang_apk', compact('tentangs'));
    }

    public function tutorial_apk()
    {
        $tutorials = Tutorial::query()->get();
        return view('pasien.layouts.tutorial_apk', compact('tutorials'));
    }

    public function profil()
    {
        return view('admin.profile.profil');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return response()->json(['message' => 'Password successfully updated']);
        } else {
            return response()->json(['error' => 'Current password is incorrect'], 422);
        }
    }

    public function changePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:800',
        ]);

        $user = Auth::user();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('admin/assets/img/avatars'), $fileName);

            // Update user's photo in the database
            $user->update(['photo' => $fileName]);

            return response()->json(['message' => 'Photo successfully updated']);
        } else {
            return response()->json(['error' => 'Photo not found'], 422);
        }
    }
}
