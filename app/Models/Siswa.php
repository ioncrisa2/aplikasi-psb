<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'email', 'nama_lengkap', 'jenis_kelamin', 'kebutuhan_khusus', 'tempat_lahir',
        'detailsiswa_id', 'berkas_id', 'rapor_id', 'sistembayar_id'
    ];

    // protected $with = ['totalBiaya','sistemBayar','jenjang','VirtualAccount'];

    public function totalBiaya(): HasOne
    {
        return $this->hasOne(TotalBiaya::class,'id');
    }

    public function sistemBayar(): BelongsTo
    {
        return $this->belongsTo(SistemBayar::class,'sistembayar_id');
    }

    public function jenjang(): HasOne
    {
        return $this->hasOne(Jenjang::class,'jenjang_id');
    }

    public function virtualAccount(): HasMany
    {
        return $this->hasMany(VirtualAccount::class,'siswa_id');
    }

    protected function tanggalLahir(): Attribute
    {
        return Attribute::make(
            get: function ($value){
                $date = Carbon::parse($value);
                $date->setLocale('id');
                return $date->translatedFormat('d F Y');
            },
        );
    }

    protected function createAt(): Attribute
    {
        return Attribute::make(
            get: function ($value){
                $date = Carbon::parse($value);
                $date->setLocale('id');
                return $date->translatedFormat('d F Y');
            },
        );
    }
}
