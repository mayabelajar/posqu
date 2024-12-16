<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPesanan extends Model
{
    use HasFactory;

    protected $table = "list_pesanans";
    protected $fillable = [
        'pemesanans_id',
        'produks_id',
        'qty',
        'total',
    ];

    public function pemesanan() {
        return $this->belongsTo(Pemesanan::class);
    }
    
    public function produk() {
        return $this->belongsTo(Produk::class, 'produks_id');
    }
    
}
