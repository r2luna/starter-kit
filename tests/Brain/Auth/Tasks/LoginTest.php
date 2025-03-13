<?php

declare(strict_types = 1);

use App\Brain\Auth\Tasks\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

it('should be able to login', function () {
    $user = User::factory()->create();

    Login::dispatch([
        'email'    => $user->email,
        'password' => 'password',
    ]);

    expect(Auth::check())->toBeTrue()
        ->and(Auth::id())->toBe($user->id);
});

it('it should add user to the payload', function () {
    $user = User::factory()->create();

    $task = Login::dispatchSync([
        'email'    => $user->email,
        'password' => 'password',
    ]);

    expect($task->payload)->user->id->toBe($user->id);
});
