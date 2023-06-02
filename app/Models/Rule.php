<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rule extends Model
{

    protected $table = 'rules';

    protected $fillable =[
        'kode_penyakit',
        'kode_gejala',
        'pertanyaan'

    ];

    public function gejala()
    {
        return $this->belongsTo(gejala::class, 'kode_gejala', 'id');
    }

    public function penyakit()
    {
        return $this->belongsTo(penyakit::class, 'kode_penyakit', 'id');
    }
}