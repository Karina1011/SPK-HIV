<?php

namespace App\Http\Controllers;
use App\Models\Penyakit;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $data = [
            "penyakit" => Penyakit::paginate(5),
        ];
        return view("admin.penyakit.index", $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_penyakit' => 'required',
            'kode_penyakit' => 'required',
            'solusi' => 'required',
            'deskripsi' => 'required',
        ]);

        Penyakit::create([
            'nama_penyakit' => $request->nama_penyakit,
            'kode_penyakit' => $request->kode_penyakit,
            'solusi' => $request->solusi,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('penyakit.index')->with('success', 'Data penyakit berhasil ditambahkan!');
    }
    public function edit(Request $request)
    {
        $data = [
            "edit" => Penyakit::where("id", $request->id)->first()
        ];

        return view('admin.penyakit.edit', $data);
    }

    public function update(Request $request)
    {
        Penyakit::where("id", $request->id)->update([
            'nama_penyakit' => $request->nama_penyakit,
            'kode_penyakit' => $request->kode_penyakit,
            'solusi' => $request->solusi,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Data Penyakit berhasil diupdate');
    }

    public function destroy($id)
    {
        //delete post
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();

        //redirect to index
        return redirect()->route('penyakit.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
