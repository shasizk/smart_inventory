<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Data yang boleh diisi saat create/update.
     * Ini penting agar register bisa menyimpan field di tabel users.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'employee_id',
        'barcode',
        'phone',
        'address',
        'profile_photo_path',
    ];

    /**
     * Field yang disembunyikan saat serialisasi.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data.
     * password otomatis di-hash saat di-set.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}