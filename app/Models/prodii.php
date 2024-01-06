<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodii extends Model
{
    use HasFactory;
    protected $table = "prodii";
    protected $fillable = ['name', 'kode'];
}
