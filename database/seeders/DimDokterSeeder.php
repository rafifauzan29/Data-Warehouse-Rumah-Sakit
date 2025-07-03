<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimDokterSeeder extends Seeder
{
    public function run()
    {
        $spesialis = ['Umum', 'Anak', 'Bedah', 'Mata', 'Kulit'];
        for ($i = 0; $i < 100; $i++) {
            DB::table('dim_dokter')->insert([
                'nama' => 'Dr. ' . fake()->lastName,
                'spesialisasi' => $spesialis[array_rand($spesialis)],
                'poli' => 'Poli ' . fake()->word,
                'tingkat' => fake()->randomElement(['Junior', 'Senior', 'Spesialis']),
                'biaya' => rand(150000, 500000), // 🆕 isi biaya
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
