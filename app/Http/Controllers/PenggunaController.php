<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = [
            "user" => User::all(),
            
        ];

        return view('admin.pengguna.index', $data);
    }

    public function store(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Str::limit($request->password, 30),
            'role'=>  $request->role,
        
        ]);
        return redirect()->back()->with('success', 'Data Admin berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        //delete post
        $user = User::findOrFail($id);
        $user->delete();

        //redirect to index
        return redirect()->route('pengguna.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
