<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Pasien extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'pengguna';
    protected $fillable = ['nama', 'alamat', 'usia', 'jenis_kelamin', 'user_id'];

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



