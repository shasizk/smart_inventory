<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $table = 'kategori_barangs';
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'kategori_id',
        'nama_kategori',
        'catatan',
    ];
}