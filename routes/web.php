<?php

declare(strict_types = 1);

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));
Route::get('/login/{id}', fn ($id) => Auth::loginUsingId($id));
