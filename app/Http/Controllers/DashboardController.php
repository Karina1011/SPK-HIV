<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function diagnosa()
    {
        return view('pasien.diagnosa.form');
    }

    public function edukasi()
    {
        return view('pasien.layouts.edukasi');
    }

    public function tentang()
    {
        return view('pasien.layouts.tentang');
    }

    public function tutorial()
    {
        return view('pasien.layouts.tutorial');
    }
}
