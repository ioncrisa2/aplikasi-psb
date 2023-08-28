<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jenjang extends Model
{
    use HasFactory;

    protected $table = 'jenjang';

    protected $fillable = [
        'nama','jurusan'
    ];

    public function bmp(): BelongsTo
    {
        return $this->belongsTo(BMP::class,'jenjang_id');
    }

    public function dpp(): BelongsTo
    {
        return $this->belongsTo(DPP::class);
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class);
    }
}
