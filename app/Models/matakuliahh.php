<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliahh extends Model
{
    use HasFactory;
    protected $table = "matakuliahh";
    protected $fillable = ['name', 'dosenpengampu'];
}
