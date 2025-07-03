<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DimWaktuSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $tanggal = Carbon::now()->subDays(rand(1, 100));
            DB::table('dim_waktu')->insert([
                'tanggal' => $tanggal->format('Y-m-d'),
                'bulan' => $tanggal->format('F'),
                'kuartal' => 'Q' . ceil($tanggal->month / 3),
                'tahun' => $tanggal->year,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
