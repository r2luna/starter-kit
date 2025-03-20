<?php

declare(strict_types = 1);

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ------------------------------------------------
// Auth Routes
// ------------------------------------------------
Route::get('/login', Login::class)->name('login');
Route::get('/password-request', fn (): string => 'password-request')->name('password.request');
Route::get('/register', fn (): string => 'register')->name('register');
Route::match(['get', 'post'], '/logout', function () {
    Auth::logout();

    return redirect()->route('login');
})->name('logout');

// ------------------------------------------------
// Authenticated Routes
// ------------------------------------------------
Route::middleware(['auth'])->group(function (): void {
    Route::get('/', Dashboard::class)->name('dashboard');
});
