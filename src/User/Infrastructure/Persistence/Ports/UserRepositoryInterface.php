<?php

declare(strict_types=1);

namespace Marcelofabianov\MyMoney\User\Infrastructure\Persistence\Ports;

use Marcelofabianov\MyMoney\Core\Infrastructure\Persistence\Ports\RepositoryInterface as CoreRepositoryInterface;
use Marcelofabianov\MyMoney\Domain\User\UseCases\RegisterUser\Adapters\RegisterUserRepositoryInterface;

interface UserRepositoryInterface extends RegisterUserRepositoryInterface, CoreRepositoryInterface
{
}
