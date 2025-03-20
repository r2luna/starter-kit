<?php

declare(strict_types = 1);

use App\Brain\Auth\Tasks\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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

describe('validations', function () {
    it('should require an email', function () {
        $this->expectException(ValidationException::class);

        Login::dispatch([
            'password' => 'password',
        ]);
    });

    it('should require a password', function () {
        $this->expectException(ValidationException::class);

        Login::dispatch([
            'email' => 'test@example.com',
        ]);
    });

    it('should require a valid email format', function () {
        $this->expectException(ValidationException::class);

        Login::dispatch([
            'email'    => 'invalid-email',
            'password' => 'password',
        ]);
    });

    it('should fail with invalid credentials', function () {
        $user = User::factory()->create();

        try {
            Login::dispatch([
                'email'    => $user->email,
                'password' => 'wrong-password',
            ]);

            $this->fail('Expected ValidationException was not thrown');
        } catch (ValidationException $e) {
            expect($e->errors())
                ->toHaveKey('email')
                ->and($e->errors()['email'])
                ->toContain(trans('auth.failed'));
        }
    });
});
