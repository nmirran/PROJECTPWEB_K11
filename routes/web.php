<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileAdminController;

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    if (auth()->check() && auth()->user()->id_role == 3) {
        return view('dashboard.customer.index');
    }
    return redirect('/')->with('error', 'Akses ditolak!');
})->name('dashboard');

Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->id_role == 2) {
        return view('dashboard.admin.index');
    }
    return redirect('/')->with('error', 'Akses ditolak! Hanya untuk Admin.');
})->name('admin.dashboard');

Route::get('/owner', function () {
    if (auth()->check() && auth()->user()->id_role == 1) {
        return view('dashboard.owner.index');
    }
    return redirect('/')->with('error', 'Hanya Owner yang boleh masuk!');
})->name('owner.dashboard');

Route::group([],function (){
    Route::get('/admin/produk', [ProductController::class, 'index'])->name('produk.index');
    Route::get('/admin/produk/tambah', [ProductController::class, 'create'])->name('produk.create');
    Route::post('/admin/produk/tambah', [ProductController::class, 'store'])->name('produk.store');
    Route::get('/admin/produk/edit/{id}', [ProductController::class, 'edit'])->name('produk.edit');
    Route::put('/admin/produk/edit/{id}', [ProductController::class, 'update'])->name('produk.update');
    Route::delete('/admin/produk/hapus/{id}', [ProductController::class, 'destroy'])->name('produk.delete');

    Route::get('/admin/profile', [ProfileAdminController::class, 'index'])->name('profile.index');
    Route::put('/admin/profile', [ProfileAdminController::class, 'update'])->name('profile.update');
    Route::put('/admin/profile/password', [ProfileAdminController::class, 'updatePassword'])->name('profile.password');
});



