<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosennSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosenn')->insert([
            'image'=> '',
            'name' => 'Ardhito',
            'matkul'=> 'Komunikasi Data dan Jaringan Komputer',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('dosenn')->insert([
            'image'=> '',
            'name' => 'Chintya',
            'matkul'=> 'Aplikasi Akuntansi',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('dosenn')->insert([
            'image'=> '',
            'name' => 'Syaira',
            'matkul'=> 'Statistika',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}

