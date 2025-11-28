<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OwnerController;

Route::get('/', [HomeController::class, 'index'])->name('landing');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
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
