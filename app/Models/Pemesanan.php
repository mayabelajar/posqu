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

    public function list_pesanan() {
        return $this->hasMany(ListPesanan::class);
    }
    
    public function  user() {
        return $this->belongsTo(User::class);
    }
}
