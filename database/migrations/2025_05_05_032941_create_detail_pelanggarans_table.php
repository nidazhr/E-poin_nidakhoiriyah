<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->biginteger('id_pelanggar');
            $table->biginteger('id_pelanggaran');
            $table->biginteger('id_user'); 
            $table->integer('status'); // 1 = sudah di berikan konsekuensi ,0 = belum
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pelanggarans');
    }
};
