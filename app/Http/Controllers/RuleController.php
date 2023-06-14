<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\Paginator;
use App\Models\Penyakit;
use Illuminate\View\View;
use App\Models\Gejala;
use App\Models\Rule;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with(['penyakit', 'gejala'])
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        
        $penyakits = Penyakit::get();
        $gejalas = Gejala::all();
    
        return view('admin.rule.index', compact('rules', 'penyakits', 'gejalas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penyakit' => 'required',
            'daftar_gejala' => 'required|array',
        ]);
        
        // Menyimpan data ke dalam tabel 'rules'
        $rule = new Rule;
        $rule->id_penyakit = $request->input('id_penyakit');
        $rule->daftar_gejala = implode(',', $request->input('daftar_gejala'));
        $rule->save();
        
        return redirect()->back()->with('berhasil', 'Data rule berhasil ditambahkan!');
    }
    
public function edit(string $id)
{
    $rule = Rule::findOrFail($id);
    $penyakits = Penyakit::get();
    $gejala = Gejala::all();
    
    // Mendapatkan daftar gejala yang telah dipilih pada data yang akan diupdate
    $selectedGejala = explode(',', $rule->daftar_gejala);

    return view('admin.rule.edit', $data);
}

public function update(Request $request)
{
     // Validasi input jika diperlukan
     $request->validate([
        'id_penyakit' => 'required',
        'daftar_gejala' => 'required|array',
    ]);

    // Temukan data Rule berdasarkan id
    $rule = Rule::findOrFail($id);
     // Update data Rule
     $rule->id_penyakit = $request->input('id_penyakit');
     $rule->daftar_gejala = implode(',', $request->input('daftar_gejala'));
     $rule->save();


    return back()->with('success', 'Data Rule berhasil diupdate');
    }

    public function destroy($id)
    {
        // Temukan data Rule berdasarkan id
        $rule = Rule::findOrFail($id);

        // Hapus data Rule
        $rule->delete();


        //redirect to index
        return redirect()->route('rule.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
