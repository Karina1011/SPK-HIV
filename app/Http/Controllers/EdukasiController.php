<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Edukasi;


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
        if($request->file("image")) {
            $data = $request->file("image")->store("Edukasi");
        }

        Edukasi::create([
            'judul' => $request->judul,
            'isi' =>Str::limit($request->isi, 50),
            'image' => $data
        ]);
        return back()->with('berhasil', 'Edukasi Seks baru telah ditambahkan!');
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

        if($request->file("image")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $data = $request->file("image")->store("Edukasi");
        }else {
            $data = $request->gambarLama;
        }

        Edukasi::where("id", $request->id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'image' => $data
        ]);

        return back()->with('berhasil', 'Edukasi Seks baru telah ditambahkan!');
    }

    public function destroy(Request $request, $id): RedirectResponse
{ 
    $data = Edukasi::findorfail($id);

    // Hapus record gambar dari database
    Storage::delete($request->gambarLama);
    $data->delete();

    // // Hapus file gambar dari penyimpanan
    // $file = public_path('edukasi' . DIRECTORY_SEPARATOR . $data->image);
    // if (file_exists($file)) {
    //     @unlink($file);
    // }

    return redirect()->route('edukasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
}

}
