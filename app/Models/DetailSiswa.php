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

    protected $with = ['orangTua','sekolah','siswa'];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class,'detailsiswa_id');
    }

    public function orangTua(): HasOne
    {
        return $this->hasOne(OrangTua::class,'id');
    }

    public function sekolah(): HasOne
    {
        return $this->hasOne(Sekolah::class,'id');
    }
}
