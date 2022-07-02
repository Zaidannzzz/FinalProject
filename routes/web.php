<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembeliController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/kategori/index', [KategoriController::class, 'index'])->name('indexKategori');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('editKategori');
Route::post('/kategori/post', [KategoriController::class, 'store'])->name('storeKategori');
Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('updateKategori');
Route::get('/kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('destroyKategori');

Route::get('/produk/index', [ProdukController::class, 'index'])->name('indexProduk');
// Route::get('/produk/index/search', [ProdukController::class, 'search'])->name('searchProduk');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('createProduk');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('editProduk');
Route::post('/produk/post', [ProdukController::class, 'store'])->name('storeProduk');
Route::post('/produk/update/{id}', [ProdukController::class, 'update'])->name('updateProduk');
Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('destroyProduk');
Route::get('/produk/download', [ProdukController::class, 'download'])->name('downloadProduk');
Route::post('/produk/import', [ProdukController::class, 'import'])->name('importProduk');

Route::get('/pesanan/index', [OrderController::class, 'index'])->name('indexPesanan');
Route::get('/pesanan/create', [OrderController::class, 'create'])->name('createPesanan');
Route::get('/pesanan/edit/{id}', [OrderController::class, 'edit'])->name('editPesanan');
Route::post('/pesanan/post', [OrderController::class, 'store'])->name('storePesanan');
Route::post('/pesanan/update/{id}', [OrderController::class, 'update'])->name('updatePesanan');
Route::get('/pesanan/delete/{id}', [OrderController::class, 'destroy'])->name('destroyPesanan');

Route::get('/laporan/index', [LaporanController::class, 'index'])->name('indexLaporan');
Route::get('/laporan/index/cetak-pdf', [LaporanController::class, 'create'])->name('createLaporan');

Route::get('/pelanggan/index', [PembeliController::class, 'index'])->name('indexPelanggan');
Route::get('/pelanggan/edit/{id}', [PembeliController::class, 'edit'])->name('editPelanggan');
Route::post('/pelanggan/post', [PembeliController::class, 'store'])->name('storePelanggan');
Route::post('/pelanggan/update/{id}', [PembeliController::class, 'update'])->name('updatePelanggan');
Route::get('/pelanggan/delete/{id}', [PembeliController::class, 'destroy'])->name('destroyPelanggan');
