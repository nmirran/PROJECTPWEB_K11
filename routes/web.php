<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    /** @var \App\Models\users $user */
    $user = Auth::user();

    if (Auth::check() && ($user->role()->first()->role ?? null) === 'customer') {
        return view('dashboard.user.index');
    }

    return redirect('/')->with('error', 'Akses ditolak!');
})->name('dashboard');

Route::get('/admin', function () {
    /** @var \App\Models\users $user */
    $user = Auth::user();

    if (Auth::check() && ($user->role()->first()->role ?? null) === 'admin') {
        return view('dashboard.admin.index');
    }

    return redirect('/')->with('error', 'Akses ditolak! Hanya untuk Admin.');
})->name('admin.dashboard');

Route::get('/owner', function () {
    /** @var \App\Models\users $user */
    $user = Auth::user();

    if (Auth::check() && ($user->role()->first()->role ?? null) === 'owner') {
        return view('dashboard.owner.index');
    }

    return redirect('/')->with('error', 'Akses ditolak! Hanya Owner.');
})->name('owner.dashboard');