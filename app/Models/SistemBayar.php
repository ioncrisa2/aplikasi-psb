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

    protected $primaryKey = 'sistembayar_id';

    protected $fillable = [
        'sistembayar_id','skema','keterangan'
    ];

    protected $with = ['siswa'];

    public function siswa(): hasOne
    {
        return $this->hasOne(Siswa::class,'sistembayar_id');
    }
}
