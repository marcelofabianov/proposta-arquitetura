<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\Core\Exceptions\Enums;

enum ExceptionCodeEnum: int
{
    case INVALID_ENTITY = 1;

    case INVALID_VALUE_OBJECT = 2;
}
