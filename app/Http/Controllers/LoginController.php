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
 
         if(Auth::attempt($infologin)){
             return redirect('/dashboard');
             exit();
         } else {
             return redirect('')->withErrors('Email dan Password yang dimasukan tidak sesuia')->withInput();
         }
     }
     // <!-- /Sesi Login -->

     function logout()
     {
         Auth::logout();
         return redirect('/');
     }
}