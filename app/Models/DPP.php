<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DPP extends Model
{
    use HasFactory;

    protected $table = 'dpp';

    protected $fillable = [
        'jenjang_id','harga','diskon'
    ];

    public function jenjang(): HasOne
    {
        return $this->hasOne(Jenjang::class);
    }
}
