<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosa extends Model
{
    use HasFactory;

    protected $table = 'riwayat_diagnosa';
    protected $fillable = ['pasien_id', 'penyakit_id', 'gejala_terpilih', 'tanggal_diagnosa'];
    protected $dates = ['tanggal_diagnosa'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
