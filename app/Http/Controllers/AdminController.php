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
    public function laporan() {
        return view('admin.laporan');
    }
    public function transaksi() {
        return view('admin.transaksi');
    }
}