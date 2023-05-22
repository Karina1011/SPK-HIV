<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'isi' => $request->isi,
            'image' => $data
        ]);
        return back()->with('berhasil', 'Edukasi Seks baru telah ditambahkan!');
    }
    
    public function edit(Request $request)
    {
        $data = [
            "edit" => Sexedu::where("id", $request->id)->first()
        ];

        return view("admin.edukasi.edit", $data);
    }

    public function update(Request $request)
    {

        if($request->file("image_new")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $data = $request->file("image_new")->store("Artikel");
        }else {
            $data = $request->gambarLama;
        }

        Sexedu::where("id", $request->id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'image' => $data
        ]);

        return redirect()->route('penyakit.index')->with('success', 'Data Edukasi Seks berhasil ditambahkan!');
    }

    
    public function destroy($id)
    { 
       $data = Edukasi::findorfail($id);

       $file = public_path('./edukasi').$data->image;

       if (file_exists($file)){
        @unlink($file);

       }
       $data->delete();
       return back();
        // //delete post
        // $artikel = artikel::findOrFail($id);
        // $artikel->delete();

        // //redirect to index
        // return redirect('/Admin/Artikel')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
