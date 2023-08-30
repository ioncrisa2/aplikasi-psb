<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SistemBayar extends Model
{
    use HasFactory;

    protected $table = 'sistem_bayar';

    protected $fillable = [
        'skema','keterangan'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class,'sistembayar_id');
    }
}
