<?php

declare(strict_types = 1);

namespace App\Livewire\Auth;

use App\Brain\Auth\Processes\AuthProcess;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    public function login()
    {
        AuthProcess::dispatch([
            'email'    => $this->email,
            'password' => $this->password,
        ]);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
