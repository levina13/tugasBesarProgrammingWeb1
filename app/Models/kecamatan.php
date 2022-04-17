<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kecamatan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'kecamatan',
    ];

    protected $primaryKey = 'id_kecamatan';
}
