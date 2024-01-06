<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'alamat',
    ];
    
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => asset('/storage/mahasiswas/' . $image),
        );
    }
}
