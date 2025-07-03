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
        Schema::create('dim_ruang', function (Blueprint $table) {
            $table->id('ruang_id');
            $table->string('nama_ruang');
            $table->string('tipe_ruang');
            $table->integer('lantai');
            $table->decimal('biaya', 12, 2); 
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dim_ruang');
    }
};
