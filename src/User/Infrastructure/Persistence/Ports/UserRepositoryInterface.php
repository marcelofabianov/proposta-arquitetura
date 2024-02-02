<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\User\Infrastructure\Persistence\Ports;

use Marcelofabianov\MyMoney\User\Application\UseCases\RegisterUser\Adapters\RegisterUserRepositoryInterface;

interface UserRepositoryInterface extends RegisterUserRepositoryInterface
{
}
