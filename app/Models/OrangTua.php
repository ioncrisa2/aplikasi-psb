<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrangTua extends Model
{
    use HasFactory;

    protected $table = 'orang_tua';

    protected $fillable = [
        'nama_orangtua','tlp_orangtua'
    ];

    public function detail(): BelongsTo
    {
        return $this->belongsTo(DetailSiswa::class,'orangtua_id');
    }

}
