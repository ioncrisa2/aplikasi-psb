<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BMP extends Model
{
    use HasFactory;

    protected $table = 'bmp';

    protected $fillable = [
        'jenjang_id','item','harga'
    ];

    public function jenjang(): HasOne
    {
        return $this->hasOne(Jenjang::class,'id');
    }
}
