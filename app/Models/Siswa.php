<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'email','nama_lengkap','jenis_kelamin','kebutuhan_khusus','tempat_lahir',
        'detailsiswa_id','berkas_id','rapor_id','sistembayar_id'
    ];

    public function detail(): HasOne
    {
        return $this->hasOne(DetailSiswa::class);
    }

    public function berkas(): hasOne
    {
        return $this->hasOne(Berkas::class);
    }

    public function rapor(): HasOne
    {
        return $this->hasOne(Rapor::class);
    }

    public function sistemBayar(): HasOne
    {
        return $this->hasOne(SistemBayar::class);
    }
}
