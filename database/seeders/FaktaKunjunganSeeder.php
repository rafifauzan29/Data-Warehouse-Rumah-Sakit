<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaktaKunjunganSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 100) as $i) {
            DB::table('fakta_kunjungan')->insert([
                'waktu_id' => rand(1, 20),
                'pasien_id' => rand(1, 20),
                'dokter_id' => rand(1, 20),
                'diagnosa_id' => rand(1, 20),
                'ruang_id' => rand(1, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
