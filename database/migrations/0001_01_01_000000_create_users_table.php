<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     * Artinya: tabel users akan dibuat sesuai struktur yang Anda inginkan.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // ID utama, auto increment, unsigned
            $table->id();
            // Nama user
            $table->string('name');
            // Email unik, wajib dipakai untuk login
            $table->string('email')->unique();
            // Waktu verifikasi email, bisa null
            $table->timestamp('email_verified_at')->nullable();
            // Password hash
            $table->string('password');
            // Role dengan enum
            $table->enum('role', [
                'super_admin',
                'admin',
                'teknisi',
                'noc',
            ]);
            // Nomor pegawai unik
            $table->string('employee_id', 50)->nullable()->unique();
            // Barcode unik
            $table->string('barcode', 100)->nullable()->unique();
            // Data profil
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('profile_photo_path', 100)->nullable();
            // Token remember login
            $table->rememberToken();
            // Timestamp otomatis
            $table->timestamps();
        });
    }

    /**
     * Balikkan migrasi jika perlu.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};