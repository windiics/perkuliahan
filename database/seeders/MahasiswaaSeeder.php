<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswaa')->insert([
            'image'=> '',
            'name' => 'Windi CS',
            'alamat'=> 'Bandung',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('mahasiswaa')->insert([
            'image'=> '',
            'name' => 'Tya Cantik',
            'alamat'=> 'Garut',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('mahasiswaa')->insert([
            'image'=> '',
            'name' => 'Ani',
            'alamat'=> 'Bali',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
