<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'email', 'nama_lengkap', 'jenis_kelamin', 'kebutuhan_khusus', 'tempat_lahir',
        'detailsiswa_id', 'berkas_id', 'rapor_id', 'sistembayar_id'
    ];

    public function detail(): HasOne
    {
        return $this->hasOne(DetailSiswa::class,'id');
    }

    public function berkas(): HasOne
    {
        return $this->hasOne(Berkas::class,'id');
    }

    public function rapor(): HasOne
    {
        return $this->hasOne(Rapor::class,'id');
    }

    public function sistemBayar(): HasOne
    {
        return $this->hasOne(SistemBayar::class,'id');
    }

    public function jenjang(): HasOne
    {
        return $this->hasOne(Jenjang::class,'jenjang_id');
    }
}
