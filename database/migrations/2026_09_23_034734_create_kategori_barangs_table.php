<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kategori_barangs', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('kategori_id')->unique()->nullable(); // Auto-increment ID (Kode Kategori)
            $table->string('nama_kategori');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_barangs');
    }
};