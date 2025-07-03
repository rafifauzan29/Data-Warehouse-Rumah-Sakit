<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DimWaktuSeeder::class,
            DimPasienSeeder::class,
            DimDokterSeeder::class,
            DimDiagnosaSeeder::class,
            DimRuangSeeder::class,
            FaktaKunjunganSeeder::class,
        ]);
    }
}
