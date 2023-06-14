<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Database\Eloquent\SoftDeletes;
class Rule extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'rules';

    protected $fillable = [
        'id_penyakit',
        'daftar_gejala',
    ];

    public function gejala()
    {
        return $this->hasMany(Gejala::class, 'id', 'daftar_gejala');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit', 'id');
    }
}
