<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimDiagnosaSeeder extends Seeder
{
    public function run()
    {
        $basePenyakit = ['Demam', 'Flu', 'COVID-19', 'Malaria', 'TBC'];

        for ($i = 1; $i <= 100; $i++) {
            $namaUnik = $basePenyakit[array_rand($basePenyakit)] . ' ' . $i;

            DB::table('dim_diagnosa')->insert([
                'nama_penyakit' => $namaUnik,
                'kategori_penyakit' => fake()->randomElement(['Infeksi', 'Kronis', 'Ringan']),
                'kode_icd' => 'ICD-' . rand(100, 999),
                'biaya' => rand(100000, 400000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
