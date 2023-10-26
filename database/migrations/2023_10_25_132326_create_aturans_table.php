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
        Schema::create('aturan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit');
            $table->string('kode_gejala');
            $table->string('hasil_lab');
            $table->string('kode_gejalaPD');
            $table->timestamps();

            // Tambahkan indeks asing ke tabel penyakit dan gejala
            $table->foreign('kode_penyakit')->references('kode_penyakit')->on('penyakit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aturan', function (Blueprint $table) {
            $table->dropForeign(['kode_penyakit']);
            $table->dropForeign(['kode_gejala']);
        });
        
        Schema::dropIfExists('aturan');
    }
};
