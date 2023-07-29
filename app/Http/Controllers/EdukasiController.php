<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Edukasi;
use Illuminate\Http\RedirectResponse;

class EdukasiController extends Controller
{
    public function index()
    {
        $data = [
            "edukasi" => Edukasi::all()
        ];

        return view('admin.edukasi.index', $data);
    }

    public function store(Request $request)
    {
        $data = null;

        if ($request->file("image")) {
            $data = $request->file("image")->store("Edukasi");
        }

        Edukasi::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'image' => $data
        ]);

        return back()->with('berhasil', 'Data Edukasi Seks baru telah ditambahkan!');
    }

    public function edit(Request $request)
    {
        $data = [
            "edit" => Edukasi::where("id", $request->id)->first()
        ];

        return view("admin.edukasi.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $data = Edukasi::findOrFail($id);

        if ($request->file("image")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $data->image = $request->file("image")->store("Edukasi");
        }

        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->save();

        return back()->with('berhasil', 'Edukasi Seks baru telah diperbarui!');
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $data = Edukasi::findOrFail($id);

        if ($request->gambarLama) {
            Storage::delete($request->gambarLama);
        }

        $data->delete();

        return redirect()->route('edukasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
