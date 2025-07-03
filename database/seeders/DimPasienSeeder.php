<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DimPasienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            DB::table('dim_pasien')->insert([
                'nama' => $faker->name,
                'umur' => rand(10, 80),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat' => $faker->address,
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
