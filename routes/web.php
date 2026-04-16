<?php

use Illuminate\Support\Facades\Route;
use Lmendes\Template\Http\Controllers\AuthController;
use Lmendes\Template\Http\Controllers\DashboardController;
use Lmendes\Template\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Auth routes (guest)
|--------------------------------------------------------------------------
*/
Route::middleware('web')->prefix('template')->name('template.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/login',          [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login',         [AuthController::class, 'login']);
        Route::post('/logout',        [AuthController::class, 'logout'])->withoutMiddleware('guest')->name('logout');

        if (config('template.auth.register_enabled')) {
            Route::get('/register',   [AuthController::class, 'showRegister'])->name('register');
            Route::post('/register',  [AuthController::class, 'register']);
        }
    });

    /*
    |--------------------------------------------------------------------------
    | Authenticated routes
    |--------------------------------------------------------------------------
    */
    Route::middleware(config('template.dashboard.middleware', ['web', 'auth']))->group(function () {
        Route::get('/dashboard',      [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile',        [ProfileController::class, 'edit'])->name('profile');
        Route::put('/profile',        [ProfileController::class, 'update'])->name('profile.update');
    });

});
