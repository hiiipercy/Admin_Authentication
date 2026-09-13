<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AdminAuthController;

// user routes
Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});
// End user routes

// Admin routes

// Group for Guest Admins (Login only)
Route::group(['prefix' => 'admin', 'middleware' => 'redirectMiddleware'], function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
});

// Group for Authenticated Admins
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// End admin routes

require __DIR__.'/settings.php';