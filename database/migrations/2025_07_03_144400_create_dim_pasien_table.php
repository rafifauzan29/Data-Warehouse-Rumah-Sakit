<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dim_pasien', function (Blueprint $table) {
            $table->id('pasien_id');
            $table->string('nama');
            $table->date('tanggal_lahir'); // ✅ Ditambahkan di sini
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat');
            $table->string('golongan_darah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dim_pasien');
    }
};
