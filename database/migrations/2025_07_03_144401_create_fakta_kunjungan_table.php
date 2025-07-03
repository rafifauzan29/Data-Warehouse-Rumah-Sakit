<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fakta_kunjungan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waktu_id');
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('dokter_id');
            $table->unsignedBigInteger('diagnosa_id');
            $table->unsignedBigInteger('ruang_id');
            $table->timestamps();

            $table->foreign('waktu_id')->references('waktu_id')->on('dim_waktu');
            $table->foreign('pasien_id')->references('pasien_id')->on('dim_pasien');
            $table->foreign('dokter_id')->references('dokter_id')->on('dim_dokter');
            $table->foreign('diagnosa_id')->references('diagnosa_id')->on('dim_diagnosa');
            $table->foreign('ruang_id')->references('ruang_id')->on('dim_ruang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakta_kunjungan');
    }
};
