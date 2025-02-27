<?php

declare(strict_types = 1);

use App\Enums\Can;
use App\Models\User;
use Illuminate\Support\Facades\Route;

ds()->queriesOn();

Route::get('/', fn () => view('welcome'))->name('welcome');
Route::get(
    '/login/{id}',
    function ($id) {
        $user = Auth::loginUsingId($id);

        ds()->model($user);

        return $user;
    }
);

Route::get('/user/{user}', fn (User $user) => $user)
    ->can(Can::CreateUser->value);
