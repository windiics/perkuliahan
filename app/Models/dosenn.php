<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosenn extends Model
{
    use HasFactory;
    protected $table = "dosenn";
    protected $fillable = ['image','name','matkul'];
}
