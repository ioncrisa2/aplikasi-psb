<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';

    protected $fillable = [
        'asal_sekolah','alamat_sekolah','telepon'
    ];

    public function detail(): BelongsTo
    {
        return $this->belongsTo(DetailSiswa::class,'sekolah_id');
    }
}
