<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimRuangSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 100) as $i) {
            DB::table('dim_ruang')->insert([
                'nama_ruang' => 'Ruang ' . $i,
                'tipe_ruang' => fake()->randomElement(['Rawat Inap', 'Poli', 'UGD']),
                'lantai' => rand(1, 5),
                'biaya' => rand(100000, 500000), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
