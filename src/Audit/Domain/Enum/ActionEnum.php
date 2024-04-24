<?php

declare(strict_types=1);

namespace App\Audit\Domain\Enum;

enum ActionEnum: string
{
    case CREATE = 'create';

    case UPDATE = 'update';

    case DELETE = 'delete';

    case VIEW = 'view';
}
