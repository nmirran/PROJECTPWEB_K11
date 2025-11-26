<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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
