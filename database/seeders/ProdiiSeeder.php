<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prodii')->insert([
            'name' => 'Teknik Informatika',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('prodii')->insert([
            'name' => 'Komputerisasi Akuntansi',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('prodii')->insert([
            'name' => 'Manajemen Informatika',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
