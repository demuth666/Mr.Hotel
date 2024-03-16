<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';

    protected $fillable = [
        'no_kamar',
        'kelas_kamar',
        'harga_kamar',
        'status_kamar'
    ];

    protected $casts = [
        'no_kamar' => 'integer',
        'harga_kamar' => 'integer',
    ];

    protected $attributes = [
        'status_kamar' => 'Tersedia'
    ];
}