<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailSiswa extends Model
{
    use HasFactory;

    protected $table = 'detail_siswa';

    protected $fillable = [
        'orangtua_id','sekolah_id','alamat_rumah','telepon'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    public function orangTua(): HasMany
    {
        return $this->hasMany(OrangTua::class);
    }

    public function sekolah(): HasOne
    {
        return $this->hasOne(Sekolah::class);
    }
}
