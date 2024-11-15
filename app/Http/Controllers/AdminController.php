<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function admin() {
        return view('admin.template');
    }
    
    public function transaksi() {
        return view('admin.transaksi');
    }
    public function meja() {
        return view('admin.meja');
    }
    public function addlist() {
        return view('admin.addlistproduct');
    }
}