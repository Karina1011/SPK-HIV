<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edukasi;
use App\Models\Tentang;
use App\Models\Tutorial;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function diagnosa()
    {
        return view('diagnosa.index');
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
    public function detail(String $id)
    {
        $edukasi = Edukasi::findOrFail(decrypt($id));

        return view('admin.edukasi.detail', compact('edukasi'));
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
        return view('admin.profil');
    }
}
