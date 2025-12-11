<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->id_role == 3) {
        return view('dashboard.customer.index');
    }
    return redirect('/')->with('error', 'Akses ditolak! Hanya Customer.');
})->name('dashboard')->middleware('auth');

Route::get('/admin', function () {
    if (Auth::check() && Auth::user()->id_role == 2) {
        return view('dashboard.admin.index');
    }
    return redirect('/')->with('error', 'Akses ditolak! Hanya untuk Admin.');
})->name('admin.dashboard')->middleware('auth');

Route::get('/admin/produk', [ProductController::class, 'index'])
    ->name('produk.index')
    ->middleware('auth');

Route::get('/admin/produk/create', function () {
    if (Auth::check() && Auth::user()->id_role == 2) {
        return view('admin.produk.create');
    }
    return redirect('/')->with('error', 'Akses ditolak! Hanya untuk Admin.');
})->name('produk.create')->middleware('auth');

Route::get('/admin/profile', function () {
    if (Auth::check() && Auth::user()->id_role == 2) {
        return view('admin.profile.index');
    }
    return redirect('/')->with('error', 'Akses ditolak! Hanya untuk Admin.');
})->name('profile.index')->middleware('auth');

Route::get('/owner', function () {
    if (Auth::check() && Auth::user()->id_role == 1) {
        return view('dashboard.owner.index');
    }
    return redirect('/')->with('error', 'Akses ditolak! Hanya Owner.');
})->name('owner.dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/owner/karyawan', [OwnerController::class, 'karyawanForm']);
    Route::post('/owner/karyawan', [OwnerController::class, 'storeKaryawan']);
});

Route::get('/owner/karyawan_list', [OwnerController::class, 'listKaryawan'])->middleware('auth');
Route::get('/owner/karyawan_edit/{id}', [OwnerController::class, 'editKaryawan'])->middleware('auth');
Route::post('/owner/karyawan_edit/{id}', [OwnerController::class, 'updateKaryawan'])->middleware('auth');
Route::get('/owner/karyawan_delete/{id}', [OwnerController::class, 'deleteKaryawan'])->middleware('auth');

Route::get('/owner/profil_toko', [OwnerController::class, 'showProfilToko'])->middleware('auth');
Route::get('/owner/profil_toko', [OwnerController::class, 'showProfilToko'])->middleware('auth');
Route::get('/owner/profil_toko_edit', [OwnerController::class, 'editProfilToko'])->middleware('auth');
Route::post('/owner/profil_toko_edit', [OwnerController::class, 'updateProfilToko'])->middleware('auth');

Route::middleware(['auth'])
    ->prefix('dashboard/customer')
    ->name('dashboard.customer.')
    ->group(function () {

        Route::get('/', [CustomerController::class, 'dashboard'])->name('index');

        // Profile
        Route::get('/profil', [CustomerController::class, 'profil'])->name('profil');
        Route::put('/profil', [CustomerController::class, 'updateProfile'])->name('profile.update');
        Route::put('/password', [CustomerController::class, 'updatePassword'])->name('password.update');
        Route::put('/photo', [CustomerController::class, 'updatePhoto'])->name('photo.update');

        // Menu customer
        Route::get('/produk', [CustomerController::class, 'produk'])->name('produk');
        Route::get('/keranjang', [CustomerController::class, 'keranjang'])->name('keranjang');
        Route::get('/pesanan', [CustomerController::class, 'pesanansaya'])->name('pesanan');
        Route::get('/riwayat', [CustomerController::class, 'riwayat'])->name('riwayat');
    });
