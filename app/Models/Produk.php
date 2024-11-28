<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produks";
    protected $fillable = [
        'image',
        'nama',
        'kategori',
        'stok',
        'harga',
        'deskripsi',
        'list_pesanans_id',
    ];

    public function list_pesanan() {
        return $this->hasMany(ListPesanan::class);
    }
}
