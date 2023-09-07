<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DPP extends Model
{
    use HasFactory;

    protected $table = 'dpp';

    protected $fillable = ['jenjang_id','harga','diskon','diskon_tambahan'];

    public function jenjang(): BelongsTo
    {
        return $this->belongsTo(Jenjang::class,'jenjang_id');
    }
}
