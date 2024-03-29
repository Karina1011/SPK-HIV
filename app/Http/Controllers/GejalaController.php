<?php

namespace App\Http\Controllers;
use App\Models\Gejala;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $data = [
            "gejala" => Gejala::paginate(5),
        ];
        return view("admin.gejala.index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_gejala' => 'required',
            'kode_gejala' => 'required',
        ]);

        Gejala::create([
            'nama_gejala' => $request->nama_gejala,
            'kode_gejala' => $request->kode_gejala,
        ]);
        return redirect()->route('gejala.index')->with('success', 'Data gejala berhasil ditambahkan!');
    }
    public function edit(Request $request)
    {
        $data = [
            "edit" => Gejala::where("id", $request->id)->first()
        ];

        return view('admin.gejala.edit', $data);
    }

    public function update(Request $request)
    {
        Gejala::where("id", $request->id)->update([
            'nama_gejala' => $request->nama_gejala,
            'kode_gejala' => $request->kode_gejala,
            // 'solusi' => $request->solusi,
        ]);

        return back()->with('success', 'Data gejala berhasil diupdate');
    }

    public function destroy($id)
    {
        //delete post
        $gejala = Gejala::findOrFail($id);
        $gejala->delete();

        //redirect to index
        return redirect()->route('gejala.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}