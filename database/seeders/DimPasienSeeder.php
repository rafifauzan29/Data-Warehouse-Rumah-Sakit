<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DimPasienSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            $tanggalLahir = $faker->dateTimeBetween('-80 years', '-10 years')->format('Y-m-d');
            $umur = Carbon::parse($tanggalLahir)->age;

            DB::table('dim_pasien')->insert([
                'nama' => $faker->name,
                'tanggal_lahir' => $tanggalLahir,
                'umur' => $umur,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat' => $faker->address,
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
