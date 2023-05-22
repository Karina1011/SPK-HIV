<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edukasi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function diagnosa()
    {
        return view('pasien.layouts.diagnosa');
    }
    public function beranda()
    {
        return view('pasien.layouts.beranda');
    }

    public function edukasi_seks()
    {
        $edukasis = Edukasi::query()->get();
        return view('pasien.layouts.edukasi', compact('edukasis'));
    }

    public function tentang()
    {
        return view('pasien.layouts.tentang');
    }

    public function tutorial()
    {
        return view('pasien.layouts.tutorial');
    }

    public function profil()
    {
        return view('admin.profil');
    }
}
