<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     // <!-- Sesi Login -->
     public function login()
     {
         return view('login.login');
     }
     public function sesilogin (Request $request)
     {
         $request->validate([
             'email' => 'required',
             'password' => 'required'
         ], [
             'email.required' => 'Email wajib diisi',
             'password.required' => 'Password wajib diisi',
         ]);
 
         $infologin = [
             'email' => $request->email,
             'password' => $request->password
         ];
 
         if (Auth::attempt($infologin)) {
            $user = Auth::user();

            // Periksa peran pengguna yang berhasil login
            if ($user->role == 'pasien') {
                return redirect('/beranda'); 
            } elseif ($user->role == 'admin') {
                return redirect('/dashboard');
            } elseif ($user->role == 'dokter') {
                return redirect('/dashboard');
            }
        } else {
            return redirect('')->withErrors('Email dan Password yang dimasukan tidak sesuai')->withInput();
        }
     }
     // <!-- /Sesi Login -->

     function logout()
     {
         Auth::logout();
         return redirect('/login');
     }
}