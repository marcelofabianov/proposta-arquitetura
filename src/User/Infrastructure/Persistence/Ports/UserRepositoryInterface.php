<?php

declare(strict_types=1);

namespace Marcelofabianov\Ddd\User\Infrastructure\Persistence\Ports;

use Marcelofabianov\Ddd\User\Application\UseCases\RegisterUser\Adapters\RegisterUserRepositoryInterface;

interface UserRepositoryInterface extends RegisterUserRepositoryInterface
{

}
