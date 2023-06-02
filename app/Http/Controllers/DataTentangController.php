<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DataTentangController extends Controller
{
    public function index(): View
    {

        $data_tentang = Tentang::latest()->paginate(5);

        return view('admin.tentang.index', compact('data_tentang'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10000',
        ]);

        if ($request->file("image")) {
            
            $data = $request->file("image")->store("tentang");
        }

        Tentang::create([
            'judul' => $request->judul,
            'isi' =>Str::limit($request->isi, 5),
            'image' => $data
        ]);
        
        return redirect()->route('tentang.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    // public function show(string $id): View
    // {
    //     $data_tentang = Tentang::findOrFail($id);

    //     return view('admin.datatentang.detail_tentang', compact('data_tentang'));
    // }

    public function edit(string $id): View
    {
        $data_tentang = Tentang::findOrFail($id);

        return view('admin.tentang.edit', compact('data_tentang'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'isi' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10000'
        ]);

        $data_tentang = Tentang::findOrFail($id);
        
        if ($request->file("image")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            
            $data = $request->file("image")->store("tentang");
        } else {
            $data = $request->gambarLama;
        }

        Tentang::where("id", $id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'image' => $data,
        ]);

        return redirect()->route('tentang.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $data_tentang = Tentang::findOrFail($id);

        Storage::delete($request->gambarLama);
        $data_tentang->delete();

        return redirect()->route('tentang.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
