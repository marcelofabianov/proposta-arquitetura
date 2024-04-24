<?php

declare(strict_types=1);

namespace App\Core\Enum;

enum ActionEnum: string
{
    case CREATE = 'create';

    case UPDATE = 'update';

    case DELETE = 'delete';

    case VIEW = 'view';
}
