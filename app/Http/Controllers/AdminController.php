<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\ListPesanan;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function admin() {
        $produks = Produk::all();
        $list_pesanans = ListPesanan::all();
        return view('admin.template', compact('produks', 'list_pesanans'));
    }
    
    public function transaksi() {
        return view('admin.transaksi');
    }
    public function meja() {
        return view('admin.meja');
    }
}