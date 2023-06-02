<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TutorialController extends Controller
{
    public function index(): View
    {

        $tutorial = Tutorial::latest()->paginate(5);

        return view('admin.tutorial.index', compact('tutorial'));
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

        Tutorial::create([
            'judul' => $request->judul,
            'isi' =>Str::limit($request->isi, 5),
            'image' => $data
        ]);
        
        return redirect()->route('tutorial.index')->with(['success' => 'Data berhasil ditambahkan']);
    }

    public function edit(string $id): View
    {
        $tutorial = Tutorial::findOrFail($id);

        return view('admin.tutorial.edit', compact('tutorial'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'judul' => 'required|min:5',
            'isi' => 'required|min:5',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:10000'
        ]);

        $tutorial = Tutorial::findOrFail($id);
        
        if ($request->file("image")) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }
            
            $data = $request->file("image")->store("tutorial");
        } else {
            $data = $request->gambarLama;
        }

        Tutorial::where("id", $id)->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'image' => $data,
        ]);

        return redirect()->route('tutorial.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $tutorial = Tutorial::findOrFail($id);

        Storage::delete($request->gambarLama);
        $data_tentang->delete();

        return redirect()->route('tutorial.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
