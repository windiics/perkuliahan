<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('matakuliahh')->insert([
            'name' => 'Statistika',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('matakuliahh')->insert([
            'name' => 'Aplikasi Akuntansi',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('matakuliahh')->insert([
            'name' => 'Komunikasi Data dan Jaringan Komputer',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
