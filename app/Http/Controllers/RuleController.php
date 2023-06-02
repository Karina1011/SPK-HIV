<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Rule;

class RuleController extends Controller
{

    public function index()
    {
       
        $data = [
            "rules" => Rule::all(),
            "penyakits" => penyakit::all(),
            "gejalas" => gejala::all()
    
        ];

        return view('admin.Rule.index', $data);
    }

    public function store(Request $request)
{
    $request->validate([
        'kode_penyakit' => 'required',
        'kode_gejala' => 'required',
        'pertanyaan' => 'required',
    ]);
    Rule::create([
        
        'kode_penyakit' => $request->kode_penyakit,
        'kode_gejala' => $request->kode_gejala,
        'pertanyaan' => $request->pertanyaan,
    ]);
    return redirect()->back()->with('success', 'Data rule berhasil ditambahkan!');
}

    
public function edit(Request $request)
{
    $data = [
        "edit" => Rule::where("id", $request->id)->first(),
        "penyakits" => penyakit::all(),
        "gejalas" => gejala::all()
    ];

    return view('admin.Rule.edit', $data);
}

public function update(Request $request)
{
    Rule::where("id", $request->id)->update([
    
        'kode_penyakit' => $request->kode_penyakit,
        'kode_gejala' => $request->kode_gejala,
        'pertanyaan' => $request->pertanyaan,


    ]);

    return back()->with('success', 'Data Rule berhasil diupdate');
}

    }
