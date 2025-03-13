<?php

declare(strict_types = 1);

namespace App\Brain\Auth\Tasks;

use App\Models\User;
use Brain\Task;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Task LogLogin
 *
 * @property-read User $user
 */
class LogLogin extends Task implements ShouldQueue
{
    protected string $feature = 'auth.v1';

    public function handle(): self
    {
        $this->user->logins()->create([
            'ip' => request()->ip(),
        ]);

        return $this;
    }
}
