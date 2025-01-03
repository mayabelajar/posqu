<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ListPesananController;

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
Route::post('/prosesData', [PemesananController::class, 'prosesData'])->name('pemesanan.prosesData');

// Route::get('/template', [AdminController::class, 'index']);

Route::get('/transaksi', [ListPesananController::class, 'index'])->name('transaksi.index');

Route::get('/meja', [AdminController::class, 'meja']);
Route::get('/harian', [PemesananController::class, 'harian'])->name('harian');
Route::get('/bulanan', [PemesananController::class, 'bulanan'])->name('bulanan');
Route::get('/tahunan', [PemesananController::class, 'tahunan'])->name('tahunan');
Route::resource('produks', App\Http\Controllers\ProdukController::class);
Route::get('/produks', [ProdukController::class, 'index'])->name('produks.index');
Route::post('/pemesanan/proses', [PemesananController::class, 'prosesData'])->name('pemesanan.prosesData');
Route::get('/admin/search', [AdminController::class, 'searchProduk'])->name('admin.searchProduk');
Route::get('/admin/get-produk', [AdminController::class, 'getProdukByKategori'])->name('admin.get-produk');
Route::post('/index', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::get('/pemesanan', [PemesananController::class, 'index']);
Route::get('/admin/search', [ProdukController::class, 'search'])->name('admin.produks.search');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin.admin');
Route::get('/admin/produk-by-kategori', [AdminController::class, 'getProdukByKategori']);
Route::get('/cetak-struk', [PaymentController::class, 'cetakStruk'])->name('cetak-struk');
// Route::get('/admin', [PemesananController::class, 'index']);


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/admin', 'AdminController@index');