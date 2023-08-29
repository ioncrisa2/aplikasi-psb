<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenjang extends Model
{
    use HasFactory;

    protected $table = 'jenjang';

    protected $primaryKey = 'jenjang_id';

    protected $fillable = [
        'nama','jurusan'
    ];

    public function bmp(): HasOne
    {
        return $this->HasOne(BMP::class,'id');
    }

    public function dpp(): HasOne
    {
        return $this->hasOne(DPP::class,'id');
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class);
    }
}
