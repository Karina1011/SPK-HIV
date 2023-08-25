<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pasien; 
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nama' => 'required',
            'alamat' => 'required',
            'usia' => 'required|numeric',
            'jenis_kelamin' => 'required',
        ]);

         // Buat pengguna baru
         $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'pasien', // Set peran langsung menjadi "pasien"
        ]);
        $user_id = auth()->user()->id;

        // Buat rekaman pasien terkait dengan pengguna
        $pasien = Pasien::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'usia' => $request->input('usia'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'user_id' => $user->id,
        ]);

        // Panggil event Registered
        event(new Registered($user));

        // Login pengguna baru
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
