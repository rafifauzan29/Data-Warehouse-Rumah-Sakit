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
        Schema::create('dim_diagnosa', function (Blueprint $table) {
            $table->id('diagnosa_id');
            $table->string('nama_penyakit');
            $table->string('kategori_penyakit');
            $table->string('kode_icd')->nullable();
            $table->decimal('biaya', 12, 2); 
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dim_diagnosa');
    }
};
