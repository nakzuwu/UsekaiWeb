<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\BlogController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminDashboardController::class, 'profile'])->name('admin.profile');
});

Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/profile', [AdminProfileController::class, 'show'])->name('admin.profile');
    Route::post('/profile/username', [AdminProfileController::class, 'updateUsername'])->name('admin.updateUsername');
    Route::post('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('admin.updatePassword');
});

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::resource('blog', BlogController::class)->except('show');
});
