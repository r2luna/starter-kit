<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('welcome');
Route::get(
    '/login/{id}',
    function ($id) {
        $user = Auth::loginUsingId($id);

        ds()->model($user);

        return $user;
    }
);
