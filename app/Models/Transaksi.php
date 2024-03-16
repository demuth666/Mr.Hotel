<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'tanggal',
        'total_bayar',
        'check_in',
        'check_out',
        'user_id',
        'kamar_id',
    ];

    protected $casts = [
        'total_bayar' => 'integer',
        'user_id' => 'integer',
        'kamar_id' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}