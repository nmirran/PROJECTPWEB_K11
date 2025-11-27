<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


// ✅ Landing page (hapus yang double!)
Route::get('/', [HomeController::class, 'index'])->name('landing');

// ✅ Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// ✅ Logout harus pakai POST sebaiknya, tapi kalau mau GET juga gpp
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// ✅ Dashboard ROLE = customer (id_role = 3)
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
