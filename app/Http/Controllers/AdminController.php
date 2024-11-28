<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function admin() {
        $produks = Produk::with('list_pesanan')->get();
        return view('admin.template', compact('produks'));
    }
    
    public function transaksi() {
        return view('admin.transaksi');
    }
    public function meja() {
        return view('admin.meja');
    }
}