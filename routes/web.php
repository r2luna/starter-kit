<?php

declare(strict_types = 1);

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

// ------------------------------------------------
// Auth Routes
// ------------------------------------------------
Route::get('/login', Login::class)->name('login');
Route::get('/password-request', fn () => 'password-request')->name('password.request');
Route::get('/register', fn () => 'register')->name('register');

// ------------------------------------------------
// Authenticated Routes
// ------------------------------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
});
