<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_gejala',
        'kode_gejala',
        'kode_penyakit'
    ];
    public function penyakit()
    {
        return $this->belongsTo("App\Models\penyakit", "kode_penyakit", "id");
    }
}
