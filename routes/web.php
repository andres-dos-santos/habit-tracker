<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Route;

// site
Route::get('/', [SiteController::class, 'index'])->name('site.index');

// login
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');
Route::get('/cadastro', [RegisterController::class, 'index'])->name('site.register');
Route::post('/cadastro', [RegisterController::class, 'store'])->name('auth.register');

// authenticated users
Route::middleware('auth')->group(function () {
  Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('site.dashboard');
});

