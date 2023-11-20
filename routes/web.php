<?php

use App\Http\Controllers\AfterCartController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CallbackInvoiceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\User\ChangePasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;

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










// Menampilkan formulir login
Route::group(['middleware' => 'NoAuth'], function() {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');

    // Menangani proses login
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    
});

    
    


    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard_produk/{id}', [DashboardController::class, 'show'])->name('dashboard.produk');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('checkout', CartController::class)->only(['index', 'store']);

    Route::get('/success', [AfterCartController::class, 'success'])->name('success');
    Route::get('/failure', [AfterCartController::class, 'failure'])->name('failure');
    Route::post('/x/callback-invoice', CallbackInvoiceController::class);
    Route::get('/add-to-cart/{item}', [CartController::class, 'addToCart'])->name('add-to-cart');




Route::group(['middleware' => ['auth', 'CekLevel'], 'prefix' => 'admin'], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::delete('/kategori/{id}', [KategoriController::class, 'delete'])->name('kategori.delete');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/barang/{id}', [ProdukController::class, 'delete'])->name('barang.delete');
    Route::put('/barang/{id}', [ProdukController::class, 'update'])->name('barang.update');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});