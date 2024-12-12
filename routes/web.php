<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemesananController;

//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/proses', [AuthController::class, 'dologin']);

});

// untuk admin dan kasir
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk admin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.admin');
});

// untuk kasir
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/kasir', [KasirController::class, 'index']);   

});

Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::post('/payment', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/set_session_category', [AdminController::class, 'set_session_category']);
Route::get('/get_session_category', [PaymentController::class, 'get_session_category']);

// Route::get('/template', [AdminController::class, 'index']);

Route::get('/transaksi', [AdminController::class, 'transaksi']);

Route::get('/meja', [AdminController::class, 'meja']);
Route::get('/search', [AdminController::class, 'search'])->name('admin.search');
Route::get('/diskon', [ModalController::class, 'diskon']);
Route::get('/nota', [ModalController::class, 'nota']);
Route::get('/harian', [LaporanController::class, 'harian']);
Route::get('/bulanan', [LaporanController::class, 'bulanan']);
Route::get('/tahunan', [LaporanController::class, 'tahunan']);
Route::resource('produks', App\Http\Controllers\ProdukController::class);
Route::get('/produks', [ProdukController::class, 'index'])->name('produks.index');
Route::post('/pemesanan/proses', [PemesananController::class, 'prosesData'])->name('pemesanan.prosesData');
Route::get('/admin/search', [AdminController::class, 'searchProduk'])->name('admin.searchProduk');
Route::get('/admin/get-produk', [AdminController::class, 'getProdukByKategori'])->name('admin.get-produk');
// Route::get('/admin', [PemesananController::class, 'index']);

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', 'AdminController@index');