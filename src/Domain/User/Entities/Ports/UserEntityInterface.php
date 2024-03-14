<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\Domain\User\Entities\Ports;

use Marcelofabianov\MyMoney\Domain\Core\CoreEntityInterface;

interface UserEntityInterface extends CoreEntityInterface
{
    public function __construct(CreateUserDtoInterface $dto);
}
