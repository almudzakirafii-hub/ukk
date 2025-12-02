<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\NewsController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/schedule', [HomeController::class, 'schedule'])->name('schedule');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/news', [HomeController::class, 'news'])->name('news');
Route::get('/news/{slug}', [HomeController::class, 'newsDetail'])->name('news.detail');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Players Management
    Route::resource('players', PlayerController::class);
    
    // Matches Management
    Route::resource('matches', MatchController::class);
    
    // Gallery Management
    Route::resource('gallery', GalleryController::class);
    
    // News Management
    Route::resource('news', NewsController::class);
});

// Authentication routes
require __DIR__.'/auth.php';

