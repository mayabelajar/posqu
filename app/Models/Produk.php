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
        'list_pesanans_id',
    ];

    public function list_pesanans() {
        return $this->hasMany(ListPesanan::class);
    }
}
