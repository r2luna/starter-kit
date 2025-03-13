<?php

declare(strict_types = 1);

use App\Brain\Auth\Processes\AuthProcess;
use App\Brain\Auth\Tasks\Login;
use App\Brain\Auth\Tasks\LogLogin;

test('check if auth process has all the tasks', function () {
    $process = new AuthProcess([]);

    expect($process->getTasks())
        ->toBe([
            Login::class,
            LogLogin::class,
        ]);
});
