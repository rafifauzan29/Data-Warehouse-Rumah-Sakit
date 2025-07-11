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
        Schema::create('dim_dokter', function (Blueprint $table) {
            $table->id('dokter_id');
            $table->string('nama');
            $table->string('spesialisasi');
            $table->string('poli');
            $table->string('tingkat')->nullable();
            $table->decimal('biaya', 12, 2); 
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dim_dokter');
    }
};
