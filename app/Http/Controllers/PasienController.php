<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

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

        $pasien = Pasien::create($validatedData);

        $request->session()->put('id', $pasien->id);
        $request->session()->put('nama', $pasien->nama);

        return redirect('/layouts/diagnosa')->with('success', 'Data berhasil disimpan');
    }
}