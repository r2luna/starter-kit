<?php

declare(strict_types = 1);

namespace App\Enums;

enum Can: string
{
    case ViewUser   = 'view-user';
    case CreateUser = 'create-user';
    case UpdateUser = 'update-user';
    case DeleteUser = 'delete-user';
}
