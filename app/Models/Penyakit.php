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
        'solusi',
        'deskripsi'
    ];
    
    protected $table = "penyakits";    
    //diagnosa
    public function penyakit()
    {
        return $this->belongsToMany(Penyakit::class);
    }
}
