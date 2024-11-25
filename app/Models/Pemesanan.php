<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = "pemesanans";
    protected $fillable = [
        'jumlah',
        'harga',
        'catatan',
        'metode_pembayaran',
        'diskon',
        'pajak',
        'total',
        'bayar',
        'kembalian',
    ];
}
