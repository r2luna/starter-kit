<?php

declare(strict_types = 1);

namespace App\Brain\Auth\Tasks;

use App\Models\User;
use Brain\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

/**
 * Task Login
 *
 * @property-read string $email
 * @property-read string $password
 *
 * @property User $user
 * @property string $ip
 */
class Login extends Task
{
    public function handle(): self
    {
        if (! Auth::attempt([
            'email'    => $this->email,
            'password' => $this->password,
        ], false)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $this->user = Auth::user();
        $this->ip   = request()->ip();

        return $this;
    }
}
