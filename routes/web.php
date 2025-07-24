<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PublicBlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DiscordEmbedController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\AlsephinaRheaTalentController;
use App\Http\Controllers\ReikaValenciaTalentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'));
Route::get('/blog', [PublicBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [PublicBlogController::class, 'show'])->name('blog.show');
Route::get('/about', [AboutController::class, 'index'])->name('about');

/*
|--------------------------------------------------------------------------
| Auth Routes (prefix: talent)
|--------------------------------------------------------------------------
*/

Route::prefix('talent')->group(function () {
    Route::get('/', [TalentController::class, 'index'])->name('talent');
    Route::get('/reikavalencia', [ReikaValenciaTalentController::class, 'index'])->name('talent.reikavalencia');
    Route::get('/alsephinarhea', [AlsephinaRheaTalentController::class, 'index'])->name('talent.alsephinarhea');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (prefix: u53k41-1d)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:admin'])->prefix('u53k41-1d')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [AdminProfileController::class, 'show'])->name('profile');
    Route::post('/profile/username', [AdminProfileController::class, 'updateUsername'])->name('updateUsername');
    Route::post('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('updatePassword');

    // Blog Management
    Route::resource('blog', BlogController::class)->except('show');

    // Kirim Embed ke Discord
    Route::get('/send-embed', [DiscordEmbedController::class, 'create'])->name('discord.embed.create');
    Route::post('/send-embed', [DiscordEmbedController::class, 'store'])->name('discord.embed.store');
    Route::get('/get-channels/{serverId}', [DiscordEmbedController::class, 'getChannels'])->name('admin.discord.getChannels');

});

/*
|--------------------------------------------------------------------------
| Auth Routes (prefix: u53k41-1d)
|--------------------------------------------------------------------------
*/

Route::prefix('u53k41-1d')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| feeds for blog in discord
|--------------------------------------------------------------------------
*/

Route::feeds();
