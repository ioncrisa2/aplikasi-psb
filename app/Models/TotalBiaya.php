<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TotalBiaya extends Model
{
    use HasFactory;

    protected $table = 'total_biaya';

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class,'totalbiaya_id');
    }
}
