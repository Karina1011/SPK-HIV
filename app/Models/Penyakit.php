<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penyakit',
        'kode_penyakit',
        'solusi'
    ];
    
    protected $table = "penyakits";
    public function gejala()
    {
        return $this->hasMany(Gejala::class);
    }
    
    //diagnosa
    public function penyakit()
    {
        return $this->belongsToMany(Penyakit::class);
    }
}
