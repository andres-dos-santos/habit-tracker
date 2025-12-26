<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Route;

// site
Route::get('/', [SiteController::class, 'index'])->name('site.index');

// login
Route::get('/login', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('auth.login');

// authenticated users
Route::middleware('auth')->group(function () {
  Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('site.dashboard');
});

