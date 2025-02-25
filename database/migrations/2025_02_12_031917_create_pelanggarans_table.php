<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('jenis'); // Jenis pelanggaran
            $table->string('konsekuensi'); // Konsekuensi pelanggaran
            $table->unsignedInteger('poin'); // Poin pelanggaran (tidak boleh negatif)
            $table->timestamps(); // created_at & updated_at otomatis
        });
    }

    /**
     * Rollback migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggarans');
    }
};

