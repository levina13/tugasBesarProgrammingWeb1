<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class objek_wisata extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nama',
        'alamat',
        'kecamatan',
        'jenis_wisata',
        'deskripsi',
        'latitude_Y',
        'longitude_X',
        'harga',
        'id_gambar',
    ];

    protected $primaryKey = 'id_objek_wisata';
}
