<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berkas extends Model
{
    use HasFactory;

    protected $table = 'berkas';

    protected $fillable = [
        'nama_file'
    ];

    public function siswas(): BelongsTo
    {
        return $this->belongsTo(Siswa::class,'berkas_id');
    }
}
